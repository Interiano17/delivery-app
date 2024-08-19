<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container m-4 ml-4">
        <center><h2>Editar Comercio</h2></center>

        <form action="{{Route('editar.comercio.guardar',trim(json_encode(trim($comercio['id'])), '"') )}}" method="get" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nombre">ID Comercio:</label>
              <input type="text" class="form-control" id="id" name="id" disabled  value="{{ trim(json_encode(trim($comercio['id'])), '"') }}">
              </div>
          <div class="form-group">
          <label for="nombre">Nombre del Comercio:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ trim(json_encode(trim($comercio['nombre'])), '"') }}">
          </div>
          <div class="form-group">
    <label for="imagen">Imagen (URL):</label>
    <input type="text" class="form-control" id="imagen" name="imagen" required value="{{ trim(json_encode(trim($comercio['imagen'])), '"') }}">      
    </div>
    <div class="form-group">  
    <div class="form-group">
    <center><h3 for="ubicacion">Ubicación</h3></center>
    </div>
    <label for="latitud">Latitud:</label>
    <input type="number" class="form-control" id="latitud" name="latitud" step="0.000001" required value="{{ trim(json_encode(trim($comercio['ubicacion']['latitud'])), '"') }}">
    <label for="longitud">Longitud:</label>
    <input type="number" class="form-control" id="longitud" name="longitud" step="0.000001" required value="{{ trim(json_encode(trim($comercio['ubicacion']['longitud'])), '"') }}">
    <label for="descripcion">Descripcion:</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control"  >{{ trim(json_encode(trim($comercio['ubicacion']['descripcion'])), '"') }}</textarea>
      </div>
      
        <div class="row">
            <a href="{{Route('comercios.mostrar.admin')}}" class="col"><button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Cancelar</button></a>
            <div class="col"><button type="submit" class="btn btn-primary form-control">Guardar</button></div>
        </div>
    </form>
    

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>