<?php

include_once "../model/producto.php";


$rolM = new Modelo\Producto();
$rolM->setId($_POST["id"]);
$response = $rolM->delete();

echo json_encode($response);

unset($rolM);
unset($response);