<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use Inertia\Inertia;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 1. Simple Route for the About Page (Direct View)
Route::view('/about', 'about');

// 2. Controller Route for Residents Page
Route::get('/residents', [ResidentController::class, 'index']); 

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/on-site_request', function () {
    return view('admin.on-site_request');
});
Route::get('/on-site-req', function () {
    return view('admin.on-site-req');
});
Route::get('/beso-list', function () {
    return view('admin.beso-list');
});
Route::get('/case-list', function () {
    return view('admin.case-list');
});
Route::get('/event-list', function () {
    return view('admin.event-list');
});


Route::get('/appointment_list', function () {
    return view('admin.appointment_list'); 
});
Route::get('/event_list', function () {
    return view('admin.event_list'); 
});
Route::get('/reports', function () {
    return view('admin.reports'); 
});
Route::get('/resident_audit', function () {
    return view('admin.resident_audit'); 
});
Route::get('/admin_audit', function () {
    return view('admin.admin_audit'); 
});
Route::get('/archive', function () {
    return view('admin.archive'); 
});
Route::get('/feedbacks', function () {
    return view('admin.feedbacks'); 
});
Route::get('/announcements', function () {
    return view('admin.announcements'); 
});
Route::get('/faqs', function () {
    return view('admin.faqs'); 
});
Route::get('/cases', function () {
    return view('admin.cases'); 
});
Route::get('/request_list', function () {
    return view('admin.request_list'); 
});
Route::get('/medicine_inventory', function () {
    return view('admin.medicine_inventory'); 
});
Route::get('/resident_list', function () {
    return view('admin.resident_list'); 
});
Route::get('/official-list', function () {
    return view('admin.official-list'); 
});
Route::get('/employee-list', function () {
    return view('admin.employee-list'); 
});
Route::get('/certificate', function () {
    return view('admin.certificate'); 
});
Route::get('/time-slot', function () {
    return view('admin.time-slot'); 
});
Route::get('/zone-leaders', function () {
    return view('admin.zone-leaders'); 
});
Route::get('/guidelines', function () {
    return view('admin.guidelines'); 
});

// --- UPDATED AUTH ROUTES (Profile & Settings) ---
Route::middleware('auth')->group(function () {
    
    // 1. Profile Page - VIEW
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    // 2. Profile Page - SAVE ACTION (Placeholder)
    // We need this route defined or the form on the profile page will crash
    Route::patch('/profile', function () {
        return back(); 
    })->name('profile.update');

    // 3. Settings Page - VIEW
    Route::get('/Profile_Settings', function () {
        return view('/Profile_Settings.edit_settings');
    })->name('/Profile_Settings.edit_settings');

    // 4. Settings Page - SAVE ACTION (Placeholder)
    // We need this route defined or the form on the settings page will crash
    Route::put('/password', function () {
        return back();
    })->name('password.update');
});

require __DIR__.'/auth.php';