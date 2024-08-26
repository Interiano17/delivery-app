<!-- solo para tener una idea de la vista que se puede implementar qui -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid d-flex p-0">
    <div class="col-md-4 position-relative p-0">
        <img src="ruta/a/tu/imagen.jpg" class="img-fluid w-100" alt="Imagen Lateral">
        <div class="position-absolute top-50 start-50 translate-middle text-center bg-dark bg-opacity-50 p-3">
            <img src="ruta/a/logo.png" class="img-fluid mb-3" alt="Logo Odin">
            <h1 class="display-4 text-white" style="font-family: 'Norse Bold';">Odin</h1>
        </div>
        <p id="imgCredits" class="position-absolute bottom-0 start-0 text-white small ms-5 mb-3">Créditos de imagen</p>
    </div>

    <!-- Lado Derecho: Formulario de Registro -->
    <div class="col-md-8 bg-light p-5">
        <main>
            <h2 class="mb-4">Crear una cuenta</h2>
            <p class="lead mb-4">Por favor, complete los siguientes campos para crear una cuenta.</p>

            <form>
                <!-- Columnas del Formulario -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="confirmPassword" class="form-control" required>
                    </div>
                </div>
                <!-- Mensaje de Error -->
                <div id="errMessage" class="text-danger small mb-3">Mensaje de error</div>

                <!-- Botón de Registro -->
                <button id="accountButton" class="btn btn-success shadow-sm">Crear Cuenta</button>
            </form>

            <!-- Ya tienes una cuenta -->
            <p id="existentAcc" class="mt-4">
                ¿Ya tienes una cuenta? <a href="#" class="text-success">Inicia sesión aquí</a>.
            </p>
        </main>
    </div>
</div>

</body>
</html>