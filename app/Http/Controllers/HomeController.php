<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $task = Task::where('fk_user_id','=',Auth::id())->where('task_date','=',date('Y-m-d'))->get();
        // dd(getMimeType($task->task_file));
        return view('homepage')->with('task' , $task);
    }

    // public function create(){
    //     return view('legalnotice2');
    // }

}
