@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Plato</h1>

    <form action="{{ route('dishes.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="category">Categoría:</label>
            <select name="category" id="category" required>
                <option value="desayuno">Desayuno</option>
                <option value="almuerzo">Almuerzo</option>
                <option value="cena">Cena</option>
            </select>
        </div>
        <button type="submit">Crear Plato</button>
    </form>
@endsection
