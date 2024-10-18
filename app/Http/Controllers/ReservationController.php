<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Listar todas as reservas
    public function index()
    {
        return Reservation::all();
    }

    // Mostrar uma reserva específica
    public function show($id)
    {
        return Reservation::findOrFail($id);
    }

    // Criar uma nova reserva
    public function store(Request $request)
    {
        // Validar os dados da reserva
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        // Criar a reserva
        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }

    // Atualizar uma reserva existente
    public function update(Request $request, $id)
    {
        // Encontrar a reserva pelo ID
        $reservation = Reservation::findOrFail($id);

        // Validar os dados da atualização
        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'date' => 'date',
            'time' => 'date_format:H:i',
            'number_of_guests' => 'integer|min:1',
        ]);

        // Atualizar os dados da reserva
        $reservation->update($validated);

        return response()->json($reservation, 200);
    }

    // Excluir uma reserva
    public function destroy($id)
    {
        // Encontrar e excluir a reserva pelo ID
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json(null, 204);
    }

    // Obter o token CSRF
    public function getCsrfToken()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
        ]);
    }
}
