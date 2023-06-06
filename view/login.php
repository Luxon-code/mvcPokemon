<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./assets/js/login.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Login</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="txtCorreo" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="txtCorreo" name="txtCorreo">
            </div>
            <div class="col-6">
                <label for="txtPassword" class="form-label">password:</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword">
            </div>
        </div>
        <div class="row mt-5">
            <a onclick="login()" class="btn btn-primary">Login</a>
        </div>
    </div>
</body>
</html>