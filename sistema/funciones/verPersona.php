<?php
// Asegúrate de que las rutas sean correctas
require_once '../../modelo/Bd.php';
require_once '../../modelo/persona.php';
require_once '../../modelo/usuario.php';
require_once '../../modelo/evento.php';
require_once '../../modelo/disertante.php';

// Cargar la biblioteca TCPDF
require_once '../../lib/tcpdf/tcpdf.php'; // Asegúrate de ajustar la ruta a donde tengas TCPDF

$id = $_GET["id"];
$p = new persona();
$e = new Evento();
$d = new Disertante();
$u = new Usuario();

$datosPersona = $p->getPersonaById($id);
$datosEventos = $e->getEventosByDisertante($id);
$datosDisertante = $d->getDisertantesById($id);
$datosUsuario = $u->getUsuariosById($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Detalles</title>
</head>
<body>
    <div class="container mt-5">
        <!-- Mensaje de depuración -->
        <div class="alert alert-info" role="alert">
            <strong>Datos recibidos:</strong> 
            <?php echo htmlspecialchars(print_r($id, true)); ?>
        </div>

        <!-- Información de la Persona -->
        <h2>Detalles de la Persona</h2>
        <?php if ($datosPersona && is_array($datosPersona)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($datosPersona['id']); ?></td>
                    <td><?php echo htmlspecialchars($datosPersona['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($datosPersona['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($datosPersona['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($datosPersona['email']); ?></td>
                </tr>
            </tbody>
        </table>
        <?php else: ?>
        <p>No se encontraron datos de la persona.</p>
        <?php endif; ?>

        <!-- Información del Evento -->
        <h2>Detalles del Evento</h2>
        <?php if ($datosEventos && is_array($datosEventos)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Duración</th>
                    <th>Idioma</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($datosEventos[0])): ?>
                    <?php foreach ($datosEventos as $evento): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($evento['id']); ?></td>
                        <td><?php echo htmlspecialchars($evento['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($evento['slug']); ?></td>
                        <td><?php echo htmlspecialchars($evento['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($evento['fecha']); ?></td>
                        <td><?php echo htmlspecialchars($evento['hora']); ?></td>
                        <td><?php echo htmlspecialchars($evento['duracion']); ?></td>
                        <td><?php echo htmlspecialchars($evento['idioma']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No se encontraron eventos para este disertante.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No se encontraron eventos para este disertante.</p>
        <?php endif; ?>

        <!-- Información del Disertante -->
        <h2>Detalles del Disertante</h2>
        <?php if ($datosDisertante && is_array($datosDisertante)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>URL</th>
                    <th>Twitter</th>
                    <th>LinkedIn</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosDisertante as $d): ?>
                <tr>
                    <td><?php echo htmlspecialchars($d['id']); ?></td>
                    <td><?php echo htmlspecialchars($d['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($d['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($d['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($d['email']); ?></td>
                    <td><a href="<?php echo htmlspecialchars($d['url']); ?>" target="_blank"><?php echo htmlspecialchars($d['url']); ?></a></td>
                    <td><a href="<?php echo htmlspecialchars($d['twitter']); ?>" target="_blank"><?php echo htmlspecialchars($d['x']); ?></a></td>
                    <td><a href="<?php echo htmlspecialchars($d['linkedin']); ?>" target="_blank"><?php echo htmlspecialchars($d['linkedin']); ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No se encontraron disertantes.</p>
        <?php endif; ?>

        <!-- Información del Usuario -->
        <h2>Detalles del Usuario</h2>
        <?php if ($datosUsuario && is_array($datosUsuario)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($datosUsuario['id']); ?></td>
                    <td><?php echo htmlspecialchars($datosUsuario['dni']); ?></td>
                    <td><?php echo htmlspecialchars($datosUsuario['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($datosUsuario['password']); ?></td>
                </tr>
            </tbody>
        </table>
        <?php else: ?>
        <p>No se encontraron datos del usuario.</p>
        <?php endif; ?>

        <!-- Botón para Descargar PDF -->
        <form method="get" action="../../export/expoPersonas.php">
    <!-- Campo oculto para enviar el ID -->
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    <button type="submit" name="export_pdf" class="btn btn-primary mt-4">Descargar en PDF</button>
</form>

        <a href="../ListPersona.php" class="btn btn-secondary">Volver</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
