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
  <center><h1>Productos</h1></center>
  @if (session('message'))
  {!!(session('message'))!!}
@endif 
</div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoProducto">
        Nuevo Producto
      </button>

<table class="table">
  <thead>
      <th scope="col" name="codigo">ID</th>
      <th scope="col" name="nombre">Nombre</th>
      <th scope="col" name="tipoElectrodomestico">Descripcion</th>
      <th scope="col" name="tipoElectrodomestico">Precio</th>
      <th scope="col" name="precio">Ver</th>
      <th scope="col">Editar</th>
  </thead>
  <tbody>
      @foreach ($productos as $producto)
          <tr>
              <td>{{ trim(json_encode(trim($producto['id'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($producto['nombre'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($producto['descripcion'])), '"') }}</td>
              <td>{{ trim(json_encode(trim($producto['precio'])), '"') }}</td>
              <td><a href="{{Route('ver.producto',trim(json_encode(trim($producto['id'])), '"') )}}" class="btn btn-info">Ver</a></td>
              <td><a href="{{Route('editar.producto.admin',trim(json_encode(trim($producto['id'])), '"') )}}" class="btn btn-success">Editar</a></td>
          </tr>
          @endforeach
  </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{Route('guardar.producto')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombreProducto">Codigo Producto:</label>                       
                <input type="text" class="form-control" id="id" name="id" required>                  
             </div>
            <div class="form-group">
                <label for="nombreProducto">Nombre del Producto:</label>                       
                <input type="text" class="form-control" id="nombre" name="nombre" required>                  
             </div>
            <div class="form-group">                         
  <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
  </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="form-group">                
                <label for="imagen">Imagen (URL):</label>
                <input type="text" class="form-control" id="imagen" name="imagen" required>
            </div>                    
  <div class="form-group">
                <label for="comercio">Comercios:</label>
                <select class="form-control" id="comercios" name="comercios[][id]" multiple required>
                 @foreach ($comercios as $comercio)
                 <option value="{{ trim(json_encode(trim($comercio['id'])), '"') }}">{{ trim(json_encode(trim($comercio['nombre'])), '"') }}</option>
                 @endforeach                       
                </select>
            </div>                
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