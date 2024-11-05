<?php
set_include_path("./modelo/");
session_start();
require 'Evento.php'; 

$evento = new Evento();
// Obtener 8 eventos aleatorios
$eventosListados = $evento->getEventosAleatorios(8);
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
            height: 200px;
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

<?php include("./includes/navIndex.php")?>


<div class="container intro-section">
    <div class="row">
        <div class="col-md-9 intro-text">
            <h2 class="section-title">Gestión de Eventos y Usuarios</h2>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis leo ut dui lobortis, sed dapibus nulla luctus. Integer vel varius libero.
            </p>

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
                    ?>
                    <div class="col-md-6 mb-4">
                      <div class="card shadow-lg border-light">
                        <div class="card-body">
                          <h5 class="card-title"><a href="#" class="evento-link" data-id="<?= $eventos['id'] ?>"><?= $eventos['titulo'] ?></a></h5>
                          <p class="card-text"><?= substr($eventos['descripcion'], 0, 100) ?>...</p>
                          <p class="text-muted"><?= $horarios ?></p>
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

<!-- Detalle del evento (inicialmente oculto) -->
<div id="evento-detalles" class="modal fade" tabindex="-1" aria-labelledby="eventoDetalladoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventoDetalladoLabel">Detalles del Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar-detalle"></button>
      </div>
      <div class="modal-body" id="detalle-evento">
        <!-- Los detalles del evento se cargarán aquí -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar-detalle">Cerrar</button>
      </div>
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
<script src="./public/js/buscarEvento.js"></script>

</body>
</html>
