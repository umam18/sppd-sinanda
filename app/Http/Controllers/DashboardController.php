<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('admin/dashboard');
    }

    public function pegawai()
    {   
        session()->flash('event', 'SPD Event Berhasil Dibuat!');
        return view('pegawai/dashboard');
    }
}
