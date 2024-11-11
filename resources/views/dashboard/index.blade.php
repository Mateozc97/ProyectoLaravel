@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 8px; max-width: 800px;">
    <div>
        <h1 class="display-4 text-center">Bienvenido al Panel de Gestión Académica</h1>
        <p class="lead text-center">Desde aquí puedes acceder a las siguientes funcionalidades:</p>
        <ul class="list-group">
            <li class="list-group-item">Gestionar Estudiantes</li>
            <li class="list-group-item">Gestionar Inscripciones</li>
            <li class="list-group-item">Realizar Consultas mediante Q&A API</li>
        </ul>
    </div>
</div>
@endsection
