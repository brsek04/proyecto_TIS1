<div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

            <div class="list-group list-group-flush my-3">
                <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-people-group me-2"></i>Funcionarios</a>
                <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fa-solid fa-bars-progress me-2"></i>Mantenedores</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-calendar me-2"></i>Calendario</a>
                <a href="pages/auth/actions/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Salir</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Mantenedores</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="index.php?p=auth/profile" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> <?php echo $_SESSION['username'] ?? null ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuracion</a></li>
                                <li><a class="dropdown-item" href="#">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


<div class="container text-center">
  <div class="row g-2">
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item " href="index.php?p=mantenedores/tipoEquipo/index">Tipo equipo</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/marcas/index">Marcas</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/memorias/index">Memoria</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/almacenamientos/index">Almacenamiento</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/tipoAlmacenamientos/index">Tipo almacenamiento</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/departamentos/index">Departamento</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/establecimientos/index">Establecimiento</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/comunas/index">Comunas</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/regiones/index">Regiones</a></li>
      </div>
    </div>
    <div class="row border gx-1 col-6">
      <div class="p-3">
      <li><a class="dropdown-item" href="index.php?p=mantenedores/formaIngresos/index">Formas de Ingreso</a></li>
      </div>
    </div>
  </div>
</div>