<?php

include_once "../model/producto.php";

$rolM  = new Modelo\Producto();

$result= $rolM->read();

echo json_encode($result);
unset($rolM);
unset($result);