<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; // Asegúrate de importar el modelo Venta

class VentasController extends Controller
{
    public function index() {
        // Listar todas las ventas
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create() {
        // Mostrar el formulario para crear una nueva venta
        return view('ventas.create');
    }

    public function store(Request $request) {
        // Validar y almacenar una nueva venta con mensajes personalizados
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'total' => 'required|numeric',
        ], [
            'cliente.required' => 'El nombre del cliente es obligatorio.',
            'producto.required' => 'El nombre del producto es obligatorio.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'total.required' => 'El total es obligatorio.',
        ]);

        // Crear una nueva venta
        Venta::create($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta creada correctamente.');
    }

    public function edit(Venta $venta) {
        // Mostrar el formulario para editar una venta usando Route Model Binding
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta) {
        // Validar y actualizar una venta existente con mensajes personalizados
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'total' => 'required|numeric',
        ], [
            'cliente.required' => 'El nombre del cliente es obligatorio.',
            'producto.required' => 'El nombre del producto es obligatorio.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'total.required' => 'El total es obligatorio.',
        ]);

        // Actualizar la venta
        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function delete(Venta $venta) {
        // Eliminar una venta usando Route Model Binding
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
