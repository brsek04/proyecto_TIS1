<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM funcionarios WHERE id=" . $id . ";";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $email = $row["email"];
    $establecimientos = $row["establecimiento_id"];
    $departamentos = $row["departamento_id"];

    $id = $row["id"];
} else {
    header("Location: index.php?p=mantenedores/funcionarios/index");
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Editar funcionario</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="card mx-5 text-bg-dark">
    <div class="row" id="contenedortabla">
        <form action="pages/mantenedores/funcionarios/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control text-bg-dark" id="nombre" name="nombre"
                            value="<?php echo $nombre ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control text-bg-dark" id="apellido" name="apellido"
                            value="<?php echo $apellido ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control text-bg-dark" id="email" name="email"
                            value="<?php echo $email ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="departamentos" class="form-label">Departamentos</label>
                        <select class="form-control text-bg-dark" id="departamentos" name="departamentos">
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
                        <select class="form-control text-bg-dark" id="establecimientos" name="establecimientos">
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
                <button type="submit"
                    class="btn btn-sm text-white btn-outline-primary border border-light">Guardar</button>
            </div>
    </div>
    </form>
</div>
</main>