<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Permenkeu;
use Response;

class PermenkeuController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/permenkeu';

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permenkeu = Permenkeu::paginate(10);

        return view('admin/permenkeu/index', ['permenkeu' => $permenkeu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/permenkeu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         Permenkeu::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'fullname' => $request['fullname'],
            'role' => $request['role']
        ]);

        session()->flash('create_permenkeu', 'Berhasil Membuat Data Permenkeu!');
        return redirect()->intended('/admin/permenkeu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permenkeu = Permenkeu::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($permenkeu == null || count($permenkeu) == 0) {
            return redirect()->intended('/admin/permenkeu');
        }

        return view('admin/permenkeu/edit', ['permenkeu' => $permenkeu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permenkeu = Permenkeu::findOrFail($id);
        $constraints = [
            'Harian_Normal' => 'required|max:20',
            'Harian_Fullday'=> 'required|max:20',
            'Fullboard_Dalam' => 'required|max:20',
            'Diklat' => 'required|max:20'
            ];
        $input = [
            'Harian_Normal' => $request['Harian_Normal'],
            'Harian_Fullday' => $request['Harian_Fullday'],
            'Fullboard_Dalam' => $request['Fullboard_Dalam'],
            'Diklat' => $request['Diklat']
        ];

        $this->validate($request, $constraints);
        Permenkeu::where('id', $id)
            ->update($input);
        
        session()->flash('update_permenkeu', 'Berhasil Membuat Data Permenkeu!');
        return redirect()->intended('/admin/permenkeu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permenkeu::where('id', $id)->delete();

        session()->flash('delete_permenkeu', 'Berhasil Membuat Data Permenkeu!');
         return redirect()->intended('/admin/permenkeu');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'provinsi' => $request['provinsi'],
            ];

       $permenkeu = $this->doSearchingQuery($constraints);
       return view('admin/permenkeu/index', ['permenkeu' => $permenkeu, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Permenkeu::query();
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
        'Harian_Normal' => 'required|max:20',
        'Harian_Fullday' => 'required|max:20',
        'Fullboard_Dalam' => 'required|max:20',
        'Diklat' => 'required|max:20'
    ]);
    }
}
