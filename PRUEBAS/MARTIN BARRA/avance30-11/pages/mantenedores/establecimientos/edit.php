<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

// Consulta para obtener información del establecimiento
$queryEstablecimiento = "SELECT establecimientos.*, comunas.comuna 
                        FROM establecimientos 
                        LEFT JOIN comunas ON establecimientos.comuna_id = comunas.id
                        WHERE establecimientos.id=" . $id . ";";
$resultEstablecimiento = mysqli_query($connection, $queryEstablecimiento);

if ($rowEstablecimiento = mysqli_fetch_assoc($resultEstablecimiento)) {
    $opcion = $rowEstablecimiento["establecimiento"];
    $comunaNombre = $rowEstablecimiento["comuna"];
    $id = $rowEstablecimiento["id"];
} else {
    header("Location: index.php?p=mantenedores/establecimientos/index");
}
?>
    
<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/establecimientos/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                    <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Nuevo nombre del establecimiento</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" value="<?php echo $opcion ?>">
                    </div>


                    <label for="comuna" class="form-label">Elija comuna</label>
                    <select class="form-control text-bg-dark" id="comuna" name="comuna">
    <?php
    include("database/connection.php");
    $sql = $connection->query("SELECT  * FROM comunas");
    while ($resultado = $sql->fetch_assoc()) {
        $selected = ($resultado['comuna'] == $comunaNombre) ? 'selected' : '';
        echo "<option value='" . $resultado['id'] . "' $selected>" . $resultado['comuna'] . " </option>";
    }
    ?>
</select>

            </div>
            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
