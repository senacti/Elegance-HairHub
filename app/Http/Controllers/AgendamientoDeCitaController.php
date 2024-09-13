<?php

use Illuminate\Http\Request;

class AgendamientoDeCitaController extends Controller
{
    public function index() {
        // Listar todas las citas
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create() {
        // Mostrar el formulario para crear una nueva cita
        return view('citas.create');
    }

    public function store(Request $request) {
        // Validar y almacenar una nueva cita con mensajes de validación personalizados
        $request->validate([
            'cliente' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ], [
            'cliente.required' => 'El nombre del cliente es obligatorio.',
            'fecha.required'  => 'La fecha es obligatoria.',
            'hora.required'   => 'La hora es obligatoria.',
        ]);

        // Crear una nueva cita
        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    public function edit(Cita $cita) {
        // Mostrar el formulario para editar una cita usando Route Model Binding
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, Cita $cita) {
        // Validar y actualizar una cita existente con mensajes personalizados
        $request->validate([
            'cliente' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ], [
            'cliente.required' => 'El nombre del cliente es obligatorio.',
            'fecha.required'  => 'La fecha es obligatoria.',
            'hora.required'   => 'La hora es obligatoria.',
        ]);

        // Actualizar la cita
        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function delete(Cita $cita) {
        // Eliminar una cita usando Route Model Binding
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
