<?php
set_include_path("../../modelo/");
require 'Persona.php';

$response = array('success' => false);
$datosObtenidos = [];

$p = new Persona(); // Creamos el objeto para llamar los métodos

if (isset($_POST['inputIdPersona'])) {
    $id = $_POST['inputIdPersona'];
    
    if ($id) { 
        $datos = $p->getPersonaById($id);
        
        if ($datos) {
            $datosObtenidos['mensaje'] = "Se encontró el ID y fue invocado por la función";
            $datosObtenidos['codigo'] = "10";    
            $datosObtenidos['datos'] = $datos;
            $response['success'] = true;
        } else {
            $datosObtenidos['mensaje'] = "No se encontró la persona con el ID especificado";
            $datosObtenidos['codigo'] = "99";
            $datosObtenidos['datos'] = [];
        }
    } else {
        $datosObtenidos['mensaje'] = "El ID no es válido";
        $datosObtenidos['codigo'] = "98";
        $datosObtenidos['datos'] = [];
    }
} else {
    $datosObtenidos['mensaje'] = "No se recibieron datos";
    $datosObtenidos['codigo'] = "97";
    $datosObtenidos['datos'] = [];
}

// Codificar la respuesta como JSON
echo json_encode($datosObtenidos);
?>
