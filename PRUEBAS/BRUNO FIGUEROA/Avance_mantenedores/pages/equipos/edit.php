<?php
    include("database/connection.php");
    include("database/auth.php");

    $id = $_GET["id"];

    $query = "SELECT * FROM equipos WHERE id=" . $id . ";";
    $result =  mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $fechaIngreso = $row["fechaIngreso"];
        $tipoEquipo = $row["tipoEquipo"];
        $modelo = $row["modelo"];
        $id = $row["id"];
        
    } else {
        header("Location: index.php?p=equipos/index");
    }
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Formulario de edición</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="pages/equipos/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">fecha ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso"  value="<?php echo $fechaIngreso ?>" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">tipo</label>
                        <select class="form-control" id="tipoEquipo" name="tipoEquipo">
                            <option select disabled> seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM personalize");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['opcion']." ></option>";
                                    }


                                ?>
                                </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="modelo" class="form-label">modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $modelo ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="costo" class="form-label">costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" value="<?php echo $costo ?>">
                    </div>                 


                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>