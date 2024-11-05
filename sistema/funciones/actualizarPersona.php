<?php
// Incluir los archivos necesarios para la conexión a la base de datos y la clase Persona
set_include_path("../../modelo");
require_once 'Bd.php';
require_once 'persona.php';
require_once '../../lib/Depuracion.php';

// Crear una respuesta por defecto
$response = array('success' => false, 'mensaje' => 'Error al guardar los datos');

// Obtener los datos del formulario enviados por GET
$nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : null;
$apellidos = isset($_GET['apellidos']) ? trim($_GET['apellidos']) : null;
$telefono = isset($_GET['telefono']) ? trim($_GET['telefono']) : null;
$email = isset($_GET['email']) ? trim($_GET['email']) : null;
$id = isset($_GET['id']) ? trim($_GET['id']) : null;

// Validar los campos obligatorios
if (!$nombre || !$apellidos) {
    $response['mensaje'] = 'Datos inválidos: el nombre y apellidos son obligatorios.';
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit; // Terminar la ejecución después de enviar la respuesta
}

// Aplicar la depuración solo si los valores son válidos
$nombre = Depuracion::Nombres($nombre, 2, 50);
$apellidos = Depuracion::Apellidos($apellidos, 2, 50);
$email = Depuracion::Email($email);
$telefono = $telefono ? Depuracion::Telefono($telefono) : null;
$id = $id ? Depuracion::id($id) : null;

// Crear una instancia de la clase Persona
$p = new Persona();

if ($id) {
    // Actualizar la persona si el ID está presente
    $resultado = $p->save([
        'id' => $id,
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
        'email' => $email
    ]);
    if ($resultado) {
        $response['success'] = true;
        $response['mensaje'] = 'Persona actualizada correctamente';
        header("location: ./ListPersona.php");
    } else {
        $response['mensaje'] = 'Error al actualizar la persona en la base de datos';
    }
} else {
    // Crear una nueva persona si no hay ID
    $resultado = $p->save([
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
        'email' => $email
    ]);
    if ($resultado) {
        $response['success'] = true;
        $response['mensaje'] = 'Persona creada correctamente';
        header("location: ./ListPersona.php");
    } else {
        $response['mensaje'] = 'Error al crear la persona en la base de datos';
    }
}

// Devolver la respuesta como JSON
echo json_encode($response, JSON_PRETTY_PRINT);
?>
