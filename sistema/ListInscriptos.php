<?php
session_start();
    set_include_path("../modelo");
    require_once 'Bd.php';
    require 'Inscriptos.php';
    $u = new Inscriptos();
    $lista = $u->getEventosAndUsuarios();
    // Variables del listado:
    $contador = 0;
    $numeral = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/list.css">
    <title>Expo-Lista de Inscriptos</title>
</head>
<body>
    <h2 class="titulo">Listado actual ExpoDocs: [Inscriptos]</h2>
    <table class="tabla" id="tabla">
        <thead>
            <tr>
                <th name="numeral" id="numeral">N°</th>
                <th>Evento ID <i class="ri-links-line"></i></th>
                <th>Evento Título <i class="ri-account-box-line"></i></th>
                <th>Usuario ID <i class="ri-phone-line"></i></th>
                <th>Usuario DNI <i class="ri-links-line"></i></th>
                <th>Persona ID <i class="ri-links-line"></i></th>
                <th>Nombre <i class="ri-links-line"></i></th>
                <th>Apellidos <i class="ri-links-line"></i></th>
                <th>Acciones <i class="ri-links-line"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica si hay datos en la lista
            if (empty($lista)) {
            ?>
                <tr>
                    <td colspan="9">NO EXISTEN DATOS</td>
                </tr>
            <?php
            } else {
                foreach ($lista as $datos) {
                    $contador++;
            ?>
                <tr class="user-row">
                    <td><?=$numeral++;?></td>
                    <td><?=$datos['evento_id'];?></td>
                    <td><?=$datos['titulo'];?></td>
                    <td><?=$datos['usuario_id'];?></td>
                    <td><?=$datos['dni'];?></td>
                    <td><?=$datos['id'];?></td>
                    <td><?=$datos['nombre'];?></td>
                    <td><?=$datos['apellidos'];?></td>
                    <td class="botones">
                        <button class="delete">Borrar</button>
                        <button class="edit">Editar</button>
                        <button class="view">Ver</button>
                    </td>
                </tr>
            <?php
                    if ($contador == 10) {
                        break;
                    }
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
