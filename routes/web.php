<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/', [EventController::class, 'welcome'])->middleware('guest');
Route::post('/create/event', [EventController::class, 'store'])->middleware('is_admin');
Route::get('/event/list', [EventController::class, 'show'])->middleware('is_admin');
Route::get('/edit/{post}', [EventController::class, 'edit'])->middleware('is_admin');
Route::put('/edit/{post}', [EventController::class, 'update'])->middleware('is_admin');
Route::delete('/delete/{post}/data', [EventController::class, 'delete'])->middleware('is_admin');

Route::get('/participant', [ParticipantController::class, 'view'])->middleware('auth');
Route::post('/participant', [ParticipantController::class, 'add'])->middleware('auth');
Route::get('/participant/list', [ParticipantController::class, 'list'])->middleware('auth');
Route::delete('/destroy/{post}', [ParticipantController::class, 'delete'])->middleware('auth');
Route::delete('/cancel/{post}', [ParticipantController::class, 'cancel'])->middleware('auth');
Route::get('/event/registered', [ParticipantController::class, 'event'])->middleware('auth');
