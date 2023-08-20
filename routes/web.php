<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin-login');


Route::middleware(['auth', 'web'])->prefix('dashboard')->name('dashboard'. '.')->group(function () {
    Route::get('/home',[App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::get('users',[App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('users/notes/{id}',[App\Http\Controllers\UserController::class, 'notes'])->name('users.notes');
    Route::get('users/notifications/{id}',[App\Http\Controllers\UserController::class, 'notifications'])->name('users.notifications');
    Route::post('users/notifications',[App\Http\Controllers\UserController::class, 'store_notifications'])->name('notifications.store');
    Route::get('users/add_note/{id}',[App\Http\Controllers\UserController::class, 'add_note'])->name('users.add_note');

    Route::get('notifications',[App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
    Route::resource('notes',App\Http\Controllers\NoteController::class);
    Route::get('notes/remove/{id}',[App\Http\Controllers\NoteController::class,'remove'])->name('notes.remove');

});