<?php
include("database/connection.php");
include("database/auth.php");

$busquedaQR = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos, formaIngresos.formaIngreso AS formaIngresos
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
WHERE equipos.id = $busquedaQR
";
$result = mysqli_query($connection, $query);
?>




<?php while ($fila = mysqli_fetch_array($result)) : ?>


<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Reporte Equipo #<?= $fila['id'] ?></h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>Fecha de ingreso: <?= $fila['fechaIngreso'] ?> </h4>
            <br>
            <h4>Funcionario a cargo: <?= $fila['funcionario'] ?> </h4>
            <br>
            <h4>Modelo: <?= $fila['modelo'] ?> </h4>
            <br>
            <h4>Tipo de equipo: <?= $fila['nombreOpcion'] ?> </h4>
            <br>
            <h4>Marca: <?= $fila['marcas'] ?></h4>
            <br>
            <h4>Memoria: <?= $fila['memorias'] ?> GB</h4>
            <br>
            <h4>Almacenamiento: <?= $fila['almacenamientos'] ?> GB</h4>
            <br>
            <h4>Tipo de Almacenamiento: <?= $fila['tipoAlmacenamientos'] ?></h4>
            <br>
            <h4>Forma de Ingreso: <?= $fila['formaIngresos'] ?></h4>
            <br>
            <h4>Fecha de mantención: <?= $fila['fechaMantencion'] ?></h4>
            <br>
            <h4>Costo: <?php echo "$".$fila['costo'] ?></h4>
            <br>
        </div>
    </div>
</div>

                          
                            
        



<?php endwhile; ?>