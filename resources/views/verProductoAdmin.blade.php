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

        <center><h2>Producto</h2></center>

        <form action="{{Route('guardar.producto')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombreProducto">Codigo Producto:</label>                       
                <input type="text" class="form-control" id="id"  name="id" value="{{ trim(json_encode(trim($producto['id'])), '"') }}" disabled required>                  
             </div>
            <div class="form-group">
                <label for="nombreProducto">Nombre del Producto:</label>                       
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ trim(json_encode(trim($producto['nombre'])), '"') }}" disabled required>                  
             </div>
            <div class="form-group">                         
  <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" value="" disabled required>{{ trim(json_encode(trim($producto['descripcion'])), '"') }}</textarea>
  </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ trim(json_encode(trim($producto['precio'])), '"') }}" disabled required>
            </div>
            <div class="form-group">                
                <label for="imagen">Imagen (URL):</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="{{ trim(json_encode(trim($producto['imagen'])), '"') }}" disabled required>
            </div>                    
  <div class="form-group">
                <label for="comercio">Comercios:</label>
                <select class="form-control" id="comercios" name="comercios[][id]" multiple  disabled required>
                 @foreach ($producto['comercios'] as $comercio)
                 <option disabled selected value="{{ trim(json_encode(trim($comercio['id'])), '"') }}">{{ trim(json_encode(trim($comercio['nombre'])), '"') }}</option>
                 @endforeach                       
                </select>
            </div>                
       
        <div class="row">
            <div class="col">
                <a href="{{Route('productos.admin.mostrar')}}" class="col"><button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Regresar</button></a>
            </div>
        </div>
    </div>
        
      </form>

</div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>