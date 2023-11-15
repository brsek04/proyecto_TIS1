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


$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos 
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id;
";
$result = mysqli_query($connection, $query);
?>

<main class="container mt-5">
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-1" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

<div class="list-group list-group-flush my-3">
                <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Equipos</a>
                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0">Equipos</h2>
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
            
<main class="container mt-5" id="aaaa">

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
                    <a class="btn btn-sm btn-primary" href="index.php?p=equipos/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive"  id="bbbb">
            <table border = 1 cellpadding = 10 class="table table-hover tableAux" id="tablaEquipos" >
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Funcionario</th>
                        <!--<th scope="col">idmantenedor</th>-->
                        <th scope="col">Modelo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Memoria</th>
                        <th scope="col">Almacenamiento</th>
                        <th scope="col">Tipo de almacenamiento</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['fechaIngreso'] ?></td>
                            <td><?=$fila['funcionario'] ?></td>
                            <!-- Aqui iba el tipo equipo que esta en el sticky notes-->
                            <td><?= $fila['modelo'] ?></td>
                            <td><?=$fila['nombreOpcion'] ?></td>
                            <td><?=$fila['marcas'] ?></td>
                            <td><?=$fila['memorias'] ?> GB</td>
                            <td><?=$fila['almacenamientos'] ?> GB</td>
                            <td><?=$fila['tipoAlmacenamientos'] ?></td>
                            <td><?php echo "$".$fila['costo'] ?></td>
                            <td>
                                <a href="index.php?p=equipos/edit&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                <a href="javascript:borrar(<?= $fila['id'] ?>);" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                <a href="index.php?p=equipos/busquedaQR&id=<?= $fila['id'] ?>">QR</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<button id="download">descargar pdf </button>

<script>
    document.getElementById('download').addEventListener('click', function () {
        // Agregar un parámetro a la URL para indicar la descarga del PDF
        window.location.href = 'index.php?p=equipos/index&download_pdf=true';
    });
</script>



<a class="btn btn-sm btn-primary" href="index.php?p=equipos/historial" role="button">historial de cambios de equipo</a>
<br>

<a class="btn btn-sm btn-primary" href="index.php?p=equipos/aaaa" role="button">graficos</a>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>



<script>
    function borrar (id){
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location="pages/equipos/actions/delete.php?id="+id;
                    
  }
});
    }
    </script>


<?php
    if (isset($_GET['download_pdf'])) {
    require 'TCPDF-main/TCPDF-main/tcpdf.php';
    
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

    $pdf->SetTitle('Equipos');
    $pdf->AddPage();
    $pdf->SetFont('helvetica','',24);
    $pdf->writeHTML('
        <h1>hola</h1>
    ');

    ob_end_clean(); 
    $pdf->OutPut('tablaEquipos.pdf', 'D');
                        exit;
    }

?>