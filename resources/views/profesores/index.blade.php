@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-light mb-4">Lista de Profesores</h1>
    <table class="table table-bordered table-striped" style="background-color: white; color: black;">
        <thead class="thead-dark">
            <tr>
                <th>Email</th>
                <th>Código de Materia</th>
                <th>Nombre de Materia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->email_profesor }}</td>
                <td>{{ $profesor->cod_materia }}</td>
                <td>{{ $profesor->nombre_materia }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
