<?php
include("database/connection.php");
include("database/auth.php");
include("pages/auth/denegaciones.php");


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

    <div class="Container-flex mx-5 justify-content-center" id="tablaEquipos">
        <div class="row ">
            <div class="col-12 p-3 mt-3">
                <ul class="list-group text-bg-dark">
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
                    <li class="list-group-item d-flex justify-content-between align-items-start text-bg-dark">
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
                </ul>
            </div>


            <div class="col-lg-6">

            </div>
        </div>
    </div>


    <?php

    $query2 = "SELECT * From historialEquipos where historialEquipos.equipo_id='$busquedaQR'";
    $result2 = mysqli_query($connection, $query2);
    ?>



    <h2 class="fs-2 mx-4 text-white">Historial de equipos</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>

    <main class="container mx-5">
        <div class="row">
            <div class="card text-bg-dark">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-center"></div>

                    </div>
                </div>
                <div class="card-body table-responsive text-bg-dark">
                    <table class="table table-hover table-dark table-striped tableAux  table-borderless"
                        id="contenedortabla">
                        <thead class="">
                            <tr>

                                <th scope="col">Fecha</th>
                                <th scope="col">Descripción</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila2 = mysqli_fetch_array($result2)): ?>
                                <tr>

                                    <td>
                                        <?= $fila2['trn_date'] ?>
                                    </td>
                                    <td>
                                        <?= $fila2['descripcion'] ?>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button id="generarPdf" class="btn btn-sm btn-primary">Generar PDF</button>






    <?php endwhile; ?>


    <script>
        $(document).ready(function () {
            document.getElementById('generarPdf').addEventListener('click', function () {
                // Obtener el contenido HTML de las tablas
                var contenidoTabla1 = document.getElementById('tablaEquipos').outerHTML;
                var contenidoTabla2 = document.getElementById('contenedortabla').outerHTML;

                // Crear un nuevo documento PDF
                var pdf = new jsPDF();

                // Agregar el contenido de la primera tabla
                pdf.text(10, 10, '');
                pdf.fromHTML(contenidoTabla1, 10, 15);

                // Agregar salto de página
                pdf.addPage();

                // Agregar el contenido de la segunda tabla
                pdf.text(10, 10, 'Historial de Equipo');
                pdf.fromHTML(contenidoTabla2, 10, 15);

                // Descargar el PDF
                pdf.save('reporteEquipo.pdf');
            });
        });
    </script>