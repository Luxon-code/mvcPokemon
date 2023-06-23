<?php

include_once "../model/pedido.php";

$rolM = new Modelo\Pedido();

$rolM->setCodigoPed($_POST['codigoPed']);
$rolM->setIdUsu($_POST['idUsu']);
$rolM->setNombre($_POST['nombre']);
$rolM->setDireccion($post['direccion']);
$rolM->setTelefono($post['telefono']);
$rolM->setTotalPed($post['totalPed']);
$rolM->setFormaPago($post['formaPago']);

$result= $rolM->createSolicitud();

echo json_encode($result);
unset($rolM);

