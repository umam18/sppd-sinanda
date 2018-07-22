<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pegawai;
use Response;

class SpdController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  protected $redirectTo = '/admin/valdiasi/belum';

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
      return view('admin/validasi/rb', ['spd' => $spd, 'data' => $data, 'kode' => $kode,
    'keluaran' => $keluaran, 'komponen' => $komponen, 'subkomponen' => $subkomponen]);
  }

  public function update(Request $request, $id)
  {
      $spd = DB::table('spd')
      ->find($id);
      $this->validateInput($request);
      $keys = [
          'pejabat', 'posisi', 'nip_pejabat', 'bendahara', 'nip_bendahara', 'nama', 'nip', 'pangkat', 'jabatan', 'biaya', 'maksud', 'berangkat', 'tujuan', 'transportasi', 'tanggal_berangkat', 'tanggal_kembali', 'lama', 'keluaran',
          'komponen', 'sub', 'akun', 'ket', 'h_ku', 't_ku', 'no_berangkat', 'no_kembali', 'h_tiket','t_transport',
          'n_penginapan', 'j_penginapan', 'h_penginapan', 't_penginapan', 'j_hn', 'h_hn', 't_hn', 'j_fd', 'h_fd',
          't_fd', 'j_fb', 'h_fb', 't_fb', 'j_diklat', 'h_diklat', 't_diklat', 't_uh', 't_all', 'terbilang', 'status'
  ];
      $input = $this->createQueryInput($keys, $request);
      DB::table('pegawai')
      ->where('id', $id)
      ->update($input);

      return view('admin/valdiasi/belum');
  }

  private function validateInput($request)
  {

     $this->validate($request, [
     'pejabat' => 'required', 'posisi' => 'required', 'nip_pejabat' => 'required', 'bendahara' => 'required',
     'nama' => 'required', 'nip_bendahara' => 'required',
     'nip' => 'required', 'pangkat' => 'required', 'jabatan' => 'required', 'biaya' => 'required',
     'maksud' => 'required', 'berangkat' => 'required', 'tujuan' => 'required', 'transportasi' => 'required',
     'tanggal_berangkat' => 'required', 'tanggal_kembali' => 'required', 'lama' => 'required',
     'keluaran' => 'required', 'komponen' => 'required', 'sub' => 'required', 'akun' => 'required',
     'ket' => 'required', 'h_ku' => 't_ku', 'no_berangkat' => 'required', 'no_kembali' => 'required',
     'h_tiket' => 'required', 't_transport' => 'required', 'n_penginapan' => 'required',
     'j_penginapan' => 'required', 'h_penginapan' => 'required', 't_penginapan' => 'required',
     'j_hn' => 'required', 'h_hn' => 'required', 't_hn' => 'required', 'j_fd' => 'required',
     'h_fd' => 'required', 't_fd' => 'required','j_fb' => 'required', 'h_fb' => 'required', 't_fb' => 'required',
     'j_diklat' => 'required', 'h_diklat' => 'required', 't_diklat' => 'required', 't_uh' => 'required',
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
