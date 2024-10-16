@extends('layouts.app')

@section('content')
    <h1>Platos</h1>
    <form method="GET" action="{{ route('dishes.index') }}">
        <label for="category">Filtrar por Categoría:</label>
        <select name="category" id="category" onchange="this.form.submit()">
            <option value="">Todos</option>
            <option value="desayuno" {{ request('category') == 'desayuno' ? 'selected' : '' }}>Desayuno</option>
            <option value="almuerzo" {{ request('category') == 'almuerzo' ? 'selected' : '' }}>Almuerzo</option>
            <option value="cena" {{ request('category') == 'cena' ? 'selected' : '' }}>Cena</option>
        </select>
    </form>
    <a href="{{ route('dishes.create') }}">Agregar plato</a>
    <ul>
        @foreach ($dishes as $dish)
            <li>
                {{ $dish->name }} - {{ $dish->price }}
                <a href="{{ route('dishes.edit', $dish) }}">Editar</a>
                <form action="{{ route('dishes.destroy', $dish) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

