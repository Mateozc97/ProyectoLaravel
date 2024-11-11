<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with(['estudiante', 'materia'])->get();
        return view('enrollments.index', compact('inscripciones'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();

        return view('enrollments.create', compact('estudiantes', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'cod_materia' => 'required|exists:Materia,cod_materia',
            'fecha_inscripcion' => 'required|date',
        ]);

        Inscripcion::create($request->all());

        return redirect()->route('enrollments.index')->with('success', 'Inscripción creada con éxito.');
    }
}
