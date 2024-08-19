<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App</title>
    <link rel="stylesheet" href="../../../../../resources/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
            <ul class="nav-links">
                <li><h5 style="color:white" id="welcome">Bienvenido, usuario</h5></li>
                <li>
                  <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Carrito
                  </button>
                  <ul id="carrito" class="dropdown-menu">                                      
                    <li><hr class="dropdown-divider"></li>
                 
                  </ul>
              
                 
                </div>
                <li><a href={{ route('login') }} class="btn btn-danger">
                  Salir de cuenta
                </a>
                </li>
            </ul>
        </nav>
    </header>
    
  

    <div class="container">
        <center><h1>{{ trim(json_encode(trim($nombre)), '"\\') }}</h1></center>
    </div>
    

<div class="search-wrapper">
    <center>
        <label for="search">Buscar producto</label>
    <input type="search" id="search" data-search>
    </center>
  </div>

    <section class="container featured-section">
        <div id="card-section" class="restaurant-grid row row-cols-1 row-cols-md-4 g-4">
          @foreach ($productos as $producto)
          
            <div class="col">
              <div class="card">
                <img src={{ trim(json_encode(trim($producto['imagen'])), '"') }} width="300px" height="290px" class="card-img-top" alt="imagen">
                <div class="card-body">
                  <h5 class="card-title">{{ trim(json_encode(trim($producto['nombre'])), '"') }}</h5>
                  <h6 class="card-title">{{ trim(json_encode(trim($producto['descripcion'])), '"') }}</h6>
                  <h6 class="card-title">Precio: Lps. {{ trim(json_encode(trim($producto['precio'])), '"') }}</h6>
                  <button onclick="agregarAlCarrito('{{$producto['id']}}', {{$producto['precio']}})" type="button" class="btn btn-info">
                    Agregar al Carrito
                  </button>
                </div>
              </div>
            </div>
          
          @endforeach
        </div>
    </section>



   <script>
    const userCardTemplate = document.querySelector(".restaurant-grid")
    const userCardContainer = document.querySelector(".featured-section")
    const searchInput = document.querySelector("[data-search]")

var productos = {!! json_encode($productos) !!};

var cards = userCardTemplate.innerHTML

console.log(productos)

searchInput.addEventListener("input", e => {
  var productosFilter = []
  const value = e.target.value.toLowerCase()

  
  productos.forEach(producto => {
    const isVisible = producto.nombre.toLowerCase().includes(value)
    if(isVisible){
        productosFilter.push(producto)
    }
  })
  userCardTemplate.innerHTML = ``
  productosFilter.forEach(productoFilter => {
    
    userCardTemplate.innerHTML += `<div class="col">
              <div class="card">
                <img src=${productoFilter.imagen} width="300px" height="290px" class="card-img-top" alt="imagen">
                <div class="card-body">
                  <h5 class="card-title">${productoFilter.nombre}</h5>
                  <h6 class="card-title">${productoFilter.descripcion}</h6>
                  <h6 class="card-title">Precio: Lps. ${productoFilter.precio}</h6>
                  <button type="button" class="btn btn-info">
                    Agregar al Carrito
                  </button>
                </div>
              </div>
            </div>`
  })

  if(value.length == 0){
    userCardTemplate.innerHTML = cards
  }


}
)
   </script>
   
   
    <script> // Función para actualizar el carrito en la interfaz
      function actualizarCarrito() {
          const carrito = JSON.parse(localStorage.getItem('carrito')) || {};
          const carritoDiv = document.getElementById('carrito');
      
          carritoDiv.innerHTML = ''; // Limpiar el contenido actual del carrito
      
          let total = 0;
      
          for (const [nombre, { cantidad, precio }] of Object.entries(carrito)) {
              carritoDiv.innerHTML += `<div>${nombre} - $${precio.toFixed(2)} (${cantidad} unidades)</div>`;
              total += precio * cantidad; // Multiplicar precio por cantidad
          }
          
          // Mostrar el total al final del listado de productos
          carritoDiv.innerHTML += `<div><strong>Total: $${total.toFixed(2)}</strong></div>`;
      }
      
      // Función para agregar un producto al carrito
      function agregarAlCarrito(nombre, precio) {
          const carrito = JSON.parse(localStorage.getItem('carrito')) || {};
          
          if (carrito[nombre]) {
              carrito[nombre].cantidad += 1;
              // No actualizar el precio aquí, ya que el precio debe mantenerse constante para cada producto
          } else {
              carrito[nombre] = { cantidad: 1, precio };
          }
      
          localStorage.setItem('carrito', JSON.stringify(carrito));
          actualizarCarrito();
      }
      
      // Inicializar el carrito al cargar la página
      document.addEventListener('DOMContentLoaded', () => {
          actualizarCarrito();
      });
      
    
      
</script>

<script>
  var welcome = document.getElementById("welcome");
  welcome.innerHTML = `Bienvenido, ${localStorage.getItem("correo")}`;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
