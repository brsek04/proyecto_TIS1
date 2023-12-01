<?php
include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Agregar nuevo ticket</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <form action="pages/mantenedores/tickets/actions/store.php" method="POST">
                <div class="card-body">
                    <div class="row">

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

                        <?php
                        include("database/connection.php");

                        // Obtener el nombre del funcionario de la sesión
                        $nombreFuncionario = $_SESSION['username'];

                        // Consulta SQL para obtener el ID del funcionario basado en el nombre
                        $sql = $connection->query("SELECT id FROM funcionarios WHERE nombre = '$nombreFuncionario'");

                        // Verificar si se encontró un resultado
                        if ($sql->num_rows > 0) {
                            $resultado = $sql->fetch_assoc();
                            $idFuncionario = $resultado['id'];
                            echo "<input type='hidden' id='funcionario' name='funcionario' value='$idFuncionario'>";
                        } else {
                            // Si no se encuentra el funcionario, puedes asignar un valor predeterminado o manejarlo según tus necesidades
                            echo "<input type='hidden' id='funcionario' name='funcionario' value='valor_predeterminado'>";
                        }
                        ?>

                        <div class="col-md-12 mb-3">
                            <label for="comentario" class="form-label">Comentario</label>
                            <input type="text" class="form-control text-bg-dark" id="comentario" name="comentario"
                                placeholder="">
                        </div>

                        <input type="hidden" class="form-control" id="estado" name="estado" value="Enviado">

                    </div>
                </div>

                <div class="card-footer text-body-secondary text-end">
                    <button type="submit"
                        class="btn btn-sm text-white btn-outline-primary border border-light">Guardar</button>
                </div>
            </form>
        </div>
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