<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Académica</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Laravel CSS (si estás usando Laravel Mix) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts necesarios (JavaScript de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Gestión Académica</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('qa.index') }}">Q&A API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enrollments.index') }}">Inscripción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profesores.index') }}">Profesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signOut') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Scripts (si es necesario) -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
