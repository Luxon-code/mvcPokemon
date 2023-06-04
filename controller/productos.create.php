<?php

include_once "../model/producto.php";

$rolM = new Modelo\Producto();

$rolM->setNombrePro($_POST['nombre']);
$rolM->setPrecioPro($_POST['precio']);
$rolM->setCantidadPro($_POST['cantidad']);
$rolM->setDescripPro($_POST['descripcion']);

$result= $rolM->create();

echo json_encode($result);
unset($rolM);