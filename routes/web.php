<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');    

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/user/{id}', function ($id) {
    return "Profil pengguna dengan ID: " . $id;
});

