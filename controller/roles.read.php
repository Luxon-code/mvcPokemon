<?php
include_once "../model/rol.php";

$rolM  = new Modelo\Rol();

$result= $rolM->read();

echo json_encode($result);
unset($rolM);
unset($result);