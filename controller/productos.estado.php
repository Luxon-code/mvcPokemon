<?php

include_once "../model/producto.php";

$id = $_POST["id"];
$estado = $_POST["estado"];

if($estado == "A"){
    $estado = "I";
}else{
    $estado="A";
}

$rolM = new Modelo\Producto();

$rolM->setId($id);
$rolM->setEstado($estado);
$result = $rolM->statusRol();
echo json_encode($result);

unset($rolM);
unset($result);