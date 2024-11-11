@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center text-light">Lista de Estudiantes</h1>

    <!-- Botón para registrar un nuevo estudiante -->
    <div class="text-right mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-success">Registrar Nuevo Estudiante</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if ($estudiantes->isEmpty())
                <p class="text-center">No hay estudiantes registrados.</p>
            @else
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->id_estudiante }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->correo }}</td>
                                <td>{{ $estudiante->telefono }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
