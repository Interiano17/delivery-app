<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../resources/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

  <header>
    <nav>
        <div class="logo">
            <h1>Delivery Admin</h1>
        </div>
        <ul class="nav-links">
            
            <li><a href="#">Cerrar Sección</a></li>
        </ul>
    </nav>
</header>

<div class="container">
  <center><h1>Clientes</h1></center> 
</div>
<table class="table">
  <thead>
      <th scope="col" name="codigo">DNI</th>
      <th scope="col" name="nombre">Primer Nombre</th>
      <th scope="col" name="tipoElectrodomestico">Segundo Nombre</th>
      <th scope="col" name="tipoElectrodomestico">Primer Apellido</th>
      <th scope="col" name="tipoElectrodomestico">Segundo Apellido</th>
      <th scope="col" name="tipoElectrodomestico">correo</th>
      <th scope="col" name="tipoElectrodomestico">telefono</th>
      <th scope="col" name="precio">Ver</th>
      <th scope="col">Editar</th>
  </thead>
  <tbody>
      @foreach ($clientes as $cliente)
          <tr>
              <td>{{ trim(json_encode(trim($cliente['dni'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['primerNombre'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['segundoNombre'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['primerApellido'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['segundoApellido'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['correo'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($cliente['telefono'])), '"') }}</td>
              <td><a href="" class="btn btn-info">Ver</a></td>
              <td><a href="" class="btn btn-success">Editar</a></td>
          </tr>
          @endforeach
  </tbody>

</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
