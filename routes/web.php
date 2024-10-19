<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Rota para obter o CSRF token
Route::get('api/csrf-token', [ReservationController::class, 'getCsrfToken'])->middleware('web');

// Suas rotas de CRUD para reservas
Route::middleware('web')->group(function () {
    Route::get('api/reservations', [ReservationController::class, 'index']);
    Route::get('api/reservations/{id}', [ReservationController::class, 'show']);
    Route::post('api/reservations', [ReservationController::class, 'store']);
    Route::put('api/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('api/reservations/{id}', [ReservationController::class, 'destroy']);
});

Route::get('/{any}', function () {
    return view('welcome'); // ou o nome do seu arquivo Blade principal
})->where('any', '.*');


Route::get('/reservations', function () {
    return view('reservations'); // Crie um arquivo reservations.blade.php a seguir
});

Route::post('/login', [AuthController::class, 'login']);

