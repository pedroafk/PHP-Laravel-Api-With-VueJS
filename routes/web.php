<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('api/csrf-token', [ReservationController::class, 'getCsrfToken'])->middleware('web');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('web')->group(function () {
    Route::get('api/reservations', [ReservationController::class, 'index']);
    Route::get('api/reservations/{id}', [ReservationController::class, 'show']);
    Route::post('api/reservations', [ReservationController::class, 'store']);
    Route::put('api/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('api/reservations/{id}', [ReservationController::class, 'destroy']);
});

Route::get('/login', function () {
    return view('welcome');
})->name('login');


Route::get('/reservations', function () {
    return view('reservations');
})->middleware('auth');



Route::get('/{any}', function () {
    return redirect()->route('login');
})->where('any', '.*');
