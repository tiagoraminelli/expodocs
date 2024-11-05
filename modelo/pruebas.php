<?php
require_once "bd.php";
require_once "persona.php";

echo "pruebas: "."<br>";
$datos = new Persona();
$vard = $datos->buscarPersonas("j");
echo "<pre>";
var_dump($vard);
echo "</pre>";