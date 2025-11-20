<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Home stuurt door naar de takenlijst
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Maakt alle standaard CRUD-routes voor TaskController
Route::resource('tasks', TaskController::class);
