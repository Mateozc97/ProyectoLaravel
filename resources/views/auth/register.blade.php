<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="container d-flex">

        <form action="" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            <div class="text-center mb-4">
                <img src="https://ucc.edu.co/PublishingImages/Header/logotipo.svg" class="img-fluid" alt="UCC">
            </div>
            @csrf
            <h2 class="text-center">Registro</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Email Profesor</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputCodigo">Código Materia</label>
                <input name="codigo" type="text" class="form-control" id="exampleInputCodigo"
                    aria-describedby="codigoHelp" placeholder="Enter codigo">
                @error('codigo')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="exampleInputMateria">Nombre Materia</label>
                <input name="materia" type="text" class="form-control" id="exampleInputMateria"
                    aria-describedby="materiaHelp" placeholder="Enter materia">
                @error('materia')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @error('password_confirmation')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block ">Registrarme</button>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Ingresar</a>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>