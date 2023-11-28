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
    $formaIngreso = $row["formaIngreso_id"];
    $fechaMantencion = $row["fechaMantencion"];
    $costo = $row["costo"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=equipos/index");
}
?>

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
                        <label for="formaIngresos" class="form-label">Formas de Ingresos</label>
                        <select class="form-control" id="formaIngresos" name="formaIngresos">
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
                        <input type="date" class="form-control" id="fechaMantencion" name="fechaMantencion"  value="<?php echo $fechaMantencion ?>">
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

