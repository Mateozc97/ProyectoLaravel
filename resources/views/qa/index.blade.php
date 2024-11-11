@extends('layouts.app')

@section('title', 'Preguntas y Respuestas (Q&A)')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Preguntas y Respuestas (Q&A)</h2>
            <form action="{{ route('qa.ask') }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="question">Pregunta:</label>
                    <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Enviar Pregunta</button>
            </form>

            @if (isset($answer))
            <div class="mt-4 p-4 bg-light border rounded">
                <h4>Respuesta:</h4>
                <p>{{ $answer }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
