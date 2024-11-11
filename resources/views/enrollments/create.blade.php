@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Registrar Inscripción</h2>
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('enrollments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_estudiante" class="form-label">Estudiante</label>
                    <select name="id_estudiante" id="id_estudiante" class="form-control" required>
                        <option value="">Seleccione un estudiante</option>
                        @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cod_materia" class="form-label">Materia</label>
                    <select name="cod_materia" id="cod_materia" class="form-control" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->cod_materia }}">{{ $materia->nombre_materia }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                    <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Inscripción</button>
                <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
