<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tasks');
});

Route::resource('tasks', TaskController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']);

require __DIR__.'/auth.php';
