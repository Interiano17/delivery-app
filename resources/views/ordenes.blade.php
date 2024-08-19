<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App</title>
    <link rel="stylesheet" href="../../resources/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
            <ul class="nav-links">
                <li><h5 style="color:white">Bienvenido, usuario</h5></li>
                <li><button type="button" class="btn btn-success">
                  Página Principal
                </button></li>
                <li><a href={{ route('login') }} class="btn btn-danger">
                  Salir de cuenta
                </a>
                </li>
            </ul>
        </nav>
    </header>

    <table class="table">
        <thead>
            <th scope="col" name="codigo">Número de orden</th>
            <th scope="col" name="nombre">Restaurante</th>
            <th scope="col" name="tipoElectrodomestico">Repartidor</th>
            <th scope="col" name="precio">Fecha y Hora</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver</th>
        </thead>
        <tbody>
            @foreach ($ordenes as $orden)
                <tr>
                    <td>{{ trim(json_encode(trim($orden['id'])), '"') }}</td>
                    <td>{{ trim(json_encode(trim($orden['comercio']['nombre'])), '"') }}</td>
                    <td>{{ trim(json_encode(trim($orden['repartidor']['primerNombre'])), '"') }}</td>
                    <td>{{ trim(json_encode(trim($orden['fechaHora'])), '"') }}</td>
                    <td>{{ trim(json_encode(trim($orden['estado'])), '"') }}</td>
                    <td>
                        <a href="" class="btn btn-info">Ver Orden</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    

    <script src="../../resources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
