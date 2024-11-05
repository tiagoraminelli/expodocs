<?php
// Asegúrate de que las rutas sean correctas
require_once '../modelo/Bd.php';
require_once '../modelo/persona.php';
require_once '../modelo/usuario.php';
require_once '../modelo/evento.php';
require_once '../modelo/disertante.php';

// Cargar la biblioteca TCPDF
require_once '../lib/tcpdf/tcpdf.php'; // Asegúrate de ajustar la ruta a donde tengas TCPDF

// Verificar si el parámetro "id" está presente en la solicitud GET
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo 'ID no proporcionado';
    exit;
}

$id = $_GET["id"];
$p = new persona();
$e = new Evento();
$d = new Disertante();
$u = new Usuario();

$datosPersona = $p->getPersonaById($id);
$datosEventos = $e->getEventosByDisertante($id);
$datosDisertante = $d->getDisertantesById($id);
$datosUsuario = $u->getUsuariosById($id);

if (isset($_GET['export_pdf'])) {
    // Crear instancia de TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // Estilos de Bootstrap en el PDF
    $pdf->SetCellPadding(2);
    $pdf->SetCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(60, 60, 60);
    $pdf->SetTextColor(0, 0, 0); // Establece el color del texto a negro
    
    // Encabezado
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Detalles de la Persona', 0, 1, 'C', true);
    $pdf->SetFont('helvetica', '', 12);
    
    // Tabla para Persona
    if ($datosPersona && is_array($datosPersona)) {
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(40, 10, 'ID:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosPersona['id']), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Nombre:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosPersona['nombre']), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Apellidos:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosPersona['apellidos']), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Teléfono:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosPersona['telefono']), 1, 1, 'L');
        
        $pdf->Cell(40, 10, 'Email:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosPersona['email']), 1, 1, 'L');
    } else {
        $pdf->Cell(0, 10, 'No se encontraron datos de la persona.', 0, 1);
    }

    // Detalles del Evento
    $pdf->Ln();
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Detalles del Evento', 0, 1, 'C', true);
    $pdf->SetFont('helvetica', '', 12);

    if ($datosEventos && is_array($datosEventos)) {
        foreach ($datosEventos as $evento) {
            $pdf->SetFillColor(220, 220, 220);
            $pdf->Cell(40, 10, 'ID:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['id']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Título:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['titulo']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Slug:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['slug']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Descripción:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['descripcion']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Fecha:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['fecha']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Hora:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['hora']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Duración:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['duracion']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Idioma:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($evento['idioma']), 1, 1, 'L');
            
            $pdf->Ln();
        }
    } else {
        $pdf->Cell(0, 10, 'No se encontraron eventos para este disertante.', 0, 1);
    }

    // Detalles del Disertante
    $pdf->Ln();
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Detalles del Disertante', 0, 1, 'C', true);
    $pdf->SetFont('helvetica', '', 12);

    if ($datosDisertante && is_array($datosDisertante)) {
        foreach ($datosDisertante as $d) {
            $pdf->SetFillColor(220, 220, 220);
            $pdf->Cell(40, 10, 'ID:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['id']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Nombre:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['nombre']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Apellidos:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['apellidos']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Teléfono:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['telefono']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Email:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['email']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'URL:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['url']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'Twitter:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['x']), 1, 1, 'L');

            $pdf->Cell(40, 10, 'LinkedIn:', 1, 0, 'L', true);
            $pdf->Cell(0, 10, htmlspecialchars($d['linkedin']), 1, 1, 'L');
            
            $pdf->Ln();
        }
    } else {
        $pdf->Cell(0, 10, 'No se encontraron disertantes.', 0, 1);
    }

    // Detalles del Usuario
    $pdf->Ln();
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Detalles del Usuario', 0, 1, 'C', true);
    $pdf->SetFont('helvetica', '', 12);

    if ($datosUsuario && is_array($datosUsuario)) {
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(40, 10, 'ID:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosUsuario['id']), 1, 1, 'L');

        $pdf->Cell(40, 10, 'DNI:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosUsuario['dni']), 1, 1, 'L');

        $pdf->Cell(40, 10, 'Dirección:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosUsuario['direccion']), 1, 1, 'L');

        $pdf->Cell(40, 10, 'Contraseña:', 1, 0, 'L', true);
        $pdf->Cell(0, 10, htmlspecialchars($datosUsuario['password']), 1, 1, 'L');
    } else {
        $pdf->Cell(0, 10, 'No se encontraron datos del usuario.', 0, 1);
    }

    // Generar el PDF y enviarlo al navegador para visualizar en pantalla
    $pdf->Output('detalles.pdf', 'I'); // Cambia 'D' a 'I' para mostrar en pantalla
    exit;
}
?>
