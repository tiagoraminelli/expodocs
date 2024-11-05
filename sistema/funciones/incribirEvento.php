<?php
session_start();

// Asegúrate de que el usuario esté logueado (esto es opcional pero recomendable)
if (!isset($_SESSION['id'])) {
    // Redirigir al login si no está autenticado
    header("Location: ./login.php");
    exit();
}

// Incluye las clases necesarias
require '../../modelo/bd.php';
require '../../modelo/Inscriptos.php';

// Crear una instancia de la clase
$inscripto = new Inscriptos();

// Obtener los datos enviados por GET
$evento_id = isset($_GET['evento']) ? intval($_GET['evento']) : null;
$usuario_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;  // Asumimos que el ID del usuario está en la sesión

// Verificar que los parámetros están definidos correctamente
if ($evento_id && $usuario_id) {
    // Llamar a la función para insertar la inscripción
    $insertado = $inscripto->insertarInscripcion($evento_id, $usuario_id);

    // Verificar si la inscripción fue exitosa
    if ($insertado) {
        echo "Inscripción exitosa.";
    } else {
        echo "Hubo un problema al intentar inscribir al usuario.";
    }
} else {
    echo "Faltan parámetros necesarios.";
}

// Redirigir al usuario de nuevo a la página de eventos
header("Location: ../evento.php");
exit();
?>
