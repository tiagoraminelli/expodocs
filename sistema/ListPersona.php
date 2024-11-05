<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Expo - Lista de Personas</title>
</head>
<body class="bg-gray-100">

  <!-- Navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand" href="#">ExpoDocs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./ListPersona.php">Personas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ListUsuario.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ListInscritos.php">Inscritos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ListEventos.php">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ListDisertante.php">Disertantes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5" id="formulario">
        <!-- El contenido de persona.html se cargará aquí -->
    </div>

    <!-- Campo de búsqueda -->
    <div class="container my-4">
        <input type="text" id="searchInput" name="q" class="form-control" placeholder="Buscar personas...">
    </div>

    <!-- Botones de acción -->
    <div class="container my-4 d-flex gap-2">
        <button id="eliminarMultiple" class="btn btn-danger">Eliminación Múltiple</button>
        <button id="nuevoPersona" class="btn btn-success" onclick="nuevaPersona()">Nuevo</button>
    </div>

    <!-- Listado de personas -->
    <div class="container my-4" id="listado">
        <h2 class="mb-4 text-center text-2xl font-bold">Listado actual ExpoDocs: [personas]</h2>
        <table class="table table-striped table-bordered" id="tabla">
            <thead class="table-dark">
                <tr>
                    <th scope="col"># <input type="checkbox" name="inputIdAll" id="inputIdAll"></th>
                    <th scope="col">n°</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los datos se cargarán dinámicamente desde AJAX -->
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="container my-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" id="firstPage">Primera</a></li>
                    <li class="page-item"><a class="page-link" href="#" id="previousPage">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#" id="nextPage">Siguiente</a></li>
                    <li class="page-item"><a class="page-link" href="#" id="lastPage">Última</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Mensajes -->
    <div id="mensaje" class="container mt-3"></div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    <script src="../public/js/buscarDatos.js"></script>
    <script src="../public/js/busquedaYpaginacion.js"></script>
    <script src="../public/js/verPersona.js"></script>
    <script src="../public/js/eliminarPersona.js"></script>
    <script src="../public/js/seleccionMultiple.js"></script>
    <script src="../public/js/seleccionarPersona.js"></script>
    <script src="../public/js/editarPersona.js"></script>
    <script src="../public/js/nuevaPersona.js"></script>
</body>
<!-- Footer -->
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3">
        © 2024 ExpoDocs | Todos los derechos reservados
        <br>
        <a class="text-dark" href="https://www.ejemplo.com/privacidad">Política de Privacidad</a>
        <span class="text-muted"> | </span>
        <a class="text-dark" href="https://www.ejemplo.com/contacto">Contacto</a>
    </div>
</footer>
</html>
