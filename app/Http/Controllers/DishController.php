<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        // Obtener la categoría del request
        $category = $request->input('category');

        // Obtener todos los platos, o filtrar por categoría si se proporciona
        if ($category) {
            $dishes = Dish::where('category', $category)->get();
        } else {
            $dishes = Dish::all();
        }

        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        return view('dishes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|in:desayuno,almuerzo,cena',
        ]);

        Dish::create($request->all());
        return redirect()->route('dishes.index');
    }

    public function edit(Dish $dish)
    {
        return view('dishes.edit', compact('dish'));
    }

    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|in:desayuno,almuerzo,cena',
        ]);

        $dish->update($request->all());
        return redirect()->route('dishes.index');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }
}
