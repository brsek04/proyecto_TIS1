<?php
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

$query = "SELECT equipos.*, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos
FROM equipos
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id;
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
                        <th scope="col">Fecha ingreso</th>
                        <!--<th scope="col">idmantenedor</th>-->
                        <th scope="col">Modelo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Memoria</th>
                        <th scope="col">Almacenamiento</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['fechaIngreso'] ?></td>
                            <!-- Aqui iba el tipo equipo que esta en el sticky notes-->
                            <td><?= $fila['modelo'] ?></td>
                            <td><?=$fila['nombreOpcion'] ?></td>
                            <td><?=$fila['marcas'] ?></td>
                            <td><?=$fila['memorias'] ?></td>
                            <td><?=$fila['almacenamientos'] ?></td>
                            <td><?=$fila['tipoAlmacenamientos'] ?></td>
                            <td><?php echo "$".$fila['costo'] ?></td>
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
