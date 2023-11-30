<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <?php
            if (isset($_SESSION["username"])) {
            ?>
                <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                    <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="200"></a>
                    </li>
                    <li class="nav-item mt-2 fs-5">
                        <a class="nav-link <?php echo (strpos($pagina, 'brands') !== false) ? 'active' : null ?>" href="index.php?p=equipos/index">Equipos</a>
                    </li>
                    <li class="nav-item mt-2 fs-5">
                        <a class="nav-link <?php echo (strpos($pagina, 'users') !== false) ? 'active' : null ?>" href="index.php?p=users/index">Usuarios</a>
                    </li>

                    <li class="nav-item mt-2 fs-5">
                        <a class="nav-link <?php echo (strpos($pagina, 'users') !== false) ? 'active' : null ?>" href="index.php?p=mantenedores/funcionarios/index">Funcionarios</a>
                    </li>
                    
                    <li class="nav-item mt-2 fs-5">
                        <a class="nav-link <?php echo (strpos($pagina, 'users') !== false) ? 'active' : null ?>" href="index.php?p=mantenedores/index">Mantenedores</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/profile" class="btn btn-sm btn-outline-primary me-2 fs-5">Perfil</a>
                    <a href="pages/auth/actions/logout.php" class="btn btn-sm btn-outline-danger fs-5">Cerrar Sesión</a>
                </div>
                <!-- <a href="pages/auth/actions/logout.php">Cerrar Sesión</a> -->
            <?php
            } else {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="200"></a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/login" class="btn btn-sm btn-outline-primary me-2 fs-5">Iniciar Sesión</a>
                    <a href="index.php?p=auth/register" class="btn btn-sm btn-outline-success fs-5">Registrarse</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</nav>