@extends('layouts.app')

@section('content')
    <h1>Editar Plato</h1>

    <form action="{{ route('dishes.update', $dish) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $dish->name }}" required>
        </div>
        <div>
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" value="{{ $dish->price }}" required>
        </div>
        <div>
            <label for="category">Categoría:</label>
            <select name="category" id="category" required>
                <option value="desayuno" {{ $dish->category == 'desayuno' ? 'selected' : '' }}>Desayuno</option>
                <option value="almuerzo" {{ $dish->category == 'almuerzo' ? 'selected' : '' }}>Almuerzo</option>
                <option value="cena" {{ $dish->category == 'cena' ? 'selected' : '' }}>Cena</option>
            </select>
        </div>
        <button type="submit">Actualizar Plato</button>
    </form>
@endsection
