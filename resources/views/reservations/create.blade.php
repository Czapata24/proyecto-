@extends('layouts.app')

@section('content')
    <h1>Crear Reserva</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div>
            <label for="dish_id">Selleciona un plato:</label>
            <select name="dish_id" id="dish_id" required>
                @foreach($dishes as $dish)
                    <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="time">Hora:</label>
            <input type="time" name="time" id="time" required>
        </div>
        <div>
            <label for="user_name">Nombre del Usuario:</label>
            <input type="text" name="user_name" id="user_name" required>
        </div>
        <button type="submit">Hacer Reserva</button>
    </form>
@endsection
