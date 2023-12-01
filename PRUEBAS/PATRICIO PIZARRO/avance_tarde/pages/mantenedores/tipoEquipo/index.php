<?php
    include("database/connection.php");  // Incluye la conexión
    include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
   
    $deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;
    
    
    unset($_SESSION['deletion_success']);


    $additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
    unset($_SESSION['addition_success']);

    $query = "SELECT * FROM tipo";
    $result = mysqli_query($connection, $query);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                <h2 class="fs-2 mx-4 text-white">Tipos de equipos</h2>
                
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        Swal.fire("Eliminacion exitosa");
                        </script>
                    <?php endif; ?>
                    <?php if ($additionSuccess): ?>
                        <script>
                        Swal.fire("Registro exitoso");
                        </script>
                    <?php endif; ?>
                </div>
                <div>              
                    <a class="btn btn-sm text-white btn-outline-success border border-light" href="index.php?p=mantenedores/tipoEquipo/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive text-bg-dark ">
            <table class="table table-hover table-dark table-striped tableAux dataTables table-borderless">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipos</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['tipo'] ?></td>
                            <td>
                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                <a href="index.php?p=mantenedores/tipoEquipo/edit&id=<?= $fila['id'] ?>" class="btn btn-sm text-white btn-outline-warning border border-light">Editar</a>
                                <!-- la alerta-->
                                <a href="javascript:borrar(<?= $fila['id'] ?>);" class="btn btn-sm text-white btn-outline-danger border border-light">Eliminar</a>
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

<!-- script alerta borrar-->
<script>
    function borrar(id) {
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "pages/mantenedores/tipoEquipo/actions/delete.php?id=" + id;
            }
        });
    }
</script>



