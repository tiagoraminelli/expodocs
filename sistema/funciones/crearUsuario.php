<?php
session_start();
// Incluir las clases necesarias
require_once '../../modelo/bd.php';
require_once '../../modelo/Persona.php';
require_once '../../modelo/Usuario.php';

// Recibimos los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$email = $_POST['email'] ?? '';
$dni = $_POST['dni'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$password = $_POST['password'] ?? '';

// Paso 1: Crear la persona
$persona = new Persona();
$personaData = [
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'telefono' => $telefono,
    'email' => $email,
];

// Insertar la persona y obtener su ID
$personaId = $persona->save($personaData);  // Supone que save() devuelve el ID de la persona

var_dump($personaId);
// Comprobamos que se creó la persona correctamente
if ($personaId) {
    // Paso 2: Crear el usuario con los datos de persona
    $usuario = new Usuario();
    $usuarioData = [
        'dni' => $dni,
        'direccion' => $direccion,
        'password' => $password,  // Encriptar la contraseña
        'idPersona' => $personaId,  // Asignamos el ID de la persona
    ];

    // Insertar el usuario
    $usuarioId = $usuario->save($usuarioData);  // Supone que save() devuelve el ID del usuario

    // Comprobamos si el usuario se creó correctamente
    if ($usuarioId) {
        echo "Usuario creado exitosamente.";
        // Redirigir al usuario a otra página o mostrar éxito
        header('Location: ../sistema/evento.php');
        exit;
    } else {
        echo "Error al crear el usuario.";
    }
} else {
    echo "Error al crear la persona.";
}

?>
