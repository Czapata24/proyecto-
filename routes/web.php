<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ReservationController;

Route::resource('dishes', DishController::class);
Route::resource('reservations', ReservationController::class);

Route::get('/', function () {
    return view('welcome');
});
