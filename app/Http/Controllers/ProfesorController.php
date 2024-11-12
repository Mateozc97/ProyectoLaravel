<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function index()
    {
        // Extrae los profesores desde la tabla Materia
        $profesores = DB::table('Materia')
            ->select('email_profesor', 'cod_materia', 'nombre_materia')
            ->get();

        // Retorna la vista con los datos de los profesores
        return view('profesores.index', compact('profesores'));
    }
}
