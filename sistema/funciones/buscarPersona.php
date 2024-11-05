<?php
set_include_path("../../modelo");
require_once 'Bd.php';
require_once 'persona.php';

$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';

$p = new Persona();
$lista = $p->buscarPersonas($searchQuery); // Debes implementar esta función
header('Content-Type: application/json'); // Asegúrate de establecer el tipo de contenido
echo json_encode($lista); // Devuelve la lista como JSON
?>
