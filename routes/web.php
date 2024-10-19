<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Rota para obter o CSRF token
Route::get('api/csrf-token', [ReservationController::class, 'getCsrfToken'])->middleware('web');

// Rotas de CRUD para reservas
Route::middleware('auth')->group(function () {
    Route::get('api/reservations', [ReservationController::class, 'index']);
    Route::get('api/reservations/{id}', [ReservationController::class, 'show']);
    Route::post('api/reservations', [ReservationController::class, 'store']);
    Route::put('api/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('api/reservations/{id}', [ReservationController::class, 'destroy']);

    // Rota para reservas
    Route::get('/reservations', function () {
        return view('reservations'); // A view para reservas
    });
});

// Rota para a tela de login
Route::get('/login', function () {
    return view('welcome'); // A view que contém o componente de login
})->name('login');

// Rota de autenticação
Route::post('/login', [AuthController::class, 'login']);

// Rota para redirecionar usuários não autenticados
Route::get('/{any}', function () {
    return redirect()->route('login'); // Redireciona para a tela de login
})->where('any', '.*');
