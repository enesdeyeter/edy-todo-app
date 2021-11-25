<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $currUser = Auth::user()->id;
        $user = User::where('id',$currUser)->first();

        $totalTodo = Todo::where('userid',$currUser)->count();
        $completedTodo = Todo::where('userid',$currUser)->where('status',1)->count();
        $uncompletedTodo = Todo::where('userid',$currUser)->where('status',0)->count();

//        dd($uncompletedTodo);

        return view("auth.profile",compact("user","totalTodo","completedTodo","uncompletedTodo"));
    }

    public function setAdmin($id){
        $findUser = User::findOrFail($id);

        $findUser->role = 0;

        $findUser->save();
        return redirect('users');
    }

    public function setUser($id){
        $findUser = User::findOrFail($id);

        $findUser->role = 1;

        $findUser->save();
        return redirect('users');
    }

    public function users(){
        $allUsers = User::get();

        return view('users.setAdmin',compact('allUsers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
