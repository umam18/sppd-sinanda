<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Response;
use App\Spd;
use Excel;
use PDF;
use Illuminate\Support\Facades\DB;
use Auth;

class VP_EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/pegawai/dashboard';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihat_belum()
    {
      $event = DB::table('event')
      ->select('event.*')
      ->paginate(10);
      return view('pegawai/validasi/event/lihat_belum', ['event' => $event]);
    }

    public function lihat_sudah()
    {
      $event = DB::table('event')
      ->select('event.*')
      ->paginate(10);
      return view('pegawai/validasi/event/lihat_sudah', ['event' => $event]);
    }


    public function belum($id)
    {
      $event = DB::table('pengikut')
      ->where('id_event', $id)
      ->select('*')
      ->paginate(10);

      $add = DB::table('event')
      ->find($id);
      return view('pegawai/validasi/event/belum', ['event' => $event, 'add' => $add]);
    }

    public function sudah($id)
    {
      $event = DB::table('pengikut')
      ->where('id_event', $id)
      ->select('*')
      ->paginate(10);
      return view('pegawai/validasi/event/sudah', ['event' => $event]);
    }


    public function edit_espd($id)
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
        $event = DB::table('pengikut') //TANDAI
        ->find($id);
        return view('pegawai/validasi/event/espd', ['event' => $event, 'data' => $data, 'kode' => $kode,
      'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

    public function update_espd(Request $request, $id)
    {
        $event = DB::table('pengikut')
        ->find($id);
        $this->validateInput($request);
        $keys = [
           'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'nk_transport', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'n_transport', 'no_berangkat', 'no_kembali', 'nk_transport', 'h_tiket', 'h_tiketp', 't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'
    ];
        $input = $this->createQueryInput($keys, $request);
        DB::table('pengikut')
        ->where('id', $id)
        ->update($input);

        session()->flash('update_event', 'Data Berhasil Diupdate!');
        return redirect()->back();
        // return redirect()->action('VP_EventController@lihat_belum');
    }

    private function validateInput($request)
    {

       $this->validate($request, [
       'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran', 'nk_transport', 'komponen', 'sub', 'akun', 'h_ku', 't_ku', 'n_transport', 'no_berangkat', 'no_kembali', 'nk_transport', 'h_tiket', 'h_tiketp', 't_transport', 'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd', 't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'
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

    public function destroy($id)
    {
      $event = DB::table('pengikut')
        ->find($id);

         DB::table('pengikut')
         ->where('id', $id)
         ->delete();

        session()->flash('delete_event', 'Data Berhasil Dihapus!');
        return redirect()->back();
    }

    public function search(Request $request) {
        $constraints = [
            'maksud' => $request['maksud']
            ];

       $event = $this->doSearchingQuery($constraints);
       return view('pegawai/validasi/event/lihat_belum', ['event' => $event,   'searchingVals' => $constraints]);
    }

    public function search2(Request $request) {
        $constraints = [
            'maksud' => $request['maksud']
            ];

       $event = $this->doSearchingQuery($constraints);
       return view('pegawai/validasi/event/lihat_sudah', ['event' => $event,   'searchingVals' => $constraints]);
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

    public function exportExcel(Request $request, $id)
    {
        $this->prepareExportingData($request, $id)->export('xlsx');
        redirect()->intended('pegawai/dashboard');
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
          $sheet->setFontFamily('Arial');
          $sheet->setFontSize(8);
          $sheet->setBorder('A12:N13', 'double');
          $sheet->setCellValue('I17','=SUM(I14:I4+1)');
          $sheet->mergeCells('B12:C13'); $sheet->mergeCells('D12:D13'); $sheet->mergeCells('E12:E13'); $sheet->mergeCells('F12:F13'); $sheet->mergeCells('I12:I13'); $sheet->mergeCells('J12:J13'); $sheet->mergeCells('N12:N13'); $sheet->mergeCells('A12:A13');  $sheet->mergeCells('A1:N1');  $sheet->mergeCells('A2:N2');  $sheet->mergeCells('A3:N3');  $sheet->mergeCells('A4:N4');
        $sheet->loadView('pegawai.cetak.event.nominatif', ['akun' => $akun, 'event' => $event]);

        //SET FONT SIZE
        $sheet->cell('A1:N4', function($cell) {$cell->setFontSize(10); });
        $sheet->cell('A5:E11', function($cell) {$cell->setFontSize(9); });  

            });
        });
    }
}
