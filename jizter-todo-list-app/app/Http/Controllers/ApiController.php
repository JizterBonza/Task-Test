<?php

namespace App\Http\Controllers;
use App\Models\Tasks;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //GET TASKS
    public function tasks(){
        $tasks = Tasks::where('status', 1)->get();

        $all_tasks = Tasks::where('status', 1)->count();
        $tasks_completed = Tasks::where('task_completed', 1)->where('status', 1)->count();

        $data = [
            "All_Tasks" => $tasks
        ];

        return response()->json($data);
    }

    //INSERT NEW TASKS
    public function store(Request $request){
        $response = "";
        $attributes =[
            'task_title' => $request->input('add_task_title'),
            'task_description' => $request->input('add_task_description')
        ];

        try{
            $add_task = Tasks::create($attributes);
            $response = "Successfully added task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $response = "Failed to add task.";
        }

        return $response;
    }

    //UPDATE TASKS
    public function update(Request $request){
        $response = "";
        try{
            $update_task = Tasks::where('id', $request->input('task_id'))->update(['task_completed' => 1]);
            $response = "Successfully updated task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $response = "Failed to update task.";
        }

        return $response;
    }

    //DELETE TASKS
    public function delete(Request $request){
        $response = "";
        try{
            $delete_task = Tasks::where('id', $request->input('task_id'))->update(['status' => 0]);
            $response = "Successfully deleted task.";
        }catch(\Illuminate\Database\QueryException $exception){
            $response = "Failed to delete task.";
        }

        return $response;
    }
}
