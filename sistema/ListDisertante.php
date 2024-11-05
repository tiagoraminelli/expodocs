<?php
session_start();
    set_include_path("../modelo");
    require_once 'Bd.php';
    require 'Disertante.php';
    $u = new Disertante();
    $lista = $u->getDisertantes();
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
    <title>Expo-Lista de Disertantes</title>
</head>
<body>
    <h2 class="titulo">Listado actual ExpoDocs: [Disertantes]</h2>
    <table class="tabla" id="tabla">
        <thead>
            <tr>
                <th name="numeral" id="numeral">N°</th>
                <th>id <i class="ri-links-line"></i></th>
                <th>nombre<i class="ri-account-box-line"></i></th>
                <th>telefono<i class="ri-phone-line"></i></th>
                <th>email <i class="ri-links-line"></i></th>
                <th>id <i class="ri-links-line"></i></th>           
                <th>url <i class="ri-phone-line"></i></th>
                <th>x <i class="ri-links-line"></i></th>
                <th>linkedin <i class="ri-links-line"></i></th>
                <th>acciones <i class="ri-links-line"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica si hay datos en la lista
            if (empty($lista)) {
            ?>
                <tr>
                    <td colspan="7">NO EXISTEN DATOS</td>
                </tr>
            <?php
            } else {
                foreach ($lista as $datos) {
                    $contador++;
            ?>
                <tr class="user-row">
                    <td><?=$numeral++;?></td>
                    <td><?=$datos['id']; //elemento del arreglo ?></td>
                    <td><?=$datos['nombre']." ".$datos['apellidos']; //elemento del arreglo ?></td>
                    <td><?=$datos['telefono']; //elemento del arreglo ?></td>
                    <td><?=$datos['email']; //elemento del arreglo ?></td>
                    <td><?=$datos['id'];?></td>
                    <td><?=$datos['url'];?></td>
                    <td><?=$datos['twitter'];?></td>
                    <td><?=$datos['linkedin'];?></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
