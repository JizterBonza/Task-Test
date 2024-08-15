<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('tasks.index');
// });

Route::get('/', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/tasks/update', [TaskController::class, 'update'])->name('tasks.update');
Route::post('/tasks/delete', [TaskController::class, 'delete'])->name('tasks.delete');
