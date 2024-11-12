@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-light mb-4">Preguntas y Respuestas (Q&A)</h1>
    <form method="POST" action="{{ route('qa.ask') }}">
        @csrf
        <div class="form-group">
            <label class="text-light" for="question">Pregunta:</label>
            <input type="text" id="question" name="question" class="form-control" placeholder="Escribe tu pregunta aquí" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Pregunta</button>
    </form>

    @if(isset($answer))
    <div class="mt-4" style="background-color: #fff; padding: 15px; border-radius: 5px; color: #000;">
        <h4>Respuesta:</h4>
        <pre>{{ $answer }}</pre>
    </div>
    @endif
</div>
@endsection