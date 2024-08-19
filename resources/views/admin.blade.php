<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body data-bs-theme="dark">
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
    <div class="container text-center">
        <div class="row row-cols-2">
          <div id="comercio" class="col rounded btn btn-outline-dark border ">Comercios</div>
          <div id="delivery" class="col rounded btn btn-outline-dark border ">Deliverys</div>
          <div id="cliente" class="col rounded btn btn-outline-dark border ">Clientes</div>
          <div id="producto" class="col rounded btn btn-outline-dark border">Productos</div>
        </div>
      </div>

<script>
document.getElementById("comercio").addEventListener('click',function(){
    window.location.href="{{Route('comercios.mostrar.admin')}}"
});
document.getElementById("delivery").addEventListener('click',function(){
    window.location.href="{{Route('deliveries.mostrar')}}"
});
document.getElementById("cliente").addEventListener('click',function(){
    window.location.href="{{Route('clientes.mostrar')}}"
});
document.getElementById("producto").addEventListener('click',function(){
    window.location.href="{{Route('productos.admin.mostrar')}}"
});
</script>
    <footer>
        <p>© 2024 Delivery App</p>
    </footer>
    



</body>
</html>