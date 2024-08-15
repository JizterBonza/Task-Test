
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header" style="margin-top: 20px;">
            <div class="container-fluid">
                <div class="row mb-2" style="text-align: center;">
                    <h1>To-Do Tasks: {{ $tasks_completed }}/{{ $all_tasks }}</h1>
                </div>
            </div>
        </section>

        <!-- Main Content -->
         <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form role="form" method="post" class="form-horizontal" action="{{ route('tasks.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-3" style="margin-top: 10px;">
                                            <input type="text" name="add_task_title" id="add_task_title" class="form-control" placeholder="Enter task title..." required>
                                        </div>
                                        <div class="col-md-7" style="margin-top: 10px;">
                                            <input type="text" name="add_task_description" id="add_task_description" class="form-control" placeholder="Enter task description..." required>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-success">Add New Task</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <br>
                @foreach($tasks as $task)
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="card">
                                @if($task->task_completed == 1)
                                    <div class="card-body  bg-success" style="color:white;">
                                        <div class="card-title"><h3>{{$task->task_title}}</h3></div>
                                            <p> {{$task->task_description}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <h3>Completed!</h3>
                                        <form role="form" method="post" class="form-horizontal" action="{{ route('tasks.delete') }}">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{$task->id}}">
                                            <button type="submit" class="btn btn-danger" style="float:right;margin: 10px;"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <div class="card-title"><h3>{{$task->task_title}}</h3></div>
                                            <p> {{$task->task_description}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <form role="form" method="post" class="form-horizontal" action="{{ route('tasks.update') }}">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{$task->id}}">
                                            <button type="submit" class="btn btn-success" style="float:right;margin: 10px;"><i class="fa-solid fa-check"></i></button> 
                                        </form>
                                        <form role="form" method="post" class="form-horizontal" action="{{ route('tasks.delete') }}">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{$task->id}}">
                                            <button type="submit" class="btn btn-danger" style="float:right;margin: 10px;"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br>
                @endforeach
            </div>
         </section>
    </div>
@endsection