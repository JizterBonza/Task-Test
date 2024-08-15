<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [ApiController::class, 'tasks'])->name('tasks');
Route::post('/tasks', [ApiController::class, 'store'])->name('store');
Route::post('/tasks_update', [ApiController::class, 'update'])->name('update');
Route::post('/tasks_delete', [ApiController::class, 'delete'])->name('delete');
