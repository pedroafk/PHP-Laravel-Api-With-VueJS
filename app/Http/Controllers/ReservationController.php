<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

    public function show($id)
    {
        return Reservation::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'date' => 'date',
            'time' => 'date_format:H:i',
            'number_of_guests' => 'integer|min:1',
        ]);

        $reservation->update($validated);

        return response()->json($reservation, 200);
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json(null, 204);
    }

    public function getCsrfToken()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
        ]);
    }
}
