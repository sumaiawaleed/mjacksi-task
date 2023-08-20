<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'createUser']);
Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'loginUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
});

Route::apiResource('notes', App\Http\Controllers\Api\NoteController::class)->middleware('auth:sanctum');
    Route::get('notifications',[App\Http\Controllers\Api\NotificationController::class,'index'])->middleware('auth:sanctum');
    Route::get('adminNotes',[App\Http\Controllers\Api\NoteController::class,'admin']);