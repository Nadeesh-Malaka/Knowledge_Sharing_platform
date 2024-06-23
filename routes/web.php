<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin; // Corrected namespace

// Route::get('/', function () {return view('user.home');})->name('home');
// Route::get('/about', function () {return view('user.home');})->name('home');
// Route::get('/chat', function () {return view('user.home');})->name('home');
// Route::get('/contact', function () {return view('user.home');})->name('home');
// Route::get('/faq', function () {return view('user.home');})->name('home');
// Route::get('/privacy', function () {return view('user.home');})->name('home');
// Route::get('/rules', function () {return view('user.home');})->name('home');
 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/rules', [HomeController::class, 'rules'])->name('rules');
Route::get('/myProfile', [HomeController::class, 'myProfile'])->name('myProfile');


Route::middleware(['auth'])->group(function () {
    Route::get('/que', [HomeController::class, 'que'])->name('que');
    Route::get('/chat', [HomeController::class, 'chat'])->name('chat');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'admindash']);
});


Route::get('/auth', function () {
    return view('login');
})->name('auth');

require __DIR__.'/auth.php';
