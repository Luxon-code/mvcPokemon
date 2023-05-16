<?php

use Modelo\Rol;

include_once "../model/rol.php";

$id = $_POST["id"];
$estado = $_POST["estado"];

if($estado == "A"){
    $estado = "I";
}else{
    $estado="A";
}

$rolM = new Modelo\Rol();

$rolM->setId($id);
$rolM->setEstado($estado);
$result = $rolM->statusRol();
echo json_encode($result);

unset($rolM);
unset($result);
