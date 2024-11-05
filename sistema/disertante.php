<?php
set_include_path("../modelo/");
session_start();
require 'Evento.php'; 
require 'Disertante.php'; 

// Crear instancias de las clases
$disertante = new Disertante();
$evento = new Evento();

// Obtener el arreglo de disertantes listados
$disertantesListados = $disertante->getDisertantesByEventos();

// Extraer solo los ID de los disertantes
$disertanteIds = [];
foreach ($disertantesListados as $disertante) {
    $disertanteIds[] = $disertante['id'];  // Agregar el ID de cada disertante al arreglo
}

// Obtener los eventos correspondientes a los disertantes usando sus IDs
$datosEventos = $evento->getEventosByDisertanteIds($disertanteIds);

// Agrupar los eventos por disertante
$eventosPorDisertante = [];
foreach ($datosEventos as $evento) {
    $disertanteId = $evento['disertante_id'];
    if (!isset($eventosPorDisertante[$disertanteId])) {
        $eventosPorDisertante[$disertanteId] = [];
    }
    $eventosPorDisertante[$disertanteId][] = $evento;
}

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
    </style>
</head>
<body>

<?php include("../includes/navSistema.php")?>

<div class="container intro-section">
    <div class="row">
        <div class="col intro-text">
            <h2 class="section-title">Gestión de Eventos y Usuarios</h2>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis leo ut dui lobortis, sed dapibus nulla luctus. Integer vel varius libero.
            </p>

            <section class="left-section p-4">
                <h1 class="section-title">Disertantes</h1>

                <div class="row">
                  <?php 
                  // Recorrer los disertantes que tienen eventos
                  foreach ($eventosPorDisertante as $disertanteId => $eventos) {
                    // Buscar información del disertante
                    $disertanteInfo = array_filter($disertantesListados, function($disertante) use ($disertanteId) {
                        return $disertante['id'] == $disertanteId;
                    });
                    $disertanteInfo = array_shift($disertanteInfo); // Extraer el primer elemento

                    // Formatear hora y fecha para los eventos
                    $eventoTitles = [];
                    foreach ($eventos as $evento) {
                        $eventoTitles[] = $evento['titulo'];
                    }

                    ?>
                    <div class="col-12 mb-4">  <!-- Cambié col a col-12 para que cada carta ocupe toda la fila -->
                        <div class="card shadow-lg border-light">
                            <div class="card-body">
                                <h5 class="card-title"><?= $disertanteInfo['nombre'] . " " . $disertanteInfo['apellidos'] ?></h5>
                                <p class="card-text"><?= substr($disertanteInfo['biografia'], 0, 100) ?>...</p>
                                <a class="btn btn-info" href="<?= $disertanteInfo['linkedin'] ?>" class="card-text">LinkedIn</a> 
                                <a class="btn btn-info" href="<?= $disertanteInfo['twitter'] ?>" class="card-text">Twitter</a>
                                <h6 class="mt-3">Eventos Asociados</h6>
                                <ul>
                                    <?php foreach ($eventoTitles as $title) { ?>
                                        <li class="nav-item"><a href="../index.php" target="_blank" rel="noopener noreferrer"><?= $title ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </section>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary w-100 register-btn" onclick="window.location.href='./sistema/html/formulario.html';">REGÍSTRATE</button>
            <p>¿Ya estás registrado? <a href="./sistema/html/ingreso.html" target="_blank" rel="noopener noreferrer">Acceder</a></p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique neque animi cum voluptate impedit voluptates doloribus illo totam, molestiae suscipit porro quo necessitatibus sapiente consectetur harum ullam? Tenetur, assumenda dignissimos.</p>
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
