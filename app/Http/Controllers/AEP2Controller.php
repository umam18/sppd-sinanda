<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Spd;
use App\Event;
use App\Pengikut;
use App\Report;
use App\Pegawai;
use Response;
use Validator;

class AEP2Controller extends Controller
{

    protected $redirectTo = '/admin/event/pengikut/tambah';

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
        $data = DB::table('kabupaten')
        ->get();
        $pegawai = DB::table('pegawai')
        ->pluck("nama","nama");

        return view('admin/input/tambah/index', ['pegawai' => $pegawai, 'data' => $data, 'kode' => $kode,
            'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

    public function show($id)
    {   
        $id = DB::table('event')->find($id);
        $keluaran = DB::table('keluaran')
        ->get();
        $komponen = DB::table('komponen')
        ->get();
        $subkomponen = DB::table('subkomponen')
        ->get();
        $kode = DB::table('kode_pembebanan')
        ->get();
        $data = DB::table('kabupaten')
        ->get();
        $pegawai = DB::table('pegawai')
        ->pluck("nama","nama");

        return view('admin/input/tambah/index', ['id' => $id, 'pegawai' => $pegawai, 'data' => $data, 'kode' => $kode,
            'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

    public function store(Request $request)
    {
            $spd = DB::table('pengikut')
            ->get();

            $keluaran = DB::table('keluaran')
        ->get();
        $komponen = DB::table('komponen')
        ->get();
        $subkomponen = DB::table('subkomponen')
        ->get();
        $kode = DB::table('kode_pembebanan')
        ->get();
        $data = DB::table('kabupaten')
        ->get();
        $pegawai = DB::table('pegawai')
        ->pluck("nama","nama");


        $keys = [
            'id_event', 'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran',
            'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'n_transport', 'no_berangkat', 'no_kembali', 'nk_transport', 'h_tiket', 'h_tiketp', 't_transport',
            'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd',
            't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'  
        ];
        $input = $this->createQueryInput($keys, $request);
        
        $id = Pengikut::create($input);

            session()->flash('add', 'Berhasil Menambahkan Orang!');
               return view('admin/input/tambah/index', ['id' => $id, 'pegawai' => $pegawai, 'data' => $data, 'kode' => $kode,
            'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

     private function validateInput($request)
     {

        $this->validate($request, [
        'id_event' => 'required', 'pejabat' => 'required', 'posisi' => 'required', 'nip_pejabat' => 'required', 'bendahara' => 'required',
        'nama' => 'required', 'nip_bendahara' => 'required',
        'nip' => 'required', 'pangkat' => 'required', 'jabatan' => 'required', 'biaya' => 'required',
                'maksud' => 'required', 'berangkat' => 'required', 'tujuan' => 'required', 'transportasi' => 'required',
        'tanggal_berangkat' => 'required', 'tanggal_kembali' => 'required', 'lama' => 'required',
        'keluaran' => 'required', 'komponen' => 'required', 'sub' => 'required', 'akun' => 'required',
        'h_ku' => 'required', 't_ku' => 'required', 'n_transport' => 'required', 'no_berangkat' => 'required', 'no_kembali' => 'required', 'h_tiket' => 'required', 'h_tiketp' => 'required', 't_transport' => 'required', 'n_penginapan' => 'required', 'j_penginapan' => 'required', 'h_penginapan' => 'required', 't_penginapan' => 'required', 'j_hn' => 'required', 'h_hn' => 'required', 't_hn' => 'required', 'j_fd' => 'required', 'nk_transport' => 'required',
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
