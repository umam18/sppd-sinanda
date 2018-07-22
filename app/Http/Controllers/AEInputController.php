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

class AEInputController extends Controller
{

	protected $redirectTo = 'admin/event';

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

        return view('admin/input/event/index', ['pegawai' => $pegawai, 'permenkeu' => $permenkeu, 'kode' => $kode,
            'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

    public function store(Request $request)
    {
		$spd = DB::table('event')
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
            'pejabat', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran',
            'komponen', 'sub', 'akun', 'h_ku', 'h_hn', 'h_fb', 'h_fd', 'h_diklat' 
		];
        $input = $this->createQueryInput($keys, $request);
        
        $id = Event::create($input);
        session()->flash('sukses2', 'Successfully Created');

        return view('admin/input/pengikut/index', ['id' => $id, 'pegawai' => $pegawai, 'data' => $data, 'kode' => $kode,
        'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

     private function validateInput($request)
     {

        $this->validate($request, [
        'pejabat' => 'required', 'nip_pejabat' => 'required', 'bendahara' => 'required', 'nip_bendahara' => 'required', 'maksud' => 'required', 'berangkat' => 'required', 'tujuan' => 'required', 'transportasi' => 'required', 'tanggal_berangkat' => 'required', 'tanggal_kembali' => 'required', 'lama' => 'required',
        'keluaran' => 'required', 'komponen' => 'required', 'sub' => 'required', 'akun' => 'required', 'h_ku' => 'required', 'h_hn' => 'required', 'h_fd' => 'required', 'h_fd' => 'required', 'h_dikalt' => 'required'
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
