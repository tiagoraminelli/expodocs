<?php

if (!isset($_SESSION['usuario_activo'])){
    header('Location: ../index.php');
}
session_start();
set_include_path("../modelo/");

require 'Evento.php'; 
require 'Inscriptos.php'; 

// Crear instancias de las clases
$evento = new Evento();
$inscrips = new Inscriptos();
$idUsuario = $_SESSION['id'];
// Obtener eventos a los que el usuario está inscrito
$datosInscrip = $inscrips->getEventosByUsuarioId($_SESSION['id']);
// Llamar al método para contar los eventos a los que está inscrito el usuario
$cantidadInscriptos = $inscrips->countInscriptosByIdUser($idUsuario);
$eventosListados = $evento->getOnlyEventos();

// Convertir los eventos a los que está inscrito en un arreglo para facilitar la búsqueda
$eventosInscritosIds = array_map(function($inscripto) {
    return $inscripto['evento_id'];
}, $datosInscrip);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/nav.css">
    <link rel="stylesheet" href="./public/css/eventos.css">
    <title>Listado de Eventos</title>
    <style>
        .card-body {
            padding: 1.25rem;
        }
        .card-title a {
            font-weight: bold;
            text-decoration: none;
            color: #007bff;
        }
        .card-title a:hover {
            text-decoration: underline;
        }
        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .intro-section {
            padding: 30px 0;
        }
        .intro-text {
            padding-right: 20px;
        }
        .register-btn {
            margin-top: 30px;
        }
        /* Estilo personalizado para los eventos */
        .event-card {
            margin-bottom: 30px; /* Espaciado mayor entre eventos */
        }
        .btn-inscribirse {
            margin: 15px; /* Espaciado entre la descripción y el botón */
        }
        .btn-inscripto {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>

<?php include("../includes/navSistema.php")?>

<div class="container intro-section">
    <div class="row">
        <div class="col-md-8">
            <section class="left-section p-4">
                <h1 class="section-title">Eventos</h1>

                <div class="row">
                  <?php 
                  foreach($eventosListados as $eventos) {
                    $hora = $eventos['hora'];
                    $fecha = DateTime::createFromFormat('H:i:s', $hora);
                    if ($fecha !== false) {
                        $duracionHoras = $eventos['duracion'];
                        $intervalo = new DateInterval('PT' . $duracionHoras . 'H');
                        $fecha->add($intervalo);
                        $nuevaHora = $fecha->format('H:i:s');
                        $horarios = substr($hora, 0, 5) . " - " . substr($nuevaHora, 0, 5);
                    }

                    // Verificar si el evento está inscrito por el usuario
                    $estaInscripto = in_array($eventos['id'], $eventosInscritosIds);
                    ?>
                    <div class="col-12 mb-4 event-card">
                      <div class="card shadow-lg border-light">
                        <div class="card-body">
                          <h5 class="card-title"><a href="#" class="evento-link" data-id="<?= $eventos['id'] ?>"><?= $eventos['titulo'] ?></a></h5>
                          <p class="card-text"><?= substr($eventos['descripcion'], 0, 100) ?>...</p>
                          <p class="text-muted"><?= $horarios ?></p>
                          
                          <!-- Botón Inscribirse o Inscripto -->
                          <?php if ($estaInscripto): ?>
    <button class="btn btn-inscripto" disabled>Inscripto</button>
<?php else: ?>
    <!-- Enlace con los parámetros correctamente pasados -->
    <a href="../sistema/funciones/incribirEvento.php?evento=<?= $eventos['id'] ?>&usuario=<?= $_SESSION['id'] ?>" class="btn btn-primary btn-inscribirse">Inscribirse</a>
<?php endif; ?>

                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
            </section>
        </div>

        <!-- Sección de la derecha con el nombre del usuario -->
        <div class="col-md-4">
            <section class="right-section p-4">
                <h2 class="section-title">Bienvenido, <?= isset($_SESSION['usuario_activo']) ? $_SESSION['usuario_activo'] : 'Usuario' ?></h2>
                <p>Estas inscrito a: <?php echo $cantidadInscriptos." eventos" ?></p>
                <br>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique neque animi cum voluptate impedit voluptates doloribus illo totam, molestiae suscipit porro quo necessitatibus sapiente consectetur harum ullam? Tenetur, assumenda dignissimos.</p>
            </section>
            <section class="side-section p-4 bg-slate-50">
                <h2 class="font-bold">Ventajas de asistir</h2>
                <ul class="list-disc pl-5">
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
            </section>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-4">
  <p>&copy; 2024 Gestión de Eventos. Todos los derechos reservados.</p>
  <ul class="footer-links">
    <li><a href="#">Política de privacidad</a></li>
    <li><a href="#">Términos y condiciones</a></li>
    <li><a href="#">Contacto</a></li>
  </ul>
</footer>

<!-- Cargar Bootstrap 5 Bundle (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>
