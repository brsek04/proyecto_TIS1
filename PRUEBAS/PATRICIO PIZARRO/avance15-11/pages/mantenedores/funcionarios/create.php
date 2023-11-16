<?php
    include("database/auth.php");
?>

    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

            <div class="list-group list-group-flush my-3">
                <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fa-solid fa-people-group me-2"></i>Funcionarios</a>
                <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0">Registro de Funcionarios</h2>
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


<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/funcionarios/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" placeholder="Ingrese el nombre del funcionario">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido del funcionario" >
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="abcde@xxxx.com" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="establecimiento" class="form-label">Establecimiento</label>
                        <select class="form-control" id="establecimiento" name="establecimiento">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM establecimientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['establecimiento']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div> 

                    <div class="col-md-12 mb-3">
                        <label for="departamento" class="form-label">Departamento</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM departamentos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['departamento']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>





                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

<!-- validacion email -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("email").addEventListener("input", function () {
            var emailInput = this.value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput)) {
                this.setCustomValidity("El email no es válido.");
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</main>

  