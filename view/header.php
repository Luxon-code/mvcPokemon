<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/287/287221.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/loginValidate.js"></script>
    <script src="assets/js/logout.js"></script>   
    <script src="assets/js/index.js"></script>   
    <title>MVCpokemon</title>
</head>
<body onload="searchPokemon()" class="fondo">
    <div class="container-fluid">
       <div class="row" style="margin-bottom: 4rem;">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
                        <div class="container-fluid">
                        <a class="navbar-brand" href="index.html">
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
                                <a class="nav-link active" aria-current="page" href="productos.php">Gestionar Productos</a>
                            </li>                           
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="roles.php">Gestionar Roles</a>
                            </li>                           
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" onclick="logout()" style="cursor: pointer;">Cerrar Sesion</a>
                            </li>                           
                            </ul>
                            <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="txtBuscar" id="txtBuscar"  onkeyup="autoCompletPokemon()" style="width: 500px;">
                            <div id="listPokemon"></div>
                            <button class="btn btn-outline-success" type="button" id="cartPokemon" ondrop="drop(event)" ondragover="allowDrop(event)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><i class="bi bi-cart4"></i></button>
                            </form>
                        </div>
                        </div>
            </nav>
       </div>