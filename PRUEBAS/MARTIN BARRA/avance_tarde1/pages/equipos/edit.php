<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM equipos WHERE id=" . $id . ";";
$result =  mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $fechaIngreso = $row["fechaIngreso"];
    $tipoEquipo = $row["tipo_id"]; 
    $modelo = $row["modelo"];
    $marcas = $row["marca_id"];
    $memorias = $row["memoria_id"];
    $almacenamientos = $row["almacenamiento_id"];
    $tipoAlmacenamientos = $row["tipoAlmacenamiento_id"];
    $formaIngreso = $row["formaIngreso_id"];
    $fechaMantencion = $row["fechaMantencion"];
    $costo = $row["costo"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=equipos/index");
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                    <h2 class="fs-2 mx-4 text-white">Editar equipos</h2>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

<main class="container mx-5">
<div class="row" >
    <div class="card text-bg-dark">
        <form action="pages/equipos/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                    <div class="col-md-12 mb-3">
                        <label for="fechaIngreso" class="form-label ">Fecha de ingreso</label>
                        <input type="date" class="form-control text-bg-dark " id="fechaIngreso" name="fechaIngreso"  value="<?php echo $fechaIngreso ?>">
                    </div>

                    





                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo de equipo</label>
                        <select class="form-control text-bg-dark" id="tipoEquipo" name="tipoEquipo">
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
                        <select class="form-control text-bg-dark" id="marcas" name="marcas">
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
                        <select class="form-control text-bg-dark" id="memorias" name="memorias">
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
                        <select class="form-control text-bg-dark" id="almacenamientos" name="almacenamientos">
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
                        <select class="form-control text-bg-dark" id="tipoAlmacenamientos" name="tipoAlmacenamientos">
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
                        <label for="formaIngresos" class="form-label">Formas de Ingresos</label>
                        <select class="form-control text-bg-dark" id="formaIngresos" name="formaIngresos">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM formaIngresos");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $tipoAlmacenamientos) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['formaIngreso'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="fechaMantencion" class="form-label">Fecha de Mantencion</label>
                        <input type="date" class="form-control text-bg-dark" id="fechaMantencion" name="fechaMantencion"  value="<?php echo $fechaMantencion ?>">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control text-bg-dark" id="modelo" name="modelo" value="<?php echo $modelo ?>">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control text-bg-dark" id="costo" name="costo" value="<?php echo $costo ?>">
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
    </div>
</main>


