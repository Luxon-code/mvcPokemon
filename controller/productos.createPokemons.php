<?php

include_once "../model/producto.php";

$rolM = new Modelo\Producto();

$rolM->setId($_POST['id']);
$rolM->setNombrePro($_POST['nombre']);
$rolM->setPrecioPro($_POST['precio']);
$rolM->setCantidadPro($_POST['cantidad']);
$rolM->setDescripPro($_POST['descripcion']);

$result= $rolM->createPokemons();

echo json_encode($result);
unset($rolM);