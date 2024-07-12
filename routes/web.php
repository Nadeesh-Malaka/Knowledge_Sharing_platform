<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/rules', [HomeController::class, 'rules'])->name('rules');

Route::middleware(['auth'])->group(function () {
    Route::get('/myProfile', [ProfileController::class, 'show'])->name('myProfile');
    Route::put('/myProfile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/myProfile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

    Route::get('/que', [PostController::class, 'index'])->name('que');
    Route::post('/que', [PostController::class, 'store'])->name('que.store');
    Route::post('/like/{post}', [PostController::class, 'toggleLike'])->name('like.toggle');

    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

Route::middleware(['auth', 'admin'])->group(function () {

   Route::get('admin/dashboard', [AdminController::class, 'adminhome'])->name('adminhome');
   Route::get('admin/add_user',[AdminController::class,'adduser'])->name('adduser');
   Route::post('admin/store_user',[AdminController::class,'storeuser'])->name('storeuser');
   Route::get('admin/edit_user/{id}', [AdminController::class, 'showedit'])->name('showedit');
   Route::post('admin/edit_user/{id}', [AdminController::class, 'edituser'])->name('edituser');
   Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

   Route::get('admin/view_post', [AdminController::class, 'viewpost'])->name('viewpost');
   Route::get('admin/add_post', [AdminController::class, 'addpost'])->name('addpost');
   Route::post('admin/store_post', [AdminController::class, 'storepost'])->name('storepost');
   Route::delete('admin/delete_post/{id}', [AdminController::class, 'deletepost'])->name('deletepost');
   Route::get('admin/mark_as_approved/{id}', [AdminController::class, 'markasapproved'])->name('markasapproved');
   Route::get('admin/mark_as_not_approved/{id}', [AdminController::class, 'markasnotapproved'])->name('markasnotapproved');
   Route::get('admin/update_post/{id}', [AdminController::class, 'showupdatepost'])->name('updatepost');
   Route::post('admin/update_post/{id}', [AdminController::class, 'updatepost'])->name('updatepost');






});


Route::get('/auth', function () {
    return view('login');
})->name('auth');

require __DIR__.'/auth.php';


