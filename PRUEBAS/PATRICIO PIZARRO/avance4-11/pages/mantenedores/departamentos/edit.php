<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM departamentos WHERE id=" . $id . ";";
$result =  mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $opcion = $row["departamento"];
    $id = $row["id"];
} else {
    header("Location: index.php?p=mantenedores/departamentos/index");
}
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Formulario de edición</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/departamento/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                    <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Nuevo nombre del departamento</label>
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
