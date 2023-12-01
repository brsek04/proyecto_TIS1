<?php
include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Agregar funcionario</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5 ">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <form action="pages/mantenedores/funcionarios/actions/store.php" method="POST">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="opcion" class="form-label ">Nombre</label>
                            <input type="text" class="form-control text-bg-dark" id="opcion" name="opcion"
                                placeholder="Ingrese el nombre del funcionario">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Apellido</label>
                            <input type="text" class="form-control text-bg-dark" id="apellido" name="apellido"
                                placeholder="Ingrese el apellido del funcionario">
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Correo electronico (abcde@xxxx.com)</label>
                            <input type="email" class="form-control text-bg-dark" id="email" name="email"
                                placeholder="abcde@xxxx.com">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="establecimiento" class="form-label">Establecimiento</label>
                            <select class="form-control text-bg-dark" id="establecimiento" name="establecimiento">
                                <option select disabled> Seleccione una opcion</option>
                                <?php
                                include("database/connection.php");
                                $sql = $connection->query("SELECT * FROM establecimientos");
                                while ($resultado = $sql->fetch_assoc()) {
                                    echo "<option value='" . $resultado['id'] . "'>" . $resultado['establecimiento'] . " </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select class="form-control text-bg-dark" id="departamento" name="departamento">
                                <option select disabled> Seleccione una opcion</option>
                                <?php
                                include("database/connection.php");
                                $sql = $connection->query("SELECT * FROM departamentos");
                                while ($resultado = $sql->fetch_assoc()) {
                                    echo "<option value='" . $resultado['id'] . "'>" . $resultado['departamento'] . " </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-body-secondary text-end">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>

        <!-- validacion email -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("email").addEventListener("input", function () {
                    var emailInput = this.value;
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!emailRegex.test(emailInput)) {
                        this.setCustomValidity("El email no es válido.");
                    } else {
                        this.setCustomValidity("");
                    }
                });
            });
        </script>

</main>