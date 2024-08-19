
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../resources/css/admin.css">
    
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
  <center><h1>Comercios</h1></center>
  @if (session('message'))
  {!!(session('message'))!!}
@endif
</div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Comercio">
   Nuevo Comercio
  </button>


<table class="table">
  <thead>
      <th scope="col" name="codigo">ID</th>
      <th scope="col" name="nombre">Nombre</th>
      <th scope="col" name="tipoElectrodomestico">Ubicación</th>
      <th scope="col" name="precio">Ver</th>
      <th scope="col">Editar</th>
  </thead>
  <tbody>
      @foreach ($comercios as $comercio)
  
          <tr>
              <td>{{ trim(json_encode(trim($comercio['id'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($comercio['nombre'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($comercio['ubicacion']['descripcion'])), '"') }}</td>
              <td><a href="{{Route('admin.comercio.ver',trim(json_encode(trim($comercio['id'])), '"') )}}" class="btn btn-info">Ver</button></td>
              <td><a href="{{Route('editar.comercio',trim(json_encode(trim($comercio['id'])), '"') )}}" class="btn btn-success">Editar</a></td>
          </tr>
          @endforeach
  </tbody>

</table>



 <!-- Modal -->
 <div class="modal fade" id="Comercio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Comercio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{Route('guardar.comercio')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nombre">ID Comercio:</label>
              <input type="text" class="form-control" id="id" name="id" required>
              </div>
          <div class="form-group">
          <label for="nombre">Nombre del Comercio:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
  <label for="imagen">Imagen (URL):</label>
  <input type="text" class="form-control" id="imagen" name="imagen" required>      
  </div>
  <div class="form-group">  
    <div class="form-group">
  <center><h3 for="ubicacion">Ubicación</h3></center>
</div>
  <label for="latitud">Latitud:</label>
   <input type="number" class="form-control" id="latitud" name="latitud" step="0.000001" required>
   <label for="longitud">Longitud:</label>
   <input type="number" class="form-control" id="longitud" name="longitud" step="0.000001" required>
   <label for="descripcion">Descripcion:</label>
   <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
  
      <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
  </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>
