<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM funcionarios WHERE id=" . $id . ";";
$result =  mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row["nombre"];
    $apellido= $row["apellido"];
    $email = $row["email"]; 
    $establecimientos = $row["establecimiento_id"];
    $departamentos = $row["departamento_id"];
    
    $id = $row["id"];
} else {
    header("Location: index.php?p=mantenedores/funcionarios/index");
}
?>

    <div class="card">
        <form action="pages/mantenedores/funcionarios/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                  

                   


                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                    </div>  
                    
                    <div class="col-md-12 mb-3">
                        <label for="departamentos" class="form-label">Departamentos</label>
                        <select class="form-control" id="departamentos" name="departamentos">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM departamentos");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $departamentos) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['departamento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    
                    <div class="col-md-12 mb-3">
                        <label for="establecimientos" class="form-label">Establecimientos</label>
                        <select class="form-control" id="establecimientos" name="establecimientos">
                            <option disabled>Selecciona una opción</option>
                            <?php
                            $sql = $connection->query("SELECT * FROM establecimientos");
                            while ($resultado = $sql->fetch_assoc()) {
                                $selected = ($resultado['id'] == $establecimientos) ? "selected" : "";
                                echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['establecimiento'] . "</option>";
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
</main>
<br>
<br>
<br>
<br>
<br>
<br>
