@extends('layouts.app')

@section('content')
    <h1>Mis Reservas</h1>

    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Crear Reserva</a>
    <table>
        <thead>
            <tr>
                <th>Plato</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->dish->name ?? 'Plato no encontrado' }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>
                        <a href="{{ route('reservations.edit', $reservation) }}">Editar</a>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
