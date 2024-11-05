<?php
session_start();
    set_include_path("../modelo");
    require_once 'Bd.php';
    require 'Evento.php';
    $u = new Evento();
    $lista = $u->getEventos();
    //variables del listado:
    $contador = 0;
    $numeral = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/list.css">
    <title>Expo-Lista de personas</title>
</head>
<body>
    <h2 class="titulo">Listado actual ExpoDocs: [Eventos]</h2>
    <table class="tabla" id="tabla">
    <thead>
        <tr>
            <th name="numeral" id="numeral">N°</th>
            <th>id <i class="ri-links-line"></i></th>
            <th>titulo <i class="ri-account-box-line"></i></th>
            <th>slug <i class="ri-phone-line"></i></th>
            <th>descripcion <i class="ri-links-line"></i></th>
            <th>fecha <i class="ri-links-line"></i></th>
            <th>hora <i class="ri-phone-line"></i></th>
            <th>duracion <i class="ri-links-line"></i></th>
            <th>idioma <i class="ri-links-line"></i></th>
            <th>disertante <i class="ri-links-line"></i></th>
            <th>acciones <i class="ri-links-line"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Verifica si hay datos en la lista
        if (empty($lista)) {
        ?>
            <tr>
                <td colspan="11">NO EXISTEN DATOS</td>
            </tr>
        <?php
        } else {
            foreach ($lista as $datos) {
                $contador++;
        ?>
            <tr class="user-row">
                <td><?=$numeral++;?></td>
                <td><?=$datos['id'];?></td>
                <td><?=$datos['titulo'];?></td>
                <td><?=$datos['slug'];?></td>
                <td><?=$datos['descripcion'];?></td>
                <td><?=$datos['fecha'];?></td>
                <td><?=$datos['hora'];?></td>
                <td><?=$datos['duracion'];?></td>
                <td><?=$datos['idioma'];?></td>
                <td><?=$datos['NombreCompleto'];?></td>
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