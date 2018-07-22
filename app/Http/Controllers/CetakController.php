<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Response;
use App\Spd;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class CetakController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/pegawai/cetak';

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
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $sampai = date($format, strtotime("+30 days"));
        $constraints = [
            'dari' => $now,
            'sampai' => $sampai
        ];
        $spd = $this->getSpd($constraints);
        
        $tampil = DB::table('spd')
      	->select('spd.*')
      	->paginate(10);
        return view('pegawai/cetak/index', ['tampil' => $tampil, 'searchingVals' => $constraints]);
    }

    public function exportPDF(Request $id)
    {

        $spd = Spd::find($id);

        $pdf = PDF::loadView('pegawai/cetak/spd', ['spd' => $spd])
        ->setPaper('a4', 'potrait');
        return $pdf->download('SPD');
        // return view('system-mgmt/report/pdf', ['spd' => $spd, 'searchingVals' => $constraints]);
    }

    public function exportPDFrbiaya(Request $id)
    {
        $spd = Spd::find($id);

        $pdf = PDF::loadView('pegawai/cetak/rbiaya', ['spd' => $spd])
        ->setPaper('a4', 'potrait');
        return $pdf->download('Rincian');
        // return view('system-mgmt/report/pdf', ['spd' => $spd, 'searchingVals' => $constraints]);
    }

    public function search(Request $request)
    {
        $constraints = [
            'dari' => $request['dari'],
            'sampai' => $request['sampai']
        ];

        $tampil = $this->getSpd($constraints);
        return view('pegawai/cetak/index', ['tampil' => $tampil, 'searchingVals' => $constraints]);
    }

    private function getSpd($constraints)
    {
        $tampil = DB::table('spd')
                        ->where('tanggal_berangkat', '>=', $constraints['dari'])
                        ->where('tanggal_berangkat', '<=', $constraints['sampai'])
                        ->paginate(10);
        return $tampil;
    }
}
