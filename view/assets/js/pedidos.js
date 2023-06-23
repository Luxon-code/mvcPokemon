function hacerPedidio(){
    detallePedido = JSON.parse(localStorage.carrito)
    totalPedido = localStorage.totalCarrito
    idUsuario = localStorage.idUsuario
    codigoPedido = generarCodigoRandom(8)
    nombre = txtNombre.value
    direccion = txtDireccion.value
    telefono = txtTelefono.value
    formaPago = cbFormaPago.value
    //me falto tiempo
    Swal.fire(
      'Pedido',
      'Pedido Exitoso',
      'success'
    )
}
function generarCodigoRandom(longitud) {
    var caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var codigo = '';
  
    for (var i = 0; i < longitud; i++) {
      var indice = Math.floor(Math.random() * caracteres.length);
      codigo += caracteres.charAt(indice);
    }
  
    return codigo;
}