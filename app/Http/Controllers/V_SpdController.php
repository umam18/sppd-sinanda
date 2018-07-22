<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Response;
use App\Spd;
use Illuminate\Support\Facades\DB;
use Auth;

class V_SpdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function belum()
    {
      $spd = DB::table('spd')
      ->select('spd.*')
      ->paginate(10);
      return view('admin/validasi/belum', ['spd' => $spd]);
    }

    public function sudah()
    {
      $spd = DB::table('spd')
      ->select('spd.*')
      ->paginate(10);
      return view('admin/validasi/sudah', ['spd' => $spd]);
    }

    public function update(Request $request, $id)
    {
      $spd = DB::table('spd')
      ->find($id);

      DB::table('spd')
      ->where('id', $id)
      ->update(['status' => 1]);

        session()->flash('validasi_spd', 'Data Telah Divalidasi!');
        return redirect()->action('V_SpdController@belum');
    }

    public function edit_spd($id)
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
        $spd = DB::table('spd') //TANDAI
        ->find($id);
        if ($spd == null || count($spd) == 0) {
            return view('admin/validasi/belum');
        }
        return view('admin/validasi/spd', ['spd' => $spd, 'data' => $data, 'kode' => $kode,
      'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
    }

    public function update_spd(Request $request, $id)
    {
        $spd = DB::table('spd')
        ->find($id);
        $this->validateInput($request);
        $keys = [
            'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran',
            'komponen', 'sub', 'akun', 'ket', 'h_ku', 't_ku', 'n_transport', 'no_berangkat', 'no_kembali', 'h_tiket','t_transport', 'nk_transport',
            'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd',
            't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'
    ];
        $input = $this->createQueryInput($keys, $request);
        DB::table('spd')
        ->where('id', $id)
        ->update($input);

          session()->flash('update_spd', 'Data Berhasil Diupdate!');
                  return redirect()->back();
          // return redirect()->action('V_SpdController@belum');
    }

    private function validateInput($request)
    {

       $this->validate($request, [
       'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran',
            'komponen', 'sub', 'akun', 'ket', 'h_ku', 't_ku', 'n_transport', 'no_berangkat', 'no_kembali', 'h_tiket','t_transport', 'nk_transport',
            'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd',
            't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 'j_rpr', 'h_rpr', 't_rpr', 't_uh', 't_all', 'terbilang', 'status'
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
        $spd = DB::table('pengikut')
        ->find($id);

         DB::table('spd')
         ->where('id', $id)
         ->delete();

         session()->flash('delete_spd', 'Data Berhasil Dihapus!');
         return redirect()->action('V_SpdController@belum');
    }

    public function search(Request $request) {
        $constraints = [
            'maksud' => $request['maksud']
            ];

       $spd = $this->doSearchingQuery($constraints);
       return view('admin/validasi/belum', ['spd' => $spd,   'searchingVals' => $constraints]);
    }

    public function search2(Request $request) {
        $constraints = [
            'nama' => $request['nama']
            ];

       $spd = $this->doSearchingQuery($constraints);
       return view('admin/validasi/sudah', ['spd' => $spd,   'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('spd')->select();
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
