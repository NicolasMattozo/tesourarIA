<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\BusPassengerController;
use App\Http\Controllers\EventParticipantsController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('users', UserController::class);
Route::resource('transactions', TransactionsController::class);
Route::resource('events', EventsController::class);
Route::resource('bus', BusController::class);
Route::prefix('bus/{bus}')->name('bus.')->group(function () {
    Route::resource('passengers', BusPassengerController::class);
});
Route::prefix('events/{event}')->name('event.')->group(function () {
    Route::resource('participants', EventParticipantsController::class);
});