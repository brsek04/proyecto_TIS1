<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM almacenamientos WHERE id=" . $id . ";";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $opcion = $row["almacenamiento"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=mantenedores/almacenamientos/index");
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Editar almacenamiento de equipo
        <?php echo $id ?>
    </h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <form action="pages/mantenedores/almacenamientos/actions/update.php" method="POST">
                <div class="card-body table-responsive text-bg-dark">
                    <div class="row">
                        <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                        <div class="col-md-12 mb-3">
                            <label for="opcion" class="form-label">Nueva capacidad</label>
                            <input type="text" class="form-control text-bg-dark" id="opcion" name="opcion"
                                value="<?php echo $opcion ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary text-end">
                    <button type="submit"
                        class="btn btn-sm text-white btn-outline-primary border border-light">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</main>