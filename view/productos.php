<?php
include_once "header.php"; ?>
<form id="roles.frm">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Productos</h2>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="textRol" class="col-sm-2 col-form-label  align-self-center">Nombre:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del producto">
                <label for="txtNombre">Nombre del producto</label>
            </div>
        </div>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="textRol" class="col-sm-2 col-form-label  align-self-center">Precio:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="txtPrecio" placeholder="Precio del producto">
                <label for="txtPrecio">Precio del producto</label>
            </div>
        </div>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="textRol" class="col-sm-2 col-form-label  align-self-center">Cantidad:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="txtCantidad" placeholder="Cantidad del producto">
                <label for="txtCantidad">Cantidad del producto</label>
            </div>
        </div>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="textRol" class="col-sm-2 col-form-label  align-self-center">Descripcion:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <textarea class="form-control" id="txtDescripcion" placeholder="Descripcion del producto"></textarea>
                <label for="txtDescripcion">Descripcion del producto</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="d-grid gap-2">
                <a onclick="create()" class="btn btn-primary">Crear <i class="bi bi-plus-square"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <h2 class="text-center bg-dark text-white">Datos Productos</h2>
        <div class="col-8">
            <table class="table table-hover" id="tableProducto">
                <thead  class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Creacion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tblProducto">

                </tbody>
            </table>
        </div>
    </div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title text-center" id="updateModal">Modificar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="txtNombreUp" placeholder="Nombre del Producto">
                                <label for="txtNombreUp">Nombre del Producto</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="txtPrecioUp" placeholder="Precio del Producto">
                                <label for="txtPrecioUp">Precio del Producto</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="txtCantidadUp" placeholder="Cantidad del Producto">
                                <label for="txtCantidadUp">Cantidad del Producto</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="txtDescripcionUp" placeholder="Descripcion del Producto"></textarea>
                                <label for="txtDescripcionUp">Descripcion del Producto</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="update()" class="btn btn-warning" data-bs-dismiss="modal">Modificar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-center" id="deleteModal">Eliminar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <h4 id="mensajeEliminar"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="deletes()" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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
<?php include_once "footer.php"; ?>
<script src="assets/js/productos.js"></script>