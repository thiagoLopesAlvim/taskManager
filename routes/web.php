<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/taskindex', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/taskcreate', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::delete('/taskdelete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/taskstore', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/taskupdate/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::patch('/tasks/{task}/complete', [TaskController::class, 'markComplete'])->name('tasks.markComplete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
