<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM users WHERE id=" . $id . ";";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $contrasena = $row["contrasena"];


    $id = $row["id"];
} else


?>
<div class="row" id="contenedortabla">
<div class="card text-bg-dark">
    <form action="pages/funcionarios/update.php" method="POST">
        <div class="card-body">
            <div class="row">
                <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                <div class="col-md-12 mb-3">
                    <label for="contrasena" class="form-label">Nueva Contraseña</label>
                    <input type="text" class="form-control" id="contrasena" name="contrasena"
                        value="<?php echo $contrasena ?>">
                </div>

            </div>
        </div>

        <div class="card-footer text-body-secondary text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
</div>
</main>