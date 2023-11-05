<?php
    include("database/auth.php");
?>

<main class="container mt-5">
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-people-group me-2"></i>Funcionarios</a>
                <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-bars-progress me-2"></i>Productos</a>
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
                    <h2 class="fs-2 m-0">Inicio</h2>
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
        <form action="pages/equipos/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="fechaIngreso" class="form-label">Fecha de ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" >
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="funcionario" class="form-label">Funcionario a cargo</label>
                        <select class="form-control" id="funcionario" name="funcionario">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT  * FROM funcionarios");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['nombre']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>



                


                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo</label>
                        <select class="form-control" id="tipoEquipo" name="tipoEquipo">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM tipo");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['tipo']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="marcas" class="form-label">Marca</label>
                        <select class="form-control" id="marcas" name="marcas">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM marcas");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['marca']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                               


                    <div class="col-md-12 mb-3">
                        <label for="memorias" class="form-label">Memoria</label>
                        <select class="form-control" id="memorias" name="memorias">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM memorias");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['memoria']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          
                    
                    <div class="col-md-12 mb-3">
                        <label for="almacenamientos" class="form-label">Almacenamiento</label>
                        <select class="form-control" id="almacenamientos" name="almacenamientos">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM almacenamientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['almacenamiento']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          



                    <div class="col-md-12 mb-3">
                        <label for="tipoAlmacenamientos" class="form-label">Tipo de almacenamiento</label>
                        <select class="form-control" id="tipoAlmacenamientos" name="tipoAlmacenamientos">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM tipoAlmacenamientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['tipoAlmacenamiento']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          














                       
                    </div>           



                   
                    <div class="col-md-12 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Escriba el modelo del equipo">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" placeholder="Costo en pesos chilenos">
                    </div>




                </div>
            </div>

            <div class="card-footer text-body-secondary text-end ">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <br>
        <br>
        <br>
        <br>
        
        <br>
                                    
    </div>

</main>