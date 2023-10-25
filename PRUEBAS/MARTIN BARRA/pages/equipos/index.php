<?php
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

$query = "SELECT marcas.*, personalize.opcion AS nombreOpcion
FROM marcas
LEFT JOIN personalize ON marcas.origen = personalize.id;
";
$result = mysqli_query($connection, $query);
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Listado Equipos</h1>
    </div>
</div>

<main class="container mt-5">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center"></div>
                <div>
                    <a class="btn btn-sm btn-primary" href="index.php?p=equipos/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">fecha ingreso</th>
                        <th scope="col">idMantenedor1</th>
                        <th scope="col">modelo</th>
                        <th scope="col">tipo</th>
                        <th scope="col">marca</th>
                        <th scope="col">memoria</th>
                        <th scope="col">almacenamiento</th>
                        <th scope="col">tipoA</th>
                        <th scope="col">costo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['nombre'] ?></td>
                            <td><?= $fila['origen'] ?></td>
                            <td><?= $fila['logo'] ?></td>
                            <td><?= $fila['nombreOpcion'] ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="index.php?p=equipos/edit&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                <a href="pages/equipos/actions/delete.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
