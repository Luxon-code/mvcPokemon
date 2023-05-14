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
                <a onclick="create()" class="btn btn-primary">Crear</a>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Creacion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tblRol">

                </tbody>
            </table>
        </div>
    </div>
    <div>

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="updateModal">Modificar Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="txtNombreRol" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="txtNombreRol" placeholder="Nombre del rol">
                                </div>
                                <div class="col-6">
                                    <label for="cbEstado" class="form-label">Estado:</label>
                                    <select class="form-select" id="cbEstado">
                                        <option value="">Seleccione</option>
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Modificar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once "footer.php"; ?>
<script src="assets/js/roles.js"></script>