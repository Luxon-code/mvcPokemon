<?php
include_once "header.php"; ?>
<form id="roles.frm">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Roles</h2>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="textRol" class="col-sm-2 col-form-label  align-self-center">Asignacion ROL:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txtRol" placeholder="Nombre de rol">
                <label for="txtRol">Nombre de rol</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="d-grid gap-2">
                <a  onclick="create()" class="btn btn-primary">Crear</a>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
            <h2 class="text-center bg-dark text-white">Datos Roles</h2>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</form>
<?php include_once "footer.php"; ?>
<script src="assets/js/roles.js"></script>