<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Response;
use App\Spd;
use App\Pengikut;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class CetakEventController extends Controller
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
      $event = DB::table('event')
      ->select('event.*')
      ->paginate(10);
      return view('pegawai/cetak/event/index', ['event' => $event]);
    }


    public function show($id)
    {
        $event = DB::table('pengikut')
                ->where('id_event', $id)
                ->select('*')
                ->paginate(10);

        return view('pegawai/cetak/event/lihat', ['event' => $event]);
    }

    public function exportPDFrbiaya(Request $id)
    {
        $event = Pengikut::find($id);

        $pdf = PDF::loadView('pegawai/cetak/event/rbiaya', ['event' => $event])
        ->setPaper('a4', 'potrait');
        return $pdf->download('Rincian');
    }

    public function exportExcel(Request $request, $id)
    {
        $this->prepareExportingData($request, $id)->export('xlsx');
        redirect()->intended('petugas/dashboard');
    }

    private function prepareExportingData($request, $id) {
        $author = Auth::user()->username;
        $event = DB::table('pengikut')
                  ->where('id_event', $id)
                  ->get();

        $akun = DB::table('event')->find($id);

        return Excel::create('Nominatif', function($excel) use($akun, $event, $id, $request, $author) {

        $excel->setTitle('Nominatif');

        $excel->sheet('Nominatif', function($sheet) use($akun, $event, $id) {
        // $sheet->mergeCells('J2:K2'); $sheet->mergeCells('L2:L3'); $sheet->mergeCells('M2:M3'); $sheet->mergeCells('N2:N3'); $sheet->mergeCells('O2:P2'); $sheet->mergeCells('Q2:R2'); $sheet->mergeCells('S2:T2'); $sheet->mergeCells('U2:U3'); $sheet->mergeCells('V2:V3'); $sheet->mergeCells('W2:W3'); $sheet->mergeCells('X2:X3'); $sheet->mergeCells('Y2:Y3'); $sheet->mergeCells('Z2:Z3'); $sheet->mergeCells('AA2:AD2'); $sheet->mergeCells('AE2:AH'); 
        $sheet->loadView('pegawai.cetak.event.nominatif', ['akun' => $akun, 'event' => $event]);
            });
        });
    }

    public function search(Request $request)
    {
        $constraints = [
            'maksud' => $request['maksud']
        ];

        $event = $this->doSearchingQuery($constraints);
        return view('pegawai/cetak/event/index', ['event' => $event, 'searchingVals' => $constraints]);
    }

    public function search2(Request $request) {
        $constraints = [
            'nama' => $request['nama']
            ];

       $event = $this->doSearchingQuery($constraints);
       return view('admin/validasi/event/lihat_sudah', ['event' => $event,   'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('event')->select();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }
            $index++;
        }
        return $query->paginate(10);
    }
}
