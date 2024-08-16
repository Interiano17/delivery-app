<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App</title>
    <link rel="stylesheet" href="../resources/css/login.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
        </nav>
    </header>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                    <div class="text-center">
                        <img src="https://play-lh.googleusercontent.com/7Jm2vqYC7Pzm8M3AqwjJCFXtBL09gPVQ7HN9QSEBr3udZ0o_okVo-Fzrj309qESQWE0"
                        style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Crear Cuenta</h4>
                    </div>
      
                    <form action="/tu-servidor-endpoint" method="post">
                        @csrf
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
                        <div class="text-center pt-1 mb-5 pb-1">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Registrar</button>
                        </div>
                    </form>
      
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-11 mx-md-9">
                        <div class="text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                        <h4 class="mb-4">Delivery App</h4>
                        <p class="small mb-0">Envios de comida a domicilio en Tegucigalpa</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    

    <footer>
        <p>© 2024 Delivery App</p>
    </footer>

    <script src="../resources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
