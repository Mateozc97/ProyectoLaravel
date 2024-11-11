@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Título del Formulario -->
    <h2 class="text-center text-white mb-4" style="font-size: 1.8rem;">Registrar Estudiante</h2>

    <!-- Botón para regresar a la lista de estudiantes -->
    <div class="text-right mb-3">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Volver a Lista de Estudiantes</a>
    </div>

    <!-- Formulario para registrar un estudiante -->
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="text-white">Nombre del Estudiante:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="correo" class="text-white">Correo Electrónico:</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="form-group">
            <label for="telefono" class="text-white">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>

        <!-- Botones para limpiar y guardar -->
        <div class="text-center">
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection
