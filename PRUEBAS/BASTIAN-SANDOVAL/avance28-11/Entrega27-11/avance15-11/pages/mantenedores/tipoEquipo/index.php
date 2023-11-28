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

   
            <main class="container mt-5">
    <div class="card">
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
                    <a class="btn btn-sm btn-primary" href="index.php?p=mantenedores/tipoEquipo/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-hover">
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
                                <a href="index.php?p=mantenedores/tipoEquipo/edit&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                <!-- la alerta-->
                                <a href="javascript:borrar(<?= $fila['id'] ?>);" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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



