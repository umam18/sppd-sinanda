<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Spd;
use App\Pegawai;
use App\Report;
use Response;
use Validator;

class InputController extends Controller
{

	protected $redirectTo = '/pegawa/input';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluaran = DB::table('keluaran')
        ->get();
        $komponen = DB::table('komponen')
        ->get();
        $subkomponen = DB::table('subkomponen')
        ->get();
        $kode = DB::table('kode_pembebanan')
        ->get();
        $permenkeu = DB::table('permenkeu')
        ->pluck("provinsi","id");
        $pegawai = DB::table('pegawai')
        ->pluck("nama","nama");

        return view('pegawai/input/index', ['pegawai' => $pegawai, 'permenkeu' => $permenkeu, 'kode' => $kode,
            'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }


    public function store(Request $request)
    {
			$spd = DB::table('spd')
			->get();

        $keys = [
            'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'nk_transport',
            'komponen', 'sub', 'akun', 'ket', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket','t_transport',
            'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd',
            't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'
		];
        $input = $this->createQueryInput($keys, $request);

        Spd::create($input);

        session()->flash('sukses', 'SPD Individu Berhasil Dibuat!');
        return redirect()->intended('/petugas/data/individu');
    }

		public function search(Request $request) {
        $constraints = [
            'nama' => $request['nama'],
            'jabatan' => $request['jabatan'],
            ];

       $pegawai = $this->doSearchingQuery($constraints);
       return view('pegawai/input/index', ['pegawai' => $pegawai, 'searchingVals' => $constraints]);
    }

		private function doSearchingQuery($constraints) {
        $query = Pegawai::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
				return $query->paginate(5);
    }

     private function validateInput($request)
     {

        $this->validate($request, [
        'pejabat' => 'required', 'posisi' => 'required', 'nip_pejabat' => 'required', 'bendahara' => 'required',
        'nama' => 'required', 'nip_bendahara' => 'required', 'nk_transport' => 'required',
        'nip' => 'required', 'pangkat' => 'required', 'jabatan' => 'required', 'biaya' => 'required',
				'maksud' => 'required', 'berangkat' => 'required', 'tujuan' => 'required', 'transportasi' => 'required',
        'tanggal_berangkat' => 'required', 'tanggal_kembali' => 'required', 'lama' => 'required',
        'keluaran' => 'required', 'komponen' => 'required', 'sub' => 'required', 'akun' => 'required',
        'ket' => 'required', 'h_ku' => 't_ku', 'no_berangkat' => 'required', 'no_kembali' => 'required',
				'h_tiket' => 'required', 't_transport' => 'required', 'n_penginapan' => 'required',
				'j_penginapan' => 'required', 'h_penginapan' => 'required', 't_penginapan' => 'required',
				'j_hn' => 'required', 'h_hn' => 'required', 't_hn' => 'required', 'j_fd' => 'required',
				'h_fd' => 'required', 't_fd' => 'required','j_fb' => 'required', 'h_fb' => 'required', 't_fb' => 'required',
				'j_diklat' => 'required', 'h_diklat' => 'required', 't_diklat' => 'required', 'j_rpr' => 'required', 'h_rpr' => 'required', 't_rpr' => 'required', 't_uh' => 'required',
				't_all' => 'required', 'terbilang' => 'required', 'status' => 'required'
		]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
