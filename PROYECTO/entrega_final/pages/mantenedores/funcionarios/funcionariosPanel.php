<?php
include("database/connection.php");  // Incluye la conexión
include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

$query = "SELECT funcionarios.*, establecimientos.establecimiento AS establecimiento, departamentos.departamento AS departamento
    FROM funcionarios
    LEFT JOIN establecimientos ON funcionarios.establecimiento_id = establecimientos.id
    LEFT JOIN departamentos ON funcionarios.departamento_id = departamentos.id
    where funcionarios.nombre != 'no asignado';
    ";

$result = mysqli_query($connection, $query);


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;

unset($_SESSION['deletion_success']);
$additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
unset($_SESSION['addition_success']);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Panel de funcionarios</h2>

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
                    <div>
                        <a class="btn btn-sm text-white btn-outline-success border border-light"
                            href="index.php?p=mantenedores/funcionarios/create" role="button">Agregar nuevo</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive text-bg-dark">
                <table class="table table-hover table-dark table-striped tableAux dataTables table-borderless">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo electronico</th>
                            <th scope="col">Establecimiento</th>
                            <th scope="col">Departamento</th>
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
                                    <?= $fila['nombre'] ?>
                                </td>
                                <td>
                                    <?= $fila['apellido'] ?>
                                </td>
                                <td>
                                    <?= $fila['email'] ?>
                                </td>
                                <td>
                                    <?= $fila['establecimiento'] ?>
                                </td>
                                <td>
                                    <?= $fila['departamento'] ?>
                                </td>
                                <td>
                                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                        <a href="index.php?p=mantenedores/funcionarios/edit&id=<?= $fila['id'] ?>"
                                            class="btn btn-sm text-white btn-outline-warning border border-light">Editar</a>
                                        <a href="javascript:borrar(<?= $fila['id'] ?>);"
                                            class="btn btn-sm text-white btn-outline-danger border border-light">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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
                window.location = "pages/mantenedores/funcionarios/actions/delete.php?id=" + id;

            }
        });
    }
</script>