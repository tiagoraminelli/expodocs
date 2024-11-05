<?php
session_start();
    set_include_path("../modelo");
    require_once 'Bd.php';
    require 'usuario.php';
    $u = new Usuario();
    $lista = $u->getUsuarios();
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
    <h2 class="titulo">Listado actual ExpoDocs: [Usuarios]</h2>
    
    <table class="tabla" id="tabla">
        <tbody>
            <thead>
                <tr>
                <th name="numeral" id="numeral">N°</i></th>
                    <th>id <i class="ri-links-line"></i></th>
                    <th>nombre<i class="ri-account-box-line"></i></th>
                    <th>telefono<i class="ri-phone-line"></i></th>
                    <th>email <i class="ri-links-line"></i></th>
                    <th>dni <i class="ri-links-line"></i></th>
                    <th>direccion<i class="ri-phone-line"></i></th>
                    <th>contraseña <i class="ri-links-line"></i></th>
                    <th>acciones <i class="ri-links-line"></i></th>
                
                </tr>
            </thead>

            <?php //abrimos llave 
            if(empty($lista)){ 
            ?> 
            <tr>
                <td>NO EXISTEN DATOS</td>
            </tr>
            <?php //abrimos llave 
            }
            ?> 

            <?php //abrimos llave 
            foreach ($lista as $datos) { 

            $contador++; //contador para limitar los elementos en pantalla
        
            ?>  
            <tr class="user-row"> 
                <td><?=$numeral++;?></td>
                <td><?=$datos['id']; //elemento del arreglo ?></td>
                <td><?=$datos['nombre']." ".$datos['apellidos']; //elemento del arreglo ?></td>
                <td><?=$datos['telefono']; //elemento del arreglo ?></td>
                <td><?=$datos['email']; //elemento del arreglo ?></td>
                <td><?=$datos['dni']; //elemento del arreglo ?></td>
                <td><?=$datos['direccion']; //elemento del arreglo ?></td>
                <td><?=$datos['password']; //elemento del arreglo ?></td>
                <td class="botones">
                <button class="delete">Borrar</button>
                <button class="edit">Editar</button>
                <button class="view">Ver</button>
            </td>


                
            </tr> 
            <?php //abrimos llave 

        if($contador == 10){ //llave del break
        break; //termina
        }
        }//fin foreach
            ?> 
    </tbody>
    <table>
</body>
</html>