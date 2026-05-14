<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('tasks.index');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks.index');
    Route::patch('/tasks/{id}/confirm', [TaskController::class, 'confirmTask'])
        ->name('tasks.confirmTask');
    Route::patch('/tasks/{id}/cancel', [TaskController::class, 'cancelTask'])
        ->name('tasks.cancelTask');
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';
