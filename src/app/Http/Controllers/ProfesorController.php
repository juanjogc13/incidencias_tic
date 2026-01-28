<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('user')->get();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email',
            'departamento' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'es_coordinador_tde' => 'boolean',
            'password' => 'required|string|min:8',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $validated['nombre'] . ' ' . $validated['apellidos'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Crear profesor
        Profesor::create([
            'user_id' => $user->id,
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'departamento' => $validated['departamento'],
            'telefono' => $validated['telefono'],
            'es_coordinador_tde' => $request->has('es_coordinador_tde'),
        ]);

        return redirect()->route('profesores.index')->with('success', 'Profesor creado correctamente');
    }

    public function show($id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->load('incidencias', 'incidenciasResueltas');
        return view('profesores.show', compact('profesor'));
    }

    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);
        
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email,' . $profesor->id,
            'departamento' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'es_coordinador_tde' => 'boolean',
        ]);

        $profesor->update([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'departamento' => $validated['departamento'],
            'telefono' => $validated['telefono'],
            'es_coordinador_tde' => $request->has('es_coordinador_tde'),
        ]);

        // Actualizar usuario
        if ($profesor->user) {
            $profesor->user->update([
                'name' => $validated['nombre'] . ' ' . $validated['apellidos'],
                'email' => $validated['email'],
            ]);
        }

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente');
    }

    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        
        if (!$profesor) {
            return redirect()->route('profesores.index')->with('error', 'Profesor no encontrado');
        }
        
        try {
            $user = $profesor->user;
            
            // Eliminar el profesor
            $profesor->delete();
            
            // Eliminar el usuario
            if ($user) {
                $user->delete();
            }
            
            return redirect()->route('profesores.index')->with('success', 'Profesor eliminado correctamente');
            
        } catch (\Exception $e) {
            return redirect()->route('profesores.index')->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }
}