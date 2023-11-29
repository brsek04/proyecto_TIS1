<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM tipoAlmacenamientos WHERE id=" . $id . ";";
$result =  mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $opcion = $row["tipoAlmacenamiento"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=mantenedores/tipoAlmacenamiento/index");
}
?>

<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/tipoAlmacenamientos/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                    <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Nuevo nombre del Tipo de Equipo</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" value="<?php echo $opcion ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
