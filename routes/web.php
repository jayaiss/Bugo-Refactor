<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use Inertia\Inertia;
use App\Http\Controllers\ResidentController;
use Illuminate\Http\Request; // Needed for the login check

// --- 1. LANDING PAGE (Root URL) ---
Route::get('/', function () {
    return view('admin.landing_page'); 
})->name('home');

// --- 2. LOGIN PAGE (View) ---
// This overrides the default auth login view
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// --- 3. CUSTOM FRONTEND LOGIN LOGIC ---
// This handles the form submission
Route::post('/login', function (Request $request) {
    
    // Hardcoded credentials for Frontend Demo
    $demoEmail = 'admin@barangay.gov.ph';
    $demoPassword = 'password';

    if ($request->email === $demoEmail && $request->password === $demoPassword) {
        // SUCCESS: Redirect to Dashboard
        return redirect('/dashboard');
    }

    // FAILURE: Go back with error
    return back()->withErrors([
        'email' => 'Invalid credentials for demo.',
    ]);
});

// --- 4. DASHBOARD (UNPROTECTED FOR DEMO) ---
// I removed "middleware(['auth'])" so you can access it without a database user
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// --- 5. LOGOUT LOGIC ---
Route::post('/logout', function () {
    // Since we aren't using real auth, we just redirect to Landing Page
    return redirect('/'); 
})->name('logout');


// --- OTHER ADMIN PAGES ---
Route::get('/admin', function () { return view('layouts.admin'); });
Route::get('/on-site-req', function () { return view('admin.on-site-req'); });
Route::get('/appointment_list', function () { return view('admin.appointment_list'); });
Route::get('/event-list', function () { return view('admin.event-list'); });
Route::get('/reports', function () { return view('admin.reports'); });
Route::get('/resident_audit', function () { return view('admin.resident_audit'); });
Route::get('/admin_audit', function () { return view('admin.admin_audit'); });
Route::get('/archive', function () { return view('admin.archive'); });
Route::get('/feedbacks', function () { return view('admin.feedbacks'); });
Route::get('/announcements', function () { return view('admin.announcements'); });
Route::get('/faqs', function () { return view('admin.faqs'); });
Route::get('/case-list', function () { return view('admin.case-list'); });
Route::get('/request_list', function () { return view('admin.request_list'); });
Route::get('/medicine_inventory', function () { return view('admin.medicine_inventory'); });
Route::get('/resident_list', function () { return view('admin.resident_list'); });
Route::get('/beso-list', function () { return view('admin.beso-list'); });

// --- SETTINGS & PROFILE ---
Route::get('/edit_settings', function () {
    return view('Profile_Settings.edit_settings'); 
})->name('settings.edit'); 

Route::get('/edit_profile', function () {
    return view('profile.edit_profile'); 
})->name('profile.edit'); 

// --- ABOUT & RESIDENTS ---
Route::view('/about', 'about');
Route::get('/residents', [ResidentController::class, 'index']);

// Note: I commented out 'require auth.php' so it doesn't interfere with our custom frontend logic
// require __DIR__.'/auth.php';