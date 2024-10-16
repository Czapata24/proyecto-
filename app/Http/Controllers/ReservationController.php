<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Dish;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Obtener reservas del usuario
        /* Usuarios autenticados
        $reservations = Reservation::where('user_name', auth()->user()->name)->get();
        return view('reservations.index', compact('reservations'));
        */
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        // Obtener todos los platos para que el usuario pueda elegir
        $dishes = Dish::all();
        return view('reservations.create', compact('dishes'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'user_name' => 'required|string',
        ]);

        // Crear la reserva
        $reservation = new Reservation();
        $reservation->dish_id = $request->dish_id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->user_name = $request->user_name;
        $reservation->save();
        /* Usuarios autenticados
        Reservation::create([
            'dish_id' => $request->dish_id,
            'user_name' => auth()->user()->name,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        */
        return redirect()->route('reservations.index')->with('success', 'Reserva creada correctamente.');
    }

    public function edit(Reservation $reservation)
    {
        $dishes = Dish::all();
        return view('reservations.edit', compact('reservation', 'dishes'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
