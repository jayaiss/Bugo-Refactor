<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
use App\Http\Controllers\ResidentController;

// 1. Simple Route for the About Page (Direct View)
Route::view('/about', 'about');

// 2. Controller Route for Residents Page
Route::get('/residents', [ResidentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::get('/appointments', function () {
    return view('admin.appointments');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
