<?php

include_once "../model/producto.php";

$rolM = new Modelo\Producto();

$rolM->setNombrePro($_POST['nombre']);
$rolM->setPrecioPro($_POST['precio']);
$rolM->setCantidadPro($_POST['cantidad']);
$rolM->setDescripPro($_POST['descripcion']);
$rolM->setId($_POST["id"]);
$result= $rolM->update();

echo json_encode($result);
unset($rolM);
unset($result);