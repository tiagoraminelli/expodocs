<?php
// Iniciamos la sesión
session_start();

// Incluimos las carpetas necesarias
include_once('../../modelo/bd.php');
require('../../modelo/persona.php');
require('../../modelo/usuario.php');
//var_dump($_POST);
// Verificamos si se han enviado datos a través del formulario
if (isset($_POST)) {
    $datos = $_POST;
    echo "<pre>";
    var_dump($datos);
    echo "</pre>";
    // Verificar si se mandaron solo el correo y la contraseña
    if (isset($datos['email']) && isset($datos['clave'])){
        // Crear una instancia de Usuario
        $persona = new Persona();
        // Buscar el usuario en la base de datos usando el email
        $personaDatos = $persona->getPersonaByEmail($datos['email']);
        $idUsuario = $personaDatos["id"];
        echo "<pre>";
        var_dump($personaDatos);
        echo "</pre>";

        //imprimimos en pantalla
        if($personaDatos){
        echo "buscando su instancia como usuario: "."<br>";
        $usuario = new Usuario();
        $usuarioDatos = $usuario->getUsuariosByPersonaId($idUsuario);
        echo "<pre>";
        var_dump($usuarioDatos);
        echo "</pre>";

        if (($datos['clave'] == $usuarioDatos['password']) and ($usuarioDatos['persona_id'] == 1)){
        // Almacenar el nombre en la sesión
        $_SESSION['usuario_activo'] = $personaDatos['nombre'];
        $_SESSION['nivel'] = "admin";
        $_SESSION['id'] = $usuarioDatos['id'];
        echo "Contraseña correcta.";
        header("Location: ../../index.php"); // Redirigir al índice
        exit;
        }

        if (($datos['clave'] == $usuarioDatos['password'])){
            // Almacenar el nombre en la sesión
            $_SESSION['usuario_activo'] = $personaDatos['nombre'];
            $_SESSION['nivel'] = "gerente";
            $_SESSION['id'] = $usuarioDatos['id'];
            echo "Contraseña correcta.";
            header("Location: ../../index.php"); // Redirigir al índice
            exit;
        } else {
            echo "Contraseña incorrecta.";
            //var_dump($usuarioDesdeDB);
            header("Location: ../../index.php"); // Redirigir al índice
        }
        }

    }else{
        header('Content-Type: application/json'); // Asegúrate de establecer el tipo de contenido
        echo json_decode("no existen datos");
        header("Location: ../../index.php"); // Redirigir al índice
    }
 
}else{
    header("Location: ../../index.php"); // Redirigir al índice
}
?>