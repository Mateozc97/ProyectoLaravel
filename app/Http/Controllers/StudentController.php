<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class StudentController extends Controller
{
    // Mostrar la lista de estudiantes
    public function index()
    {
        // Obtenemos todos los estudiantes de la base de datos
        $estudiantes = Estudiante::all();
        // Retornamos la vista 'students.index' con los datos de los estudiantes
        return view('students.index', compact('estudiantes'));
    }

    // Mostrar el formulario para registrar un nuevo estudiante
    public function create()
    {
        // Retornamos la vista 'students.create' que contiene el formulario de registro
        return view('students.create');
    }

    // Guardar un nuevo estudiante en la base de datos
    public function store(Request $request)
    {
        // Validamos los datos recibidos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes,correo',
            'telefono' => 'required|string|max:15',
        ]);

        // Creamos un nuevo registro de estudiante con los datos del formulario
        Estudiante::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        // Redirigimos a la vista de la lista de estudiantes con un mensaje de éxito
        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }
}
