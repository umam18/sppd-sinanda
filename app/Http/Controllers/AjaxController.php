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

class AjaxController extends Controller
{
    //FUNGSI SPD
    public function getNIP(Request $request)
    {
        $nip = DB::table("pegawai")
                    ->where("nama",$request->id)
                    ->pluck("nip","nip");
        return response()->json($nip);
    }

    public function getJabatan(Request $request)
    {
        $jabatan = DB::table("pegawai")
                    ->where("nama", $request->id)
                    ->pluck("jabatan", "jabatan");
        return response()->json($jabatan);
    }

    public function getPangkat(Request $request)
    {
        $pangkat = DB::table("pegawai")
                    ->where("nama", $request->id)
                    ->pluck("pangkat", "pangkat");
        return response()->json($pangkat);
    }

    public function getTingkat(Request $request)
    {
        $tingkat = DB::table("pegawai")
                    ->where("nama", $request->id)
                    ->pluck("tingkat", "tingkat");
        return response()->json($tingkat);
    }

    //Fungsi Rincian Biaya
    public function getHN(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("Harian_Normal", "Harian_Normal");
        return response()->json($permenkeu);
    }

    public function getUP(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("PenginapanE1", "PenginapanE1");
        return response()->json($permenkeu);
    }

    public function getFD(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("Harian_Fullday", "Harian_Fullday");
        return response()->json($permenkeu);
    }

    public function getFB(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("Fullboard_Luar", "Fullboard_Luar");
        return response()->json($permenkeu);
    }

    public function getDiklat(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("Diklat", "Diklat");
        return response()->json($permenkeu);
    }

    public function getPenginapan(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("PenginapanG12", "PenginapanG12");
        return response()->json($permenkeu);
    }

    public function getTKU(Request $request)
    {
        $permenkeu = DB::table("permenkeu")
                    ->where("id", $request->id)
                    ->pluck("Taksi", "Taksi");
        return response()->json($permenkeu);
    }

    public function getTujuan(Request $request)
    {
        $tujuan = DB::table("kabupaten")
                    ->where("id_provinsi", $request->id)
                    ->pluck("kabupaten_kota", "kabupaten_kota");
        return response()->json($tujuan);
    }
}
