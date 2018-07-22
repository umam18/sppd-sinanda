<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class PembebananController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/admin/pembebanan';

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
        $pembebanan = DB::table('kode_pembebanan')
        ->select('kode_pembebanan.*')
        ->paginate(10);
        return view('admin/pembebanan/index', ['pembebanan' => $pembebanan]);
    }

     public function create()
    {
        return view('admin/pembebanan/create');
    }

    public function store(Request $request)
    {   
        $this->validateInput($request);
        $keys = ['kode', 'keterangan'];
        $input = $this->createQueryInput($keys, $request);
        DB::table('kode_pembebanan')
        ->insert($input);

        return redirect()->intended('/admin/pembebanan');
    }

    public function destroy($id)
    {
         DB::table('kode_pembebanan')
         ->where('id', $id)->delete();
         return redirect()->intended('/admin/pembebanan');
    }

    public function search(Request $request) {
        $constraints = [
            'kode' => $request['kode'],
            'keterangan' => $request['keterangan']
            ];

       $pembebanan = $this->doSearchingQuery($constraints);
       return view('admin/pembebanan/index', ['pembebanan' => $pembebanan, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('kode_pembebanan')->select();
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

    private function validateInput($request) {
        $this->validate($request, [
            'kode' => 'required|max:190',
            'keterangan' => 'required|max:190'
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