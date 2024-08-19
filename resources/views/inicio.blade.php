<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App</title>
    <link rel="stylesheet" href="../resources/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
            <ul class="nav-links">

                <li><h5 style="color:white" id="welcome">Bienvenido, usuario</h5></li>

                <li><a href={{ route('login') }} class="btn btn-danger">
                  Salir de cuenta
                </a>

                </li>
            </ul>
        </nav>
    </header>

    <section class="search-section">
        <h1>Entregas a domicilio en Tegucigalpa</h1>
    </section>

    <section class="container featured-section">
        <h2>Restaurantes</h2>
        <div class="restaurant-grid row row-cols-1 row-cols-md-4 g-4">
          @foreach ($comercios as $comercio)
          <a href={{ route('productos.comercio', [trim(json_encode(trim($comercio['id'])), '"'), trim(json_encode(trim($comercio['nombre'])))]) }}>
            <div class="col">
              <div class="card">
                <img src={{ trim(json_encode($comercio['imagen']), '"') }} width="300px" height="290px" class="card-img-top" alt="imagen">
                <div class="card-body">
                  <h5 class="card-title">{{ trim(json_encode(trim($comercio['nombre'])), '"') }}</h5>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
    </section>

    <script>
      var welcome = document.getElementById("welcome");
      welcome.innerHTML = `Bienvenido, ${localStorage.getItem("correo")}`;
    </script>

    <script src="../resources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
