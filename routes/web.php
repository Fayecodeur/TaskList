<?php

use App\Http\Controllers\TacheController;
// use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TacheController::class, 'index'])->name('index');

Route::resource('/task', TacheController::class);


// Route::get('/task/create', [TaskController::class, 'create'])->name('create');
// Route::post('/task/create', [TaskController::class, 'store'])->name('store');
// Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('edit');
// Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('update');
// Route::delete('/task/delete/{id}', [TaskController::class, 'delete'])->name('delete');
