<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante'; // Cambia la clave primaria por el nombre correcto

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
    ];

    // Relaciones con otras tablas si son necesarias
}
