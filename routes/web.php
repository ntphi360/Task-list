<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;



Route::get('/', function () {
    redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class); 