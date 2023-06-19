<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/287/287221.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/login.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body class="fondo">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form class="w-50">
                <div class="d-flex justify-content-center">
                    <img class="mb-4" src="https://e0.pxfuel.com/wallpapers/87/977/desktop-wallpaper-luizvc-s-custom-pokemon-type-symbols-pokemon-elements-pokemon-pokemon-logo.jpg" alt="" width="72" height="57">
                </div>
                <h1 class="h3 mb-3 fw-normal text-center text-white">Iniciar Sesion</h1>

                <div class="form-floating">
                <input type="email" class="form-control" id="txtCorreo" placeholder="name@example.com" style="background-color: #e8e5e5;">
                <label for="txtCorreo">Correo Electronico</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="txtPassword" placeholder="Password" style="background-color: #e8e5e5;">
                <label for="txtPassword">Contraseña</label>
                </div>
                <br>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="button" onclick="login()">Login</button>
                <p class="mt-5 mb-3 text-center text-white">© 2020–2023</p>
            </form>
        </div>
    </div>
</body>
</html>