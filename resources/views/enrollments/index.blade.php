@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-white mb-4">Lista de Inscripciones</h1>

        <div class="mb-3 text-right">
            <a href="{{ route('enrollments.create') }}" class="btn btn-success">
                Registrar Nueva Inscripción
            </a>
        </div>

        @if($inscripciones->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Fecha de Inscripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscripciones as $inscripcion)
                            <tr>
                                <td>{{ $inscripcion->id_inscripcion }}</td>
                                <td>{{ $inscripcion->estudiante ? $inscripcion->estudiante->nombre : 'Estudiante no encontrado' }}</td>
                                <td>{{ $inscripcion->materia ? $inscripcion->materia->nombre_materia : 'Materia no encontrada' }}</td>
                                <td>{{ $inscripcion->fecha_inscripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                No hay inscripciones registradas.
            </div>
        @endif
    </div>
@endsection
