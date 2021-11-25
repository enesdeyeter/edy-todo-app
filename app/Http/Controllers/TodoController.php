<?php

namespace App\Http\Controllers;

use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todo.index');
    }

    public function getAdminTodosRecord(){
        $currUserID = Auth::user()->id;

        $users = DB::table('todos')
            ->where('userid',$currUserID)
            ->get();

        return Datatables::of($users)->make();
    }

    public function getTodosRecord(){
        $currUserRole = Auth::user()->role;
        $currUserID = Auth::user()->id;

        if ($currUserRole == 0){
            $users = DB::table('todos')->get();

            return Datatables::of($users)->make();
        }
        else {
            $users = DB::table('todos')
                ->where('userid',$currUserID)
                ->get();

            return Datatables::of($users)->make();
        }
    }

    public function completeTodo($id){
//        dd($id);

        $findTodo = Todo::findOrFail($id);

        $findTodo->status = 1;

        $findTodo->save();
        return redirect('todos/'.$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currUser = Auth::user()->id;
        $lastTheree = DB::table('todos')
            ->where('userid',$currUser)
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();

        return view('todo.create',compact("lastTheree"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(Auth::user()->id);

        $todo = DB::table('todos')->insertGetId(array(
            "userid"=>Auth::user()->id,
            "title"=>$request->todoTitle,
            "content"=>$request->todoContent,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ));

//        dd($todo); //true

        if ($todo)
            return redirect('todos/'.$todo);

        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currUser = Auth::user()->id;
        $todo = Todo::where('id',$id)->where('userid',$currUser)->get();
        if (!$todo->isEmpty()){
            $todo = Todo::where('id',$id)->first();
            return view("todo.single",compact("todo"));
        }
        else
            abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id',$id)->first();

        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request->request);

        $findTodo = Todo::findOrFail($request->id);
        $findTodo->title = $request->todoTitle;
        $findTodo->content = $request->todoContent;

//        $findTodo->status = 1;

        $findTodo->save();
        return redirect('todos/'.$request->id);
//        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $findTodo = Todo::findOrFail($id);
        $findTodo->delete();
        return redirect()->back();
    }
}
