<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('/../resources/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/../resources/css/registroCliente.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
        </nav>
    </header>

    <section class="h-100 gradient-form m-1" style="background-m-2 color: #eee;">
        
    <div id="divBody" class="container">
        <center><h2>Registrate</h2></center>
        @if (session('message'))
        {!!(session('message'))!!}
      @endif
        <form action="{{Route('guardar.cliente')}}" method="POST">
            @csrf
            <div class="container  bg-opacity-10 bg-dark bg-gradient ">
                <div class="row mt-2">
                    <div class="m-2 col-2">DNI:</div>
                    <div class="m-2 col"><input required placeholder="Ingrese su numero de identidad" type="text" id="dni" name="dni" class="form-control" minlength="13" maxlength="13" ></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="m-2 col-2">Primer Nombre:</div>
                    <div class="m-2 col"><input required placeholder="Ingrese su primer nombre" type="text" id="primerNombre" name="primerNombre" class="form-control"></div>
                </div>
            </div>
            <div class="container  bg-opacity-10 bg-dark bg-gradient ">
                <div class="row mt-2">
                    <div class="m-2 col-2">Segundo Nombre</div>
                    <div class="m-2 col"><input required placeholder="Ingrese su segundo nombre" type="text" id="segundoNombre" name="segundoNombre" class="form-control"></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="m-2 col-2">Primer Apellido:</div>
                    <div class="m-2 col"><input required placeholder="Ingrese su primer apellido" type="text" id="primerApellido" name="primerApellido" class="form-control"></div>
                </div>
            </div>
            <div class="container  bg-opacity-10 bg-dark bg-gradient ">
                <div class="row mt-2">
                    <div class="m-2 col-2">Segundo Apellido:</div>
                    <div class="m-2 col"><input required placeholder="Ingrese su segundo apellido" type="text" id="segundoApellido" name="segundoApellido" class="form-control"></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="m-2 col-2">Telefono:</div>
                    <div class="m-2 col form-contr"><input required placeholder="Ingrese su numero de telefono" type="text" id="telefono" name="telefono" class="form-control" minlength="8" maxlength="8"></div>
                </div>
            </div>
            <div class="container  bg-opacity-10 bg-dark bg-gradient ">
                <div class="row mt-2">
                    <div class="m-2 col-2">Correo:</div>
                    <div class="m-2 col"><input required placeholder="example@mail.com" type="email" id="correo" name="correo" class="form-control"></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="m-2 col-2">Nombre de Usuario:</div>
                    <div class="m-2 col"><input required placeholder="exampleUsuario123" type="text" id="nombreUsuario" name="nombreUsuario" class="form-control"></div>
                </div>
            </div>
            <div class="container  bg-opacity-10 bg-dark bg-gradient ">
                <div class="row mt-2 bg-luz-sutil">
                    <div class="m-2 col-2 bg-secundario ">Contraseña:</div>
                    <div class="m-2 col"><input required type="password" id="contrasenia" name="contrasenia" class="form-control"></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="m-2 col-2"></div>
                    <div class="m-2 col"> <button  type="submit" class="form-control btn btn-primary">Registrarse</button></div>
                </div>
            </div>
        
        </form>
    </div>
</section>

    <footer>
        <p>© 2024 Delivery App</p>
    </footer>
    <script>
        let registroButton = document.querySelector("[type=submit]");
        registroButton.addEventListener("click", function () {
            const correo = document.querySelector("#correo");
            localStorage.setItem("carrito",null);
            localStorage.setItem("correo", correo.value);
        })
    </script>
</body>
</html>
