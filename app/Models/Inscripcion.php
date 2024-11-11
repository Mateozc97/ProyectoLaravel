<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';
    protected $primaryKey = 'id_inscripcion';

    protected $fillable = [
        'id_estudiante',
        'cod_materia',
        'fecha_inscripcion',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante', 'id_estudiante');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'cod_materia', 'cod_materia');
    }
}
