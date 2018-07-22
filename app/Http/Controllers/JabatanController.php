<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class JabatanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo = '/admin/jabatan';

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
        $jabatan = DB::table('jabatan')
        ->select('jabatan.*')
        ->paginate(10);
        return view('admin/jabatan/index', ['jabatan' => $jabatan]);
    }

     public function create()
    {
        return view('admin/jabatan/create');
    }

    public function store(Request $request)
    {   
        $this->validateInput($request);
        $keys = ['jabatan'];
        $input = $this->createQueryInput($keys, $request);
        DB::table('jabatan')
        ->insert($input);

        return redirect()->intended('/admin/jabatan');
    }

    public function edit($id)
    {
        $kode = DB::table('jabatan')
        ->get();
        $jabatan = DB::table('jabatan') //TANDAI
        ->find($id);
        if ($jabatan == null || count($jabatan) == 0) {
            return redirect()->intended('/admin/jabatan');
        }
        return view('admin/jabatan/edit', ['jabatan' => $jabatan, 'kode' => $kode]);
    }

    public function update(Request $request, $id)
    {
        $jabatan = DB::table('jabatan')
        ->find($id);
        $this->validateInput($request);
        $keys = ['jabatan'];
        $input = $this->createQueryInput($keys, $request);
        DB::table('jabatan')
        ->where('id', $id)
        ->update($input);

        return redirect()->intended('/admin/jabatan');
    }

    public function destroy($id)
    {
         DB::table('jabatan')
         ->where('id', $id)
         ->delete();
         return redirect()->intended('/admin/jabatan');
    }

    public function search(Request $request) {
        $constraints = [
            'jabatan' => $request['jabatan']
            ];

       $jabatan = $this->doSearchingQuery($constraints);
       return view('admin/jabatan/index', ['jabatan' => $jabatan, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('jabatan')->select();
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
            'jabatan' => 'required|max:100'
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