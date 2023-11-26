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

    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

            <div class="list-group list-group-flush my-3">
                <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fa-solid fa-people-group me-2"></i>Funcionarios</a>
                <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-bars-progress me-2"></i>Mantenedores</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-calendar me-2"></i>Calendario</a>
                <a href="pages/auth/actions/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Salir</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Tus tickets</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="index.php?p=auth/profile" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> <?php echo $_SESSION['username'] ?? null ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuracion</a></li>
                                <li><a class="dropdown-item" href="#">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


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
            <table class="table table-hover">
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
                            <td>


                            
                                
                            </td>
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