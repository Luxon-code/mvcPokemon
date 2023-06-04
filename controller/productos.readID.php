<?php
include_once "../model/producto.php";

$rolM = new Modelo\Producto();

$rolM->setId($_POST["txtId"]);

$result= $rolM->readID();

echo json_encode($result);
unset($rolM);
unset($result);