<?php
set_include_path("../../modelo/");
require_once 'bd.php';
include 'Evento.php';

$e = new Evento(); // Asegúrate de que 'Evento' sea la clase correcta o esté incluida correctamente

if (isset($_POST['id'])) {
    $idEvento = $_POST['id'];
    $evento = $e->getDatosEventoById($idEvento);

    // Verificamos si se encontró el evento
    if ($evento) {
        // Preparamos un array asociativo con los datos del evento
        $hora = $evento['hora'];
                    $fecha = DateTime::createFromFormat('H:i:s', $hora);
                    if ($fecha !== false) {
                        $duracionHoras = $evento['duracion'];
                        $intervalo = new DateInterval('PT' . $duracionHoras . 'H');
                        $fecha->add($intervalo);
                        $nuevaHora = $fecha->format('H:i:s');
                        $horarios = substr($hora, 0, 5) . " - " . substr($nuevaHora, 0, 5);
                    }
        $datosEvento = [
            'id' => $evento['id'],
            'titulo' => $evento['titulo'],
            'descripcion' => $evento['descripcion'],
            'fecha' => $evento['fecha'],
            'hora' => $evento['hora'],
            'duracion' => $evento['duracion'],
            'idioma' => $evento['idioma'],
            'disertante_id' => $evento['disertante_id'],
            'nombre' => $evento['nombre'],
            'apellidos' => $evento['apellidos'],
            'horarios' => $horarios
        ];

        // Enviamos la respuesta como JSON
        header('Content-Type: application/json');
        echo json_encode($datosEvento);
    } else {
        echo json_encode(['error' => 'No se encontró el evento con el ID proporcionado']);
    }
} else {
    echo json_encode(['error' => 'No se recibió el ID del evento']);
}
?>
