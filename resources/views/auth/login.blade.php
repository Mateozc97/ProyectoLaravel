<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>  

<body>

    <header id="header" style="background-color: #d84444;">
        <p class="text-center">Universidad Cooperativa de Colombia</p>
    </header>

    <div class="container d-flex" id="">

        <form action="{{ route('login.verify') }}" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            <div class="text-center mb-4">
                <img src="https://ucc.edu.co/PublishingImages/Header/logotipo.svg" class="img-fluid" alt="UCC">
            </div>
            @csrf
            <h4 class="text-danger text-center">Universidad Cooperativa de colombia</h4>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small>
                        {{ session('success') }}
                    </small>
                    <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @error('invalid_credentials')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>
                        {{ $message }}
                    </small>
                    <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

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
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>

            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">Registrame</a>
            </div>

        </form>

    </div>

    <div class="btn-group-vertical" style="left: 90%;">
        <button type="button" class="btn btn-secondary" style="background-color: #ffffff;" onclick="cambiarTexto('+');">
        <img src="https://cdn-icons-png.flaticon.com/512/33/33287.png" style="width: 38px;" >
        </button>
        <button type="button" class="btn btn-secondary" style="background-color: #ffffff;" onclick="cambiarTexto('-');">
        <img src="https://cdn-icons-png.freepik.com/512/44/44970.png" style="width: 38px;" >
        </button>
        <button type="button" class="btn btn-secondary" style="background-color: #ffffff;" onclick="cambiarColor()">
        <img src="https://cdn-icons-png.freepik.com/512/8195/8195893.png?ga=GA1.1.1490049300.1725926679" style="width: 38px;" >
        </button>
    </div>

    <footer id="footer"  style="background-color: #d84444;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          Factultad: Ingeniería de Sistemas
          <a class="text-body" href="https://mdbootstrap.com/">Curso: Diseño de interfaces</a>
          <a class="text-body" href="https://mdbootstrap.com/">Autor: Mateo Zuluaga Carmona</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script>
        const elementsList = document.getElementsByTagName('a');
        function getElementFontSize(element) {
            const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
            return parseFloat(elementFontSize); 
        }
        function cambiarTexto(operador) {
            for (let element of elementsList) {
                const currentSize = getElementFontSize(element);

                const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
                element.style.fontSize = newFontSize
            }
        }
        function cambiarColor() {
            let header = document.getElementById('header');
            let footer = document.getElementById('footer');

            let colores = ['#e27575', '#3970e7'];
            let colorActualHeader = header.style.backgroundColor;
            let colorActualFooter = footer.style.backgroundColor;
            function obtenerNuevoColor() {
                let nuevoColor = colores[Math.floor(Math.random() * colores.length)];
                while (nuevoColor === colorActualHeader || nuevoColor === colorActualFooter) {
                    nuevoColor = colores[Math.floor(Math.random() * colores.length)];
                }
                return nuevoColor;
            }
            let nuevoColor = obtenerNuevoColor();
            header.style.backgroundColor = nuevoColor;
            footer.style.backgroundColor = nuevoColor;
        }
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
