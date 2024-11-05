<?php
// Incluir los archivos necesarios para la conexión a la base de datos y las clases
require_once '../../modelo/Bd.php';
require_once '../../modelo/persona.php';
require_once '../../modelo/usuario.php';
require_once '../../modelo/disertante.php';
require_once '../../modelo/evento.php';
require_once '../../modelo/inscriptos.php';

// Crear una respuesta por defecto
$response = array('success' => false, 'mensaje' => 'Error al eliminar la persona');

// Crear instancias de las clases necesarias
$p = new Persona();
$u = new Usuario();
$d = new Disertante();
$i = new Inscriptos();
$e = new Evento();
// Función para eliminar una persona y sus asociaciones
function eliminarPersona($id, $p, $u, $d, $i, $e) {

    // Verificar si el ID existe en la tabla inscriptos
    $usuarioInscritoEnEvento = $i->getEventosByUsuarioId($id);
    //var_dump($usuarioInscritoEnEvento);
    if ($usuarioInscritoEnEvento) {
    // Si existe, eliminar los datos asociados en la tabla inscriptos
    $i->deleteEventosByUsuarioId($id);
    //echo "existe en la tabla inscripto"."<br>";
    }

    // Verificar si el ID existe en la tabla evento
    $DisertanteEnEvento = $e->getEventosByDisertante($id);
    //var_dump($DisertanteEnEvento)."<br>";
    if ($DisertanteEnEvento) {
    // Si existe, eliminar los datos asociados en la tabla evento
    $e->deleteEventoByDisertanteId($id);
    //echo "existe en la tabla evento"."<br>";
    }

    // Verificar si el ID existe en la tabla usuario
    $personaEnUsuario = $u->getUsuariosById($id);
    //var_dump($personaEnUsuario);
    if ($personaEnUsuario) {
    // Si existe, eliminar los datos asociados en la tabla usuario
    $u->deleteUsuariosById($id);
    //echo "existe en la tabla usuario "."<br>";
    }

    // Verificar si el ID existe en la tabla disertante
    $personaEnDisertante = $d->getPersonaInDisertante($id);
    //var_dump($personaEnDisertante)."<br>";
    if ($personaEnDisertante) {
    // Si existe, eliminar los datos asociados en la tabla disertante
    $d->deleteDisertanteById($id);
    //echo "existe en la tabla disertante"."<br>";
    }

    // Ahora eliminar la persona en la tabla persona
    return $p->deletePersonaById($id);
} //fin de la funcion

//eliminarPersona(1, $p, $u, $d,$i,$e );
//die();

// Verificar si se ha recibido un array de IDs para eliminación múltiple
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    // Eliminación múltiple de personas
    $ids = $_POST['ids'];
    $exito = true; // Variable para determinar si todas las eliminaciones fueron exitosas

    // Recorremos todos los IDs para eliminarlos uno por uno
    foreach ($ids as $id) {
        if (!eliminarPersona($id, $p, $u, $d,$i,$e )) {
            $exito = false;
            break; // Salimos del bucle si alguna eliminación falla
        }
    }

    // Si todas las eliminaciones fueron exitosas
    if ($exito) {
        $response['success'] = true;
        $response['mensaje'] = 'Todas las personas fueron eliminadas correctamente';
    } else {
        $response['mensaje'] = 'Error al eliminar una o más personas';
    }

} elseif (isset($_POST['inputIdPersona'])) {
    // Eliminación de una sola persona
    $id = $_POST['inputIdPersona'];
    if (eliminarPersona($id, $p, $u, $d,$i,$e )) {
        $response['success'] = true;
        $response['mensaje'] = 'Persona eliminada correctamente';
    } else {
        $response['mensaje'] = 'Error al eliminar la persona';
    }
} else {
    $response['mensaje'] = 'ID no proporcionado';
}

// Retornar la respuesta en formato JSON
echo json_encode($response);
?>
