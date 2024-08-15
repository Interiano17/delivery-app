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
</div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearComercio">
   Nuevo Comercio
  </button>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NuevoRepartidor">
    Nuevo Repartidor
  </button>

  
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoProducto">
  Nuevo Producto
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
              <td><a href="" class="btn btn-info">Ver</a></td>
              <td><a href="" class="btn btn-success">Editar</a></td>
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
        <form action="/tu-servidor-endpoint" method="post">
          <div class="form-group">
              <label for="nombreProducto">Nombre del Producto:</label>                       
<input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>                  
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
              <label for="comercio">Comercio:</label>
              <select class="form-control" id="comercio" name="comercio[]" multiple required>
                <option value="comercio1">Comercio 1</option>
                <option value="comercio2">Comercio 2</option>
                <!-- añadir más opciones aquí -->               
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


  
  <!-- Modal -->
  <div class="modal fade" id="NuevoRepartidor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Repartidor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/tu-servidor-endpoint" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="number" class="form-control" id="dni" name="dni" required>
                </div>    
                <div class="form-group">
                    <label for="primerNombre">Primer Nombre:</label>                                
                    <input type="text" class="form-control" id="primerNombre" name="primerNombre" required>
                </div>
                <div class="form-group">
                    <label for="segundoNombre">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="segundoNombre" name="segundoNombre">
                </div>    
                <div class="form-group">
                    <label for="primerApellido">Primer Apellido:</label>
                    <input type="text" class="form-control" id="primerApellido" name="primerApellido" required>
                </div>    
                <div class="form-group">
                    <label for="segundoApellido">Segundo Apellido:</label>            
                    <input type="text" class="form-control" id="segundoApellido" name="segundoApellido">
                </div>    
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>                               
                    <input type="number" class="form-control" id="telefono" name="telefono">
                </div>    
                <div class="form-group">            
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="disponible">Disponible:</label>    
                    <select class="form-control" id="disponible" name="disponible" required>    
                      <option value="0">No</option>       
                      <option value="1">SI</option>
                     </select>   
                </div>    
                <div class="form-group">
                    <label for="habilitado">Habilitado:</label>
                    <select class="form-control" id="habilitado" name="habilitado" required>
                        <option value="0">Fuera de Servicio</option>
                        <option value="1">Si</option>
                    </select>
                </div>  
                <div class="form-group">                            
                    <label for="puntajePromedio">Puntaje Promedio:</label>
                    <input type="number" class="form-control" id="puntajePromedio" name="puntajePromedio" step="0.01" required>
                </div>    
                <div class="form-group">
                    <label for="idUbicacion">ID Ubicación:</label>
                    <input type="number" class="form-control" id="idUbicacion" name="idUbicacion" required>
                </div> 
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-primary">Guardar </button>
         </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Modal -->
    <div class="modal fade" id="CrearComercio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <label for="imagen">Imagen del Comercio:</label>
        <input type="text" class="form-control" id="imagen" name="imagen" required>      
        </div>
        <div class="form-group">  
          <div class="form-group">
        <h3 for="ubicacion">Ubicación</h3>
      </div>
        <label for="latitud">Latitud:</label>
         <input type="number" class="form-control" id="latitud" name="latitud" step="0.000001" required>
         <label for="longitud">Longitud:</label>
         <input type="number" class="form-control" id="longitud" name="longitud" step="0.000001" required>
         <label for="descripcion">Descripcion:</label>
         <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
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
