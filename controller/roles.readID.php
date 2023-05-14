<?php
include_once "../model/rol.php";

$rolM = new Modelo\rol();

$rolM->setId($_POST["txtId"]);

$result= $rolM->readID();

echo json_encode($result);
unset($rolM);
unset($result);