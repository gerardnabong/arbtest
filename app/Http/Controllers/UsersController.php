<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select u.name as user, r.name as role, u.id, u.email, u.created_at from users u left join roles r on r.id = u.roleid');
        return view('user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('user.create')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'roleid' => 'required',
            'email' => 'required'
        ]);

        $user = new User; 
        $user->roleid = $request->input('roleid');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make('12345678');
        $user->save();

        return redirect('/users')->with('success', 'User Created');
    }

    public function validateuser(Request $request)
    {
      

        $user = User::find($request); 
       

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(

            'user' => User::find($id),
            'role' => Role::all()
        );
        
        return view ('user.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $this->validate($request,[
            'name' => 'required',
            'roleid' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id); 
        $user->roleid = $request->input('roleid');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/users')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 
        $user->delete();
        return redirect('/users')->with('success', 'User Deleted');
    }
}
