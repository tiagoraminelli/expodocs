<?php
set_include_path("../../modelo");
require_once 'Bd.php';
require_once 'persona.php';

// Obtener parámetros de paginación y búsqueda
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10; // Número de registros por página
$offset = ($page - 1) * $perPage;

// Obtener el parámetro de búsqueda desde el campo único "q"
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';

$p = new Persona();

// Si hay un término de búsqueda, buscamos en varios campos
if (!empty($searchQuery)) {
    $lista = $p->buscarPersonasPorTermino($searchQuery, $perPage, $offset);
} else {
    // Si no hay término de búsqueda, mostrar la paginación normal
    $lista = $p->getPersonaPaginacion($perPage, $offset);
}

$contador = 0;
$numeral = $offset + 1;

if (empty($lista)) {
    echo '<tr><td colspan="7" class="text-center">NO EXISTEN DATOS</td></tr>';
} else {
    foreach ($lista as $datos) {
        $contador++;
        echo '<tr class="user-row">';
        echo '<th scope="row"><input type="checkbox" name="inputIdBox" id="inputIdBox"></th>';
        echo '<td>' . $numeral++ . '</td>';
        echo '<td>' . $datos['id'] . '</td>';
        echo '<td>' . $datos['nombre'] . ' ' . $datos['apellidos'] . '</td>';
        echo '<td>' . $datos['telefono'] . '</td>';
        echo '<td>' . $datos['email'] . '</td>';
        echo '<td class="d-flex gap-2">';
        echo '<button onclick="eliminarPersona(' . $datos['id'] . ')" class="btn btn-danger btn-sm">Borrar</button>';
        echo '<button onclick="editarPersona(' . $datos['id'] . ')" class="btn btn-warning btn-sm">Editar</button>';
        echo '<button onclick="verPersona(' . $datos['id'] . ')" class="btn btn-info btn-sm">Ver</button>';
        echo '</td>';
        echo '</tr>';

        if ($contador == 10) {
            break;
        }
    }
}
?>
