
<?php

$sesionid = isset($_SESSION['sesionid']) ? $_SESSION['sesionid'] : true;
unset($_SESSION['sesionid']);



if(isset($_SESSION["username"])){




require('database/connection.php');


$sesion = $_SESSION["username"];
$datos = mysqli_query($connection, "SELECT * from users where username = '$sesion'");

while($consulta = mysqli_fetch_array($datos)){
    $rol = $consulta['rol'];
}

if($rol=='funcionario'){
    

}


} 
?>







<!DOCTYPE html>
<html lang="es">

<head>
  <title>InvenTrack!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- COUNTER STRIKES -->
  <link rel="stylesheet"
    href="http://localhost/xampp/proyecto_TIS1/PRUEBAS/PATRICIO%20PIZARRO/avance_tarde/includes/estilos.css">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

  <!-- QR jv-->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <!-- Letras-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <!-- data tables -->
  <script>
    $(document).ready(function () {
      $(".dataTables").DataTable({
        "pageLength": 5,
        lengthMenu: [
          [5, 10, 25, 50],
          [5, 10, 25, 50]

        ],
        "language": {
          "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'

        }
      });
    });
  </script>

  <!-- data tables especifico-->
  <script>
    $(document).ready(function () {
      $("#dataTablesTickets").DataTable({
        "pageLength": 5,
        lengthMenu: [
          [5, 10, 25, 50],
          [5, 10, 25, 50]
        ],
        "language": {
          "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        "order": [[1, "desc"]] // Columna 1 (fecha) en orden descendente
      });
    });
  </script>


<script>
    $(document).ready(function () {
      $(".dataTablesScroll").DataTable({
        "pageLength": 5,
        lengthMenu: [
          [5, 10, 25, 50],
          [5, 10, 25, 50]
        ],
        "language": {
          "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        
        "scrollY": "300px", // ajusta el valor según sea necesario
        "scrollCollapse": true,
        "paging": false

      });
    });
  </script>


  <!--  graficos  -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>




  <!-- alertas -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- envio de emails -->

  <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>

  </script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"> </script>

  <!-- Interfaz -->

<body>




<?php
if(isset($_SESSION["username"])){

if($rol=='admin'){
    

 


  

?>


  <div class="offcanvas-start d-flex" id="wrapper">
    <div class="" id="sidebar-wrapper">
      <li class="nav-item row align-items-start">
        <a class="nav-link " aria-current="page"> 
        <img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
      </li>

      <div class="list-group list-group-flush my-3">
        <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="bi bi-house me-2"></i>Inicio</a>


        <!-- Dropdown menu links -->
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <button
              class=" btn dropdown-toggle btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold dropdown-toggle"
              data-bs-toggle="collapse" data-bs-target="#equipo-collapse" aria-expanded="false">
              <i class="bi bi-pc-display me-2"></i>Equipo
            </button>

            <div class="collapse " id="equipo-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    href="index.php?p=equipos/index"> <i class="bi bi-arrow-return-right me-1"></i>Todos los
                    equipos</a>
                </li>
                <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold "
                    href="index.php?p=equipos/equiposDisponibles"> <i class="bi bi-arrow-return-right me-1"></i>Equipos
                    disponibles</a></li>
                <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    href="index.php?p=equipos/equiposAsignados"> <i class="bi bi-arrow-return-right me-1"></i>Equipos
                    asignados</a></li>
                    <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    href="index.php?p=equipos/equiposPanel"> <i class="bi bi-arrow-return-right me-1"></i>Panel de Equipos</a></li>
              </ul>
            </div>
          </li>


          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button
                class="btn dropdown-toggle btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold"
                data-bs-toggle="collapse" data-bs-target="#funcionario-collapse" aria-expanded="false">
                <i class="bi bi-person me-2"></i>Funcionario
              </button>
              <div class="collapse" id="funcionario-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                      href="index.php?p=mantenedores/funcionarios/index"><i
                        class="bi bi-arrow-return-right me-1"></i>Todos los funcionarios</a></li>
                  <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                      href="index.php?p=mantenedores/funcionarios/funcionariosAsignados"><i
                        class="bi bi-arrow-return-right me-1"></i>Funcionarios asignados</a></li>
                        <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                      href="index.php?p=mantenedores/funcionarios/funcionariosPanel"><i
                        class="bi bi-arrow-return-right me-1"></i>Panel de funcionarios</a></li>
                </ul>
              </div>
            </li>


            <ul class="list-unstyled ps-0">
              <li class="mb-1">
                <button
                  class="btn dropdown-toggle btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold"
                  data-bs-toggle="collapse" data-bs-target="#asignacion-collapse" aria-expanded="false">
                  <i class="bi bi-person-fill-down me-2"></i> Asignación
                </button>
                <div class="collapse" id="asignacion-collapse" style="">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a
                        class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                        href="index.php?p=equipos/asignacion/index"><i
                          class="bi bi-arrow-return-right me-1"></i>Asignar</a></li>
                    <li><a
                        class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold"
                        href="index.php?p=mantenedores/funcionarios/EditarAsignacion"><i
                          class="bi bi-arrow-return-right me-1"></i>Editar</a></li>
                  </ul>
                </div>
              </li>

              <a href="index.php?p=equipos/historial"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="bi bi-pin-map me-2"></i>Trazabilidad</a>

              <a href="index.php?p=reportes/index"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Reportes</a>



              <a href="index.php?p=users/index"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fa-solid fa-user me-2"></i>Usuarios</a>

              <a href="index.php?p=mantenedores/index"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="bi bi-box me-2"></i>Mantenedores</a>

              <a href="index.php?p=calendario/index"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="bi bi-calendar-date me-2"></i>Calendario</a>

              <a href="index.php?p=equipos/indexTickets"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="bi bi-archive me-2"></i>Tickets</a>


              <br><br><br><br>
              <li class="border-top "></li>
              <a class=" list-group-item list-group-item-action bg-transparent nav-link second-text fw-bold"
                href="index.php?p=auth/profile" id="navbarDropdown" role="button" aria-expanded="false">
                <img src="https://i.imgflip.com/6x7zre.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                <?php echo $_SESSION['username'] ?? null ?>
              </a>

              <a href="pages/auth/actions/logout.php"
                class="list-group-item list-group-item-action bg-transparent text-danger fw-bold "><i
                  class="fas fa-power-off me-2"></i>Salir</a>

      </div>
    </div> 
    </head>


<?php
}
}


?>



<?php


if(isset($_SESSION["username"])){
if($rol=='funcionario'){

?>

<div class="offcanvas-start d-flex" id="wrapper">
    <div class="" id="sidebar-wrapper">
      <li class="nav-item row align-items-start">
        <a class="nav-link" aria-current="page"><img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
      </li>

      <div class="list-group list-group-flush my-3">
        <a href="index.php?p=funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="bi bi-house me-2"></i>Tus equipos</a>


        <!-- Dropdown menu links -->
        

         





              

          
              <a href="index.php?p=mantenedores/tickets/index"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="bi bi-archive me-2"></i>Tus tickets</a>


              <br><br><br><br>
              <li class="border-top "></li>
              <a class=" list-group-item list-group-item-action bg-transparent nav-link second-text fw-bold"
                href="index.php?p=auth/profile" id="navbarDropdown" role="button" aria-expanded="false">
                <img src="https://i.imgflip.com/6x7zre.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                <?php echo $_SESSION['username'] ?? null ?>
              </a>

              <a href="pages/auth/actions/logout.php"
                class="list-group-item list-group-item-action bg-transparent text-danger fw-bold "><i
                  class="fas fa-power-off me-2"></i>Salir</a>




      </div>
    </div> 
    </head>







<?php
}}
?>
    <div class="min-vh-100">
      



