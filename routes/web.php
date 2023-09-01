<?php

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




Route::get('/', [EventController::class, 'welcome'])->middleware('guest');
Route::middleware(['middleware' => 'is_admin'])->group(function(){
    Route::get('/admin/home', [EventController::class, 'adminHome'])->name('admin.home');
    Route::post('/create/event', [EventController::class, 'store']);
    // Route::get('/event/list', [EventController::class, 'show']);
    Route::get('/event/list', [EventController::class, 'show']);
    Route::get('/edit/{post}', [EventController::class, 'edit']);
    Route::put('/edit/{post}', [EventController::class, 'update']);
    Route::delete('/delete/{post}/data', [EventController::class, 'delete']);
    Route::get('/add/user', [UserController::class, 'userShow']);
    Route::post('/add/user', [UserController::class, 'userAdd']);
});
Route::middleware(['middleware' => 'auth'])->group(function(){
    Route::get('/home', [ParticipantController::class, 'index'])->name('home');
    Route::get('/participant', [ParticipantController::class, 'view']);
    Route::post('/participant', [ParticipantController::class, 'add']);
    Route::get('/participant/list', [ParticipantController::class, 'list']);
    Route::delete('/destroy/{post}', [ParticipantController::class, 'delete']);
    Route::delete('/cancel/{post}', [ParticipantController::class, 'cancel']);
    Route::get('/event/registered', [ParticipantController::class, 'event']);
});