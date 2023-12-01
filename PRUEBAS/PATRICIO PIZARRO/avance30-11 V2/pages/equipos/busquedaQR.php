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


<?php while ($fila = mysqli_fetch_array($result)): ?>

    <div class="Container-flex mx-5 justify-content-center">
        <div class="row ">
            <div class="col-12 p-3 mt-3">
                <ol class="list-group list-group-numbered text-bg-dark">
                    <li class="list-group text-center fs-3 ">Reporte Equipo #
                        <?= $fila['id'] ?>
                    </li>
                    <li class="list-group-item d-flex text-bg-dark justify-content-between align-items-start ">
                        <div class="ms-1 me-auto ">
                            <div class="fw-bold">Fecha de ingreso:</div>
                            <?= $fila['fechaIngreso'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex text-bg-dark justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Funcionario a cargo:</div>
                            <?= $fila['funcionario'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Modelo:</div>
                            <?= $fila['modelo'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Tipo de equipo:</div>
                            <?= $fila['nombreOpcion'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Marca:</div>
                            <?= $fila['marcas'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Memoria:</div>
                            <?= $fila['memorias'] ?> GB
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Almacenamiento:</div>
                            <?= $fila['almacenamientos'] ?> GB
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Tipo de Almacenamiento:</div>
                            <?= $fila['tipoAlmacenamientos'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Forma de Ingreso:</div>
                            <?= $fila['formaIngresos'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark" >
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Fecha de mantención:</div>
                            <?= $fila['fechaMantencion'] ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Costo:</div>
                            <?php echo "$" . $fila['costo'] ?>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>

<?php endwhile; ?>