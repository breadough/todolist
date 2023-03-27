<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        // return view('welcome', ['Tasks' => Task::all()]);
        return view('welcome', ['Tasks' => Task::where('is_done', 0)->orderByDesc('priority')->get(), 'TasksDone' => Task::where('is_done', 1)->get()]);
    }
    public function saveTask(Request $request) {
        
        $newTask =  new Task;
        $newTask->name = $request->inputTask;
        $newTask->description = $request->inputTaskDescription;
        $newTask->priority = $request->inputTaskPriority;
        $newTask->is_done = 0;
        $newTask->save();

        return redirect('/');
    }

    public function markDone($id){

        $newTask = Task::find($id);
        $newTask->is_done = 1;
        $newTask->save();

        return redirect('/');
    }

    public function deleteTask($id){

        $newTask = Task::find($id);
        $newTask->delete();

        return redirect('/');
    }

    public function restoreTask($id){

        $newTask = Task::find($id);
        $newTask->is_done = 0;
        $newTask->save();

        return redirect('/');
    }
}