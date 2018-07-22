<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserManagementController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/user-management';

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
        $users = User::paginate(5);
        // $users = DB::table('users')
        // ->select('users.*')
        // ->paginate(5);

        return view('admin/users-mgmt/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users-mgmt/create');
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
        $keys = ['namauser', 'email', 'namalengkap', 'role', 'password'];
        $input = $this->createQueryInput($keys, $request);
        User::create([
            'namauser' => $request['namauser'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'namalengkap' => $request['namalengkap'],
            'role' => $request['role']
        ]);

        session()->flash('create_user', 'Berhasil Membuat User!');
        return redirect()->intended('/admin/user-management');


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
        $user = DB::table('users')
        ->find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/admin/user-management');
        }

        return view('admin.users-mgmt/edit', ['user' => $user]);
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
        $user = DB::table('users') //TANDAI
        ->find($id);
        $constraints = [
            'namauser' => 'required|max:20',
            'namalengkap'=> 'required|max:60',
            'role' => 'required|max:60'
            ];
        $input = [
            'namauser' => $request['namauser'],
            'namalengkap' => $request['namalengkap'],
            'role' => $request['role']
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        DB::table('users')
        ->where('id', $id)
        ->update($input);
        
        session()->flash('update_user', 'User Berhasil Diupdate!');
        return redirect()->intended('/admin/user-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')
        ->where('id', $id)->delete();
        session()->flash('delete_user', 'User Berhasil Dihapus!');
         return redirect()->intended('/admin/user-management');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'namauser' => $request['namauser'],
            'namalengkap' => $request['namalengkap'],
            'role' => $request['role'],
            'department' => $request['department']
            ];

       $users = $this->doSearchingQuery($constraints);
       return view('admin/users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'namauser' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'namalengkap' => 'required|max:60',
        'role' => 'required|max:60'
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
