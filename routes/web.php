<?php

use App\Http\Controllers\ReservationController;

// Rota para obter o CSRF token
Route::get('api/csrf-token', [ReservationController::class, 'getCsrfToken']);

// Suas rotas de CRUD para reservas
Route::get('api/reservations', [ReservationController::class, 'index']);
Route::get('api/reservations/{id}', [ReservationController::class, 'show']);
Route::post('api/reservations', [ReservationController::class, 'store']);
Route::put('api/reservations/{id}', [ReservationController::class, 'update']);
Route::delete('api/reservations/{id}', [ReservationController::class, 'destroy']);
