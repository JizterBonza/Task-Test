<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    public $return_message = "";
    
    //GET TASKS
    public function index(){
        $tasks = Tasks::where('status', 1)->get();

        $all_tasks = Tasks::where('status', 1)->count();
        $tasks_completed = Tasks::where('task_completed', 1)->where('status', 1)->count();

        return view('tasks.index', [
            'tasks' => $tasks,
            'all_tasks' => $all_tasks,
            'tasks_completed' => $tasks_completed,
            'return_message' => $this->return_message
        ]);
    }

    //INSERT NEW TASKS
    public function store(Request $request){
        request()->validate([
            'add_task_title' => 'required|max:255|min:1',
            'add_task_description' => 'required|max:255|min:1'
        ]);

        $attributes =[
            'task_title' => $request->input('add_task_title'),
            'task_description' => $request->input('add_task_description')
        ];

        try{
            $add_task = Tasks::create($attributes);
            $this->return_message = "Successfully added task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $this->return_message = "Failed to add task.";
        }

        return $this->index();
    }

    //UPDATE TASKS
    public function update(Request $request){

        try{
            $update_task = Tasks::where('id', $request->input('task_id'))->update(['task_completed' => 1]);
            $this->return_message = "Successfully updated task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $this->return_message = "Failed to update task.";
        }

        return $this->index();
    }

    //DELETE TASKS
    public function delete(Request $request){

        try{
            $delete_task = Tasks::where('id', $request->input('task_id'))->update(['status' => 0]);
            $this->return_message = "Successfully deleted task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $this->return_message = "Failed to delete task.";
        }

        return $this->index();
    }
}
