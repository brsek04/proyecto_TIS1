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


$query = "SELECT tickets.*, funcionarios.email AS funcionario, tipo.tipo AS tipo
FROM tickets
LEFT JOIN tipo ON tickets.tipo_id = tipo.id
LEFT JOIN funcionarios ON tickets.funcionario_id = funcionarios.id
ORDER BY tickets.fecha DESC;



";
$result = mysqli_query($connection, $query);
?>

<main class="container mt-5">


    <div class="card">
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
                        title: 'Solicitud enviada',
                        icon: 'success',
                        confirmButtonColor: '#28a745',
                        });
                        </script>
                    <?php endif; ?>
                </div>
                <div>              
                    <a class="btn btn-sm btn-success" href="index.php?p=mantenedores/tickets/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-hover " id="dataTablesTickets">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">fecha</th>
                        <th scope="col">tipo</th>
                        <th scope="col">comentario</th>
                        <th scope="col">estado</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['fecha'] ?></td>
                            <td><?= $fila['tipo'] ?></td>
                            <td><?= $fila['comentario'] ?></td>
                            <td><?= $fila['estado'] ?></td>
                           
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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