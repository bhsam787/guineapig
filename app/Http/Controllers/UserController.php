<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');

     }

    public function index()
    {
        $users= User::all();
        return view('dashboard.view_user',[
          'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= request()->validate([
          'name'=>'required',
          'email'=>'required|email',
          'password'=>'required',
          'user_type'=>'required'
        ]);

        User::create($data);
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $user->delete();
      return redirect()->route('user.index')->with('success','data deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.edit_user')->with('users', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idUser
 * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $data= request()->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        'user_type'=>'required'
      ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->user_type=$request->user_type;
        $user->save();

      return redirect()->route('user.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      dd("ok");
      $user->delete();
      return redirect()->route('user.index')->with('success','data deleted successfully');
    }

}
