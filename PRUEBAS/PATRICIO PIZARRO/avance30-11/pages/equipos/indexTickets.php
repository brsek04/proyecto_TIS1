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


$query = "SELECT tickets.*, funcionarios.email AS email, tipo.tipo AS tipo
FROM tickets
LEFT JOIN tipo ON tickets.tipo_id = tipo.id
LEFT JOIN funcionarios ON tickets.funcionario_id = funcionarios.id
ORDER BY tickets.fecha DESC;



";
$result = mysqli_query($connection, $query);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                    <h2 class="fs-2 mx-4 text-white">Tickets</h2>
                    
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
                    
                </div>
            </div>
        </div>
        <div class="card-body table-responsive text-bg-dark">
            <table class="table table-hover table-dark table-striped tableAux dataTables table-borderless">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opción</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['fecha'] ?></td>
                            <td><?= $fila['email'] ?></td>
                            <td><?= $fila['tipo'] ?></td>
                            <td><?= $fila['comentario'] ?></td>
                            <td><?= $fila['estado'] ?></td>
                            
                            <td>
                            <a href="index.php?p=equipos/ticketsAction/update&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Rechazar</a>

                            
                                
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
    function borrar (id){
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            confirmButtonColor: '#dc3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location="pages/mantenedores/tickets/actions/delete.php?id="+id;
                    
  }
});
    }
    </script>