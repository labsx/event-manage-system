<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
use App\Models\Participant;

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




Route::get('/', [DashboardController::class, 'welcome'])->middleware('guest');
Route::get('/dashboard/{post}', [DashboardController::class, 'eventData']);
Route::middleware(['middleware' => 'is_admin'])->group(function(){
    Route::get('/admin/home', [EventController::class, 'index'])->name('admin.home');
    Route::post('/event', [EventController::class, 'store']);
    Route::get('/event', [EventController::class, 'show']);
    Route::get('/event/{post}', [EventController::class, 'edit']);
    Route::put('/event/{post}', [EventController::class, 'update']);
    Route::delete('/event/{post}', [EventController::class, 'delete']);
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/user', [UserController::class, 'create']);
});
Route::middleware(['middleware' => 'auth'])->group(function(){
    Route::get('/home', [ParticipantController::class, 'index'])->name('home');
    Route::get('/participant', [ParticipantController::class, 'view']);
    Route::post('/participant', [ParticipantController::class, 'add']);
    Route::get('/participant/list', [ParticipantController::class, 'list']);
    Route::delete('/destroy/{post}', [ParticipantController::class, 'delete']);
    Route::delete('/participant/{post}', [ParticipantController::class, 'cancel']);
});