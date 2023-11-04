<?php
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

$query = "SELECT * From historialEquipos";
$result = mysqli_query($connection, $query);
?>



<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Historial Equipos</h1>
    </div>
</div>

<main class="container mt-5">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center"></div>
            
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="tablaEquipos">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['trn_date'] ?></td>
                            <td><?= $fila['descripcion'] ?></td>
                           
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
