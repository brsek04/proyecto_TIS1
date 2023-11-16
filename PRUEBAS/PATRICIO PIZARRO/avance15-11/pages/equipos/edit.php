<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM equipos WHERE id=" . $id . ";";
$result =  mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $fechaIngreso = $row["fechaIngreso"];
    $nombre = $row["funcionario_id"];
    $tipoEquipo = $row["tipo_id"]; 
    $modelo = $row["modelo"];
    $marcas = $row["marca_id"];
    $memorias = $row["memoria_id"];
    $almacenamientos = $row["almacenamiento_id"];
    $tipoAlmacenamientos = $row["tipoAlmacenamiento_id"];
    $costo = $row["costo"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=equipos/index");
}
?>

<main class="container mt-5">
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0">Edición de Equipo</h2>
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
        <form action="pages/equipos/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                    <div class="col-md-12 mb-3">
                        <label for="fechaIngreso" class="form-label">Fecha de ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso"  value="<?php echo $fechaIngreso ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="funcionario" class="form-label">Funcionarios</label>
                        <select class="form-control" id="funcionario" name="funcionario">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM funcionarios");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $nombre) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>





                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo de equipo</label>
                        <select class="form-control" id="tipoEquipo" name="tipoEquipo">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM tipo");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $tipoEquipo) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['tipo'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="marcas" class="form-label">Marca</label>
                        <select class="form-control" id="marcas" name="marcas">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM marcas");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $marcas) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    
                    <div class="col-md-12 mb-3">
                        <label for="memorias" class="form-label">Memorias</label>
                        <select class="form-control" id="memorias" name="memorias">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM memorias");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $memorias) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['memoria'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="almacenamientos" class="form-label">Almacenamientos</label>
                        <select class="form-control" id="almacenamientos" name="almacenamientos">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM almacenamientos");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $almacenamientos) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['almacenamiento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="tipoAlmacenamientos" class="form-label">Tipos de Almacenamientos</label>
                        <select class="form-control" id="tipoAlmacenamientos" name="tipoAlmacenamientos">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM tipoAlmacenamientos");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $tipoAlmacenamientos) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['tipoAlmacenamiento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>








                    <div class="col-md-12 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $modelo ?>">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control" id="costo" name="costo" value="<?php echo $costo ?>">
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
<br>
<br>
<br>
<br>
<br>
<br>

