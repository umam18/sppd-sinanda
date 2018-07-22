<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spd;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use response;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectsampai = '/admin/report';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      date_default_timezone_set('asia/ho_chi_minh');
      $format = 'Y/m/d';
      $now = date($format);
      $sampai = date($format, strtotime("+365 days"));
      $constraints = [
          'dari' => $now,
          'sampai' => $sampai
      ];
          $spd = $this->getHiredEmployees($constraints);
        return view('admin/report/index', ['spd' => $spd, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) 
    {
        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('admin/report');
    }

    public function exportExcel2(Request $request) 
    {
        $this->prepareExportingData2($request)->export('xlsx');
        redirect()->intended('admin/report');
    }

    public function exportExcel3(Request $request) 
    {
        $this->prepareExportingData3($request)->export('xlsx');
        redirect()->intended('admin/report');
    }
    
    private function prepareExportingData($request) {
        $author = Auth::user()->namauser;
        $spd = $this->getExportingData(['dari'=> $request['dari'], 'sampai' => $request['sampai']]);
        return Excel::create('Report(Tahunan) '. $request['dari'].'-'.$request['sampai'], function($excel) use($spd, $request, $author) {

        $excel->setTitle('Report_Tahunan '. $request['dari'].' sampai '. $request['sampai']);

        $excel->sheet('Tahunan', function($sheet) use($spd) {
        $sheet->setFontFamily('Arial');
        $sheet->setFontSize(8);
        $sheet->setBorder('A5:AH8', 'double');

        //SET MERGE CELL
        $sheet->mergeCells('A1:AH1'); $sheet->mergeCells('A2:AH2'); $sheet->mergeCells('A3:AH3'); $sheet->mergeCells('A5:A7');
        $sheet->mergeCells('B5:B7'); $sheet->mergeCells('C5:C7'); $sheet->mergeCells('D5:D7'); $sheet->mergeCells('E5:E7');
        $sheet->mergeCells('F5:F7'); $sheet->mergeCells('G5:G7'); $sheet->mergeCells('H5:H7'); $sheet->mergeCells('I5:I7');
        $sheet->mergeCells('J5:N5'); $sheet->mergeCells('O5:X5'); $sheet->mergeCells('Y5:AH5'); $sheet->mergeCells('J6:K6');
        $sheet->mergeCells('L6:L7'); $sheet->mergeCells('M6:M7'); $sheet->mergeCells('N6:N7'); $sheet->mergeCells('O6:P6');
        $sheet->mergeCells('Q6:R6'); $sheet->mergeCells('S6:T6'); $sheet->mergeCells('U6:U7'); $sheet->mergeCells('V6:V7');
        $sheet->mergeCells('W6:W7'); $sheet->mergeCells('X6:X7'); 
        $sheet->loadView('admin.report.excel', ['spd' => $spd]);

        //SET FONT SIZE
        $sheet->cell('A1:AH8', function($cell) {$cell->setFontSize(9); });
            });
        });
    }

        private function prepareExportingData2($request) {
        $author = Auth::user()->namauser;
        $spd = $this->getExportingData2(['dari'=> $request['dari'], 'sampai' => $request['sampai']]);
        return Excel::create('Report(Nurul Huda) '. $request['dari'].'-'.$request['sampai'], function($excel) use($spd, $request, $author) {

        $excel->setTitle('Report_NURUL'. $request['dari'].' sampai '. $request['sampai']);

        $excel->sheet('NURUL', function($sheet) use($spd) {
        $sheet->setFontFamily('Arial');
        $sheet->setFontSize(8);
        $sheet->setBorder('A5:AH8', 'double');

        //SET MERGE CELL
        $sheet->mergeCells('A1:AH1'); $sheet->mergeCells('A2:AH2'); $sheet->mergeCells('A3:AH3'); $sheet->mergeCells('A5:A7');
        $sheet->mergeCells('B5:B7'); $sheet->mergeCells('C5:C7'); $sheet->mergeCells('D5:D7'); $sheet->mergeCells('E5:E7');
        $sheet->mergeCells('F5:F7'); $sheet->mergeCells('G5:G7'); $sheet->mergeCells('H5:H7'); $sheet->mergeCells('I5:I7');
        $sheet->mergeCells('J5:N5'); $sheet->mergeCells('O5:X5'); $sheet->mergeCells('Y5:AH5'); $sheet->mergeCells('J6:K6');
        $sheet->mergeCells('L6:L7'); $sheet->mergeCells('M6:M7'); $sheet->mergeCells('N6:N7'); $sheet->mergeCells('O6:P6');
        $sheet->mergeCells('Q6:R6'); $sheet->mergeCells('S6:T6'); $sheet->mergeCells('U6:U7'); $sheet->mergeCells('V6:V7');
        $sheet->mergeCells('W6:W7'); $sheet->mergeCells('X6:X7'); 
        $sheet->loadView('admin.report.excel', ['spd' => $spd]);

        //SET FONT SIZE
        $sheet->cell('A1:AH8', function($cell) {$cell->setFontSize(9); });

        $sheet->loadView('admin.report.excel', ['spd' => $spd]);
            });
        });
    }

        private function prepareExportingData3($request) {
        $author = Auth::user()->namauser;
        $spd = $this->getExportingData3(['dari'=> $request['dari'], 'sampai' => $request['sampai']]);
        return Excel::create('Report(Maryadi) '. $request['dari'].'-'.$request['sampai'], function($excel) use($spd, $request, $author) {

        $excel->setTitle('Report_MARYADI '. $request['dari'].' sampai '. $request['sampai']);

        $excel->sheet('MARYADI', function($sheet) use($spd) {
        $sheet->setFontFamily('Arial');
        $sheet->setFontSize(8);
        $sheet->setBorder('A5:AH8', 'double');

        //SET MERGE CELL
        $sheet->mergeCells('A1:AH1'); $sheet->mergeCells('A2:AH2'); $sheet->mergeCells('A3:AH3'); $sheet->mergeCells('A5:A7');
        $sheet->mergeCells('B5:B7'); $sheet->mergeCells('C5:C7'); $sheet->mergeCells('D5:D7'); $sheet->mergeCells('E5:E7');
        $sheet->mergeCells('F5:F7'); $sheet->mergeCells('G5:G7'); $sheet->mergeCells('H5:H7'); $sheet->mergeCells('I5:I7');
        $sheet->mergeCells('J5:N5'); $sheet->mergeCells('O5:X5'); $sheet->mergeCells('Y5:AH5'); $sheet->mergeCells('J6:K6');
        $sheet->mergeCells('L6:L7'); $sheet->mergeCells('M6:M7'); $sheet->mergeCells('N6:N7'); $sheet->mergeCells('O6:P6');
        $sheet->mergeCells('Q6:R6'); $sheet->mergeCells('S6:T6'); $sheet->mergeCells('U6:U7'); $sheet->mergeCells('V6:V7');
        $sheet->mergeCells('W6:W7'); $sheet->mergeCells('X6:X7'); 
        $sheet->loadView('admin.report.excel', ['spd' => $spd]);

        //SET FONT SIZE
        $sheet->cell('A1:AH8', function($cell) {$cell->setFontSize(9); });

        $sheet->loadView('admin.report.excel', ['spd' => $spd]);
            });
        });
    }

    public function search(Request $request)
    {
        $constraints = [
            'dari' => $request['dari'],
            'sampai' => $request['sampai']
        ];                                                                                                                     
        $spd = $this->getHiredEmployees($constraints);
        return view('admin/report/index', ['spd' => $spd, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints)
    {
      $union = DB::table('pengikut')
              ->select('pengikut.pejabat', 'pengikut.nama', 'pengikut.tujuan', 'pengikut.tanggal_berangkat', 'pengikut.tanggal_kembali', 'status')
              ->where('status', '=', '1')
              ->where('pengikut.tanggal_berangkat', '>=', $constraints['dari'])
              ->where('pengikut.tanggal_berangkat', '<=', $constraints['sampai']);

      $spd = DB::table('spd')
              ->select('pejabat', 'nama', 'tujuan', 'tanggal_berangkat', 'tanggal_kembali', 'status')
              ->where('status', '=', '1')
              ->where('tanggal_berangkat', '>=', $constraints['dari'])
              ->where('tanggal_berangkat', '<=', $constraints['sampai'])
              ->union($union)
              ->get();
      return $spd;
    }

		private function doSearchingQuery($constraints)
    {
        $query = Spd::query();
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

    private function getExportingData($constraints)
    {
      $union = DB::table('pengikut')
            ->select('pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip','pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket', 'n_transport', 'h_tiketp',
          't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang','status', 'created_at')
            ->where('status', '=', '1');

      return DB::table('spd')
      ->select('pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip','pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket', 'n_transport', 'h_tiketp',
          't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang','status', 'created_at')

      ->union($union)
        ->where('status', '=', '1')
        ->where('tanggal_berangkat', '>=', $constraints['dari'])
        ->where('tanggal_kembali', '<=', $constraints['sampai'])
      ->get()
      ->map(function ($item, $key) {
      return (array) $item;
      })
      ->all();
    }

    private function getExportingData2($constraints)
    {
      $union = DB::table('pengikut')
            ->select('pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip','pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket', 'n_transport', 'h_tiketp',
          't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang','status', 'created_at')
            ->where('status', '=', '1');;

      return DB::table('spd')
      ->select('pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip','pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket', 'n_transport', 'h_tiketp',
          't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang','status', 'created_at')

      ->union($union)
        ->where('tanggal_berangkat', '>=', $constraints['dari'])
        ->where('tanggal_kembali', '<=', $constraints['sampai'])
        ->where('status', '=', '1')
        ->where('pejabat', '=', 'NURUL HUDA SE, M.SI')
      ->get()
      ->map(function ($item, $key) {
      return (array) $item;
      })
      ->all();
    }

    private function getExportingData3($constraints)
    {
      return DB::table('spd')
      ->select('*')
        ->where('status', '=', '1')
        ->where('pejabat', '=', 'MARYADI')
        ->where('tanggal_berangkat', '>=', $constraints['dari'])
        ->where('tanggal_kembali', '<=', $constraints['sampai'])
      ->get()
      ->map(function ($item, $key) {
      return (array) $item;
      })
      ->all();
    }
}
