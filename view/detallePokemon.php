<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/287/287221.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/detallePokemon.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <script src="assets/js/index.js"></script>
    <script src="assets/js/loginValidate.js"></script>
    <script src="assets/js/logout.js"></script> 
    <title>Detalle Pokemon</title>
</head>
<body onload="getDetallePokemon(), typePokemon2(),searchPokemon()" id="contenedor">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="inicio.php">
                    <img src="https://e0.pxfuel.com/wallpapers/87/977/desktop-wallpaper-luizvc-s-custom-pokemon-type-symbols-pokemon-elements-pokemon-pokemon-logo.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="productos.php">Administrar</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="listaCategorias" style="height: 200px; overflow: auto;">
                        </ul>
                      </li>
                      <li class="nav-item">
                                <a class="nav-link active" aria-current="page" onclick="logout()" style="cursor: pointer;">Cerrar Sesion</a>
                        </li> 
                    </ul>
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="txtBuscar" id="txtBuscar"  onkeyup="autoCompletPokemon()" style="width: 500px;">
                      <div id="listPokemon"></div>
                      <button class="btn btn-outline-success" type="button"id="cartPokemon" ondrop="drop(event)" ondragover="allowDrop(event)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><i class="fas fa-solid fa-cart-arrow-down"></i></button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6" id="detalle">

            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Productos</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            ...
          </div>
      </div>
    </div>
</body>
</html>