<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario; // Asegúrate de importar el modelo Inventario

class InventarioController extends Controller
{
    public function index() {
        // Listar todos los ítems de inventario
        $items = Inventario::all();
        return view('inventario.index', compact('items'));
    }

    public function create() {
        // Mostrar el formulario para crear un nuevo ítem de inventario
        return view('inventario.create');
    }

    public function store(Request $request) {
        // Validar y almacenar un nuevo ítem de inventario con mensajes personalizados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ], [
            'nombre.required' => 'El nombre del ítem es obligatorio.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
        ]);

        // Crear un nuevo ítem de inventario
        Inventario::create($request->all());
        return redirect()->route('inventario.index')->with('success', 'Ítem de inventario creado correctamente.');
    }

    public function edit(Inventario $item) {
        // Mostrar el formulario para editar un ítem de inventario usando Route Model Binding
        return view('inventario.edit', compact('item'));
    }

    public function update(Request $request, Inventario $item) {
        // Validar y actualizar un ítem de inventario con mensajes personalizados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ], [
            'nombre.required' => 'El nombre del ítem es obligatorio.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
        ]);

        // Actualizar el ítem de inventario
        $item->update($request->all());
        return redirect()->route('inventario.index')->with('success', 'Ítem de inventario actualizado correctamente.');
    }

    public function delete(Inventario $item) {
        // Eliminar un ítem de inventario usando Route Model Binding
        $item->delete();
        return redirect()->route('inventario.index')->with('success', 'Ítem de inventario eliminado correctamente.');
    }
}
