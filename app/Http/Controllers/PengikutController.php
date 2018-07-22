<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data;
use App\Pegawai;
use Response;
use Validator;

class PengikutController extends Controller
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
    // public function index()
    // {
    //     $pegawai = DB::table('pegawai')
    //     ->select('pegawai.*')
    //     ->paginate(10);
    //     return view('pegawai/input/index', ['pegawai' => $pegawai]);
    // }

    // public function edit($id)
    // {
    //     $data = DB::table('data')
    //     ->get();
    //     return view('pegawai/input/rbiaya', ['data' => $data]);
    // }

    public function store(Request $request)
    {
        $keys = ['nama'];
        $input = $this->createQueryInput($keys, $request);
        DB::table('pengikut')->insert($input);
        return view('pegawai/input/pengikut');
    }

     private function validateInput($request) 
     {

        $this->validate($request, [
            'nama' => 'required'
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