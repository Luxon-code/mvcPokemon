<?php

include_once "../model/rol.php";

$rolM = new Modelo\Rol();

$rolM->setNombreRol($_POST["txtRol"]);

$rolM->create();

echo json_encode("Rol creado");
unset($rolM);