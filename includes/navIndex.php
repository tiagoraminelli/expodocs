<nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Gestión de Eventos</a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        
            <!-- Dropdown para Gerente y Administrador -->
            <?php if (isset($_SESSION['nivel'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <!-- Elementos visibles solo para Gerentes -->
                        <?php if ($_SESSION['nivel'] == 'gerente'): ?>
                            <li><a class="dropdown-item" href="./gerente_dashboard.php">Dashboard Gerente</a></li>
                        <?php endif; ?>

                        <!-- Elementos visibles solo para Administradores -->
                        <?php if ($_SESSION['nivel'] == 'admin'): ?>
                            <li><a class="dropdown-item" target="_blank" href="#" >Panel de Administración</a></li>
                            <li><a class="dropdown-item" target="_blank" href="./sistema/ListPersona.php">Gestión de Personas</a></li>
                            <li><a class="dropdown-item" target="_blank" href="./sistema/Listusuario.php">Gestión de Usuarios</a></li>
                            <li><a class="dropdown-item" target="_blank" href="./sistema/ListEvento.phpp">Gestión de Eventos</a></li>
                            <li><a class="dropdown-item" target="_blank" href="./sistema/ListDisertante.php">Gestión de Disertante</a></li>
                            <li><a class="dropdown-item" target="_blank" href="./sistema/ListInscriptos.php">Gestión de Inscriptos</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <!-- Dropdown de usuario logueado (nombre, perfil, cerrar sesión) -->
            <?php if (isset($_SESSION['usuario_activo'])) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION['usuario_activo']); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                        <li><a class="dropdown-item" href="#">ID: <?php echo $_SESSION['id']; ?></a></li>
                        <li><a class="dropdown-item" href="./perfil.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="./sistema/funciones/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            <?php else : ?>
                <!-- Si no hay un usuario activo, no mostrar el dropdown de usuario -->
                <li class="nav-item"><a class="nav-link" href="./sistema/html/ingreso.html">Iniciar sesión</a></li>
            <?php endif; ?>


            <!-- Elementos comunes para todos los usuarios -->
            <li class="nav-item"><a class="nav-link" target="_blank" href="./sistema/evento.php">Eventos</a></li>
            <li class="nav-item"><a class="nav-link" target="_blank" href="./sistema/disertante.php">Disertantes</a></li>
            <li class="nav-item"><a class="nav-link" target="_blank" href="./sistema/html/patrocinadores.html">Patrocinadores</a></li>
            <li class="nav-item"><a class="nav-link" target="_blank" href="#">Consulta</a></li>

            <?php if (!isset($_SESSION['nivel'])): ?>
            <li class="nav-item"><a class="nav-link" target="_blank" href="./sistema/html/formulario.html">Regístrate</a></li>
            <?php endif; ?>


        </ul>
    </div>
</nav>
