<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/287/287221.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="assets/css/index.css">
        <script src="assets/js/index.js"></script>
        <script src="assets/js/loginValidate.js"></script>
        <script src="assets/js/logout.js"></script> 
    <title>IncioPokemon</title>
</head>

<body onload="typePokemon(),searchPokemon(),listarCarrito()">
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
                      <button class="btn btn-outline-success" type="button" id="cartPokemon" ondrop="drop(event)" ondragover="allowDrop(event)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><i class="fas fa-solid fa-cart-arrow-down"></i></button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
        <div class="row" style="height: 100px;">
            <div class="col-12 bg-warning"></div>
        </div>
        <div class="row" style="height: 300px;">
            <div class="col-8 bg-info fondoCarrusel">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-slide="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.wikidexcdn.net/mwuploads/wikidex/thumb/f/f2/latest/20150621181400/Eevee.png/1200px-Eevee.png" class="d-block w-100" alt="..." style="height: 300px; object-fit: contain;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.pngall.com/wp-content/uploads/2016/06/Pokemon-PNG-HD.png" class="d-block w-100" alt="..." style="height: 300px; object-fit: contain;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.megaidea.net/wp-content/uploads/2021/08/Pokemon02-956x1024.png" class="d-block w-100" alt="..." style="height: 300px; object-fit: contain;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-4 bg-dark"></div>
        </div>
        <div class="row">
            <div class="col-12 bg-danger">
                <div class="container my-3 mt-5" id="featureContainer">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="d-flex justify-content-between position-relative top-50 px-3" style="z-index: 1;">
                                <a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
                                    <span class="fas fa-chevron-left" aria-hidden="true"></span>
                                </a> &nbsp;&nbsp;
                                <a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
                                    <span class="fas fa-chevron-right" aria-hidden="true"></span>
                                </a>
                            </div>
                            <div class="carousel-inner" role="listbox" id="typePokemonCarousel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="height: 280px;">
            <div class="col-12 bg-primary"></div>
        </div>
        <div class="row justify-content-between" style="height: 150px;">
            <div class="col-5 bg-warning"></div>
            <div class="col-5 bg-secondary"></div>
        </div>
        <div class="row bg-dark align-items-center" style="height: 300px;">
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="height: 300px;">
            <div class="col-12 bg-danger"></div>
        </div>
    </div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <div class="d-flex flex-column">
        <h5 id="offcanvasRightLabel">Carrito de compras</h5>
        <h6 id="total"></h6>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="list-car">

    </div>
    <button class="btn btn-outline-warning" onclick="finalizarCompra()">Finalizar Compra</button>
</div> 
</body>

</html>
