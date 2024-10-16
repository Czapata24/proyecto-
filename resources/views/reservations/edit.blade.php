@extends('layouts.app')

@section('content')
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservations.update', $reservation) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="dish_id">Plato:</label>
            <select name="dish_id" id="dish_id" required>
                @foreach($dishes as $dish)
                    <option value="{{ $dish->id }}" {{ $dish->id == $reservation->dish_id ? 'selected' : '' }}>{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" value="{{ $reservation->date }}" required>
        </div>
        <div>
            <label for="time">Hora:</label>
            <input type="time" name="time" id="time" value="{{ $reservation->time }}" required>
        </div>
        <button type="submit">Actualizar Reserva</button>
    </form>
@endsection
