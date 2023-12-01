<?php
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

$query = "SELECT * From historialEquipos";
$result = mysqli_query($connection, $query);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Historial de equipos</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-center"></div>

                </div>
            </div>
            <div class="card-body table-responsive text-bg-dark">
                <table class="table table-hover table-dark table-striped tableAux dataTables table-borderless"
                    id="tablaEquipos">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($result)): ?>
                            <tr>
                                <th scope="row">
                                    <?= $fila['id'] ?>
                                </th>
                                <td>
                                    <?= $fila['trn_date'] ?>
                                </td>
                                <td>
                                    <?= $fila['descripcion'] ?>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>