<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HotelController;
use App\Http\Controllers\Api\V1\ReservationController;

// Routes publiques
Route::post('/register', [AuthController::class, 'registerCustomer']);
Route::post('/login/customer', [AuthController::class, 'loginCustomer']);
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);

// Routes protégées par le guard customer
Route::middleware(['auth:customer' ,'auth:admin'])->group(function () {
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::get('/hotels/{id}', [HotelController::class, 'show']);

    Route::middleware(['reservation.limit'])->group(function () {
        Route::post('/reservations', [ReservationController::class, 'store']);
    });

    // ici on donne seulement les reservations du user lui meme et non tout les reservations
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::get('/reservations/{id}', [ReservationController::class, 'show']);
    Route::put('/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
});

// Routes protégées par le guard admin
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/hotels', [HotelController::class, 'store']);
    Route::put('/hotels/{id}', [HotelController::class, 'update']);
    Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);

    Route::get('/hotels/{hotelId}/reservations', [ReservationController::class, 'getByHotel']);
});

// Route de déconnexion (accessible aux deux guards)
Route::middleware(['auth'])->post('/logout', [AuthController::class, 'logout']);
