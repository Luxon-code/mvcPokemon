<?php

include_once "../model/rol.php";

$id = $_POST['id'];

$rolM = new Modelo\Rol();
$rolM->setId($id);
$response = $rolM->delete();

echo json_encode($response);

unset($rolM);
unset($response);