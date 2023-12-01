<?php
include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                    <h2 class="fs-2 mx-4 text-white">Agregar equipo</h2>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

<main class="container mx-5">
<div class="row" >
    <div class="card text-bg-dark">
        <form action="pages/equipos/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="fechaIngreso" class="form-label">Fecha de ingreso</label>
                        <input type="date" class="form-control text-bg-dark" id="fechaIngreso" name="fechaIngreso">
                    </div>


                    <input type="hidden" id="funcionario" name="funcionario" value="">
<?php
include("database/connection.php");
$sql = $connection->query("SELECT * FROM funcionarios");
while ($resultado = $sql->fetch_assoc()) {
    // Si el nombre del funcionario es 'no asignado', establece el valor del input oculto
    if ($resultado['nombre'] == 'no asignado') {
        echo "<script>document.getElementById('funcionario').value = '" . $resultado['id'] . "';</script>";
        break; // Termina el bucle después de encontrar 'no asignado'
    }
}
?>

                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo</label>
                        <select class="form-control text-bg-dark" id="tipoEquipo" name="tipoEquipo">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM tipo");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['tipo'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="marcas" class="form-label">Marca</label>
                        <select class="form-control text-bg-dark" id="marcas" name="marcas">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM marcas");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['marca'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>



                    <div class="col-md-12 mb-3">
                        <label for="memorias" class="form-label">Memoria</label>
                        <select class="form-control text-bg-dark" id="memorias" name="memorias">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM memorias");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['memoria'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="almacenamientos" class="form-label">Almacenamiento</label>
                        <select class="form-control text-bg-dark" id="almacenamientos" name="almacenamientos">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM almacenamientos");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['almacenamiento'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>




                    <div class="col-md-12 mb-3">
                        <label for="tipoAlmacenamientos" class="form-label">Tipo de almacenamiento</label>
                        <select class="form-control text-bg-dark" id="tipoAlmacenamientos" name="tipoAlmacenamientos">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM tipoAlmacenamientos");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['tipoAlmacenamiento'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="formaIngresos" class="form-label">Forma de Ingreso</label>
                        <select class="form-control text-bg-dark" id="formaIngresos" name="formaIngresos">
                            <option disabled selected> Seleccione una opcion</option>
                            <?php
                            include("database/connection.php");
                            $sql = $connection->query("SELECT * FROM formaIngresos");
                            while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='" . $resultado['id'] . "'>" . $resultado['formaIngreso'] . " </option>";
                            }


                            ?>
                        </select>

                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="fechaMantencion" class="form-label">Fecha de Mantencion</label>
                        <input type="date" class="form-control text-bg-dark" id="fechaMantencion" name="fechaMantencion">
                    </div>















                </div>




                <div class="col-md-12 mb-3">
                    <label for="modelo" class="form-label">Modelo (Modelo del equipo)</label>
                    <input type="text" class="form-control text-bg-dark" id="modelo" name="modelo"
                        placeholder="Escriba el modelo del equipo">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="costo" class="form-label  ">Costo (CLP)</label>
                    <input type="number" class="form-control text-white text-bg-dark" id="costo" name="costo"
                        placeholder="Costo en pesos chilenos">
                </div>

                <div class="card-footer text-body-secondary text-end ">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>


            </div>
    </div>

    
    </form>
    
    </div>
    </div>
</main>