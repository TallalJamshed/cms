<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Task;
use Auth;
use Session;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Response;


class TaskController extends Controller
{
    

    public function showTaskPage(){
        return view('addtask');
    }

    public function nextTasks(){
        $task = Task::where('fk_user_id','=',Auth::id())->where('task_date','>',date('Y-m-d'))->get();
        return view('homepage')->with('task' , $task);
    }

    public function previousTasks(){
        $task = Task::where('fk_user_id','=',Auth::id())->where('task_date','<',date('Y-m-d'))->get();
        return view('homepage')->with('task' , $task);
    }

    public function showEditTaskPage($id){
        $task = Task::where('fk_user_id','=',Auth::id())->where('task_id','=',Crypt::decrypt($id))->first();
        return view('edittaskpage')->with('task' , $task);
    }

    public function addTaskInDb(TaskRequest $request){
        $tasks = new Task();
        $inputs = $request->all();
        // if(isset($request->task_file)){
        //     $validator = Validator::make(
        //         [
        //              'task_file'      => $request->task_file,
        //              'extension' => strtolower($request->task_file->getClientOriginalExtension()),
        //         ],
        //         [
        //             'task_file'          => 'required',
        //             'extension'      => 'required|in:pdf',
        //         ]
        //       );
        //     if ($validator->fails()) {
        //         return back()->withErrors($validator);
        //     }
        //     $file = new File($request->task_file);
        //     $fileHash = str_replace('.' . $file->extension(), '', $file->hashName());
        //     $fileName = $fileHash . '.' . $request->task_file->getClientOriginalExtension();

        //     $path = Storage::disk('task_files')->putFileAs('', $file, $fileName);
        //     $tasks->task_file = $path;
        // }
        $tasks->fill($request->all());
        
        $tasks->fk_user_id = Auth::id();
        $tasks->save();
        Session::flash('message', 'Task is added'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('Home');
    }

    // public function getDownload($id)
    // {
    //     // dd($id);
    //     //PDF file is stored under project/public/download/info.pdf
    //     $file= public_path(). "/task_file_uploads". "/" .$id;
    //     // dd($file);

    //     $headers = array(
    //         'Content-Type: application/pdf',
    //     );

    //     return Response()->download($file,'',[],'inline');
    // }

    public function updateTaskData(TaskRequest $request){
        // dd($request->task_id);
        $task = new Task;
        $task = Task::find(Crypt::decrypt($request->task_id));
        
        // if(isset($request->task_file)){
        //     $validator = Validator::make(
        //         [
        //              'task_file'      => $request->task_file,
        //              'extension' => strtolower($request->task_file->getClientOriginalExtension()),
        //         ],
        //         [
        //             'task_file'          => 'required',
        //             'extension'      => 'required|in:pdf',
        //         ]
        //       );
        //     if ($validator->fails()) {
        //         return back()->withErrors($validator);
        //     }
        //     $file = new File($request->task_file);
        //     $fileHash = str_replace('.' . $file->extension(), '', $file->hashName());
        //     $fileName = $fileHash . '.' . $request->task_file->getClientOriginalExtension();

        //     $path = Storage::disk('task_files')->putFileAs('', $file, $fileName);
        //     $task->task_file = $path;
        // }

        $task->fill($request->all());
        $task->save();
        Session::flash('message', 'Task is updated'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('Home');
        
    }

    public function deleteTask(Request $request){
        Task::destroy($request->task_id);
        Session::flash('message', 'Your Task has been deleted'); 
        Session::flash('alert-class', 'alert-danger'); 
        return back();
    }
}
