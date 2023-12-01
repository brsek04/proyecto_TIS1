<?php ob_start();
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;
unset($_SESSION['deletion_success']);

$additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
unset($_SESSION['addition_success']);


$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos, formaIngresos.formaIngreso AS formaIngresos
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
WHERE funcionarios.nombre != 'no asignado' OR funcionarios.nombre IS NULL;
";
$result = mysqli_query($connection, $query);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Equipos asignados</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<main class="container-xxl" id="aaaa">
    <div class="row" id="contenedortabla">
        <div class="col-12">
            <div class="card text-bg-dark">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-center">
                            <?php if ($deletionSuccess): ?>
                                <script>
                                    Swal.fire({
                                        title: 'Eliminación exitosa',
                                        icon: 'success',
                                        confirmButtonColor: '#28a745',
                                    });
                                </script>
                            <?php endif; ?>
                            <?php if ($additionSuccess): ?>
                                <script>
                                    Swal.fire({
                                        title: 'Registro exitoso',
                                        icon: 'success',
                                        confirmButtonColor: '#28a745',
                                    });
                                </script>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
                <div class="card-body table-responsive text-bg-dark" id="bbbb">
                    <table style="border: 1; cellpadding : 10;"
                        class="table table-hover table-dark table-striped table-hover tableAux dataTables table-borderless"
                        id="tablaEquipos">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha de ingreso</th>
                                <th scope="col">Funcionario</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Memoria</th>
                                <th scope="col">Almacenamiento</th>
                                <th scope="col">Tipo de <br>almacenamiento</th>
                                <th scope="col">Ingreso</th>
                                <th scope="col">Mantencion</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_array($result)): ?>
                                <tr>
                                    <th scope="row">
                                        <?= $fila['id'] ?>
                                    </th>
                                    <td>
                                        <?= $fila['fechaIngreso'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['funcionario'] ?>
                                    </td>

                                    <td>
                                        <?= $fila['modelo'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['nombreOpcion'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['marcas'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['memorias'] ?> GB
                                    </td>
                                    <td>
                                        <?= $fila['almacenamientos'] ?> GB
                                    </td>
                                    <td>
                                        <?= $fila['tipoAlmacenamientos'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['formaIngresos'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['fechaMantencion'] ?>
                                    </td>
                                    <td>
                                        <?php echo "$" . $fila['costo'] ?>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                            <a id="generarQr" data-id="<?php echo $fila['id'] ?>"
                                                class="btn btn-sm btn-outline-light">QR</a>

                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class=" modal-title fs-5 text-center"
                                                                id="exampleModalLabel">Qr para dispositivo </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" contenedor">
                                                                <div id="contenedorQR" class="contenedorQR"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>





<script>
    function borrar(id) {
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            confirmButtonColor: '#dc3545',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "pages/equipos/actions/delete.php?id=" + id;

            }
        });
    }

    const link = "http://localhost/xampp/proyecto_TIS1/PROYECTO/entrega_final/index.php?p=equipos/busquedaQR&id="

    // var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});

    $(document).on('click', '#generarQr', function () {

        const id = $(this).data('id');

        const contenedorQR = document.getElementById('contenedorQR');

        contenedorQR.innerHTML = "";

        const QR = new QRCode(contenedorQR);

        QR.makeCode(link + id);

        var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
        myModal.show();
    });
</script>