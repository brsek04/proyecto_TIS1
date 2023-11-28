<!DOCTYPE html>
<html lang="es">

<head>
	<title>InvenTrack!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap  -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- COUNTER STRIKES -->
	<link rel="stylesheet" href="http://localhost/xampp/Entrega27-11/avance15-11/includes/estilos.css">	

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>	

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

	<!-- QR jv-->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    

<!-- data tables -->
<script>
$(document).ready(function(){
	$(".dataTables").DataTable({
		"pageLength":5,
		lengthMenu:[
		[5,10,25,50],
		[5,10,25,50]

		],
		"language":{
			"url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
			
		}	
	});
});
</script>

<!-- data tables especifico-->
<script>
$(document).ready(function(){
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


<!--  graficos  -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>




<!-- alertas -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- envio de emails -->
	
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

</script>


<!-- Interfaz -->

<div class="d-flex" id="wrapper">
        <div class="" id="sidebar-wrapper">
           <li class="nav-item row align-items-start">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
                    </li>

<div class="list-group list-group-flush my-3">
                <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Inicio</a>
               

        <!-- Dropdown menu links -->
        <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold "  data-bs-toggle="collapse" data-bs-target="#equipo-collapse" aria-expanded="false">
          Equipo 
        </button>
        <div class="collapse" id="equipo-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=equipos/index">Todos los equipos</a></li>
            <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=equipos/equiposDisponibles">Equipos disponibles</a></li>
            <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=equipos/equiposAsignados">Equipos asignados</a></li>
          </ul>
        </div>
      </li>
      

      
        
       <!-- <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary">
            Equipos
        </button>

        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            
            <span class="visually-hidden">Toggle Dropend</span>
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="index.php?p=equipos/index">Todos los equipos</a></li>
            <li><a class="dropdown-item" href="index.php?p=equipos/equiposDisponibles">Equipos disponibles</a></li>
            <li><a class="dropdown-item" href="index.php?p=equipos/equiposAsignados">Equipos asignados</a></li>

            
        </ul>
        </div>-->

        <!-- Dropdown menu links -->       

        <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse" data-bs-target="#funcionario-collapse" aria-expanded="false">
          Funcionario
        </button>
        <div class="collapse" id="funcionario-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=mantenedores/funcionarios/index">Todos los funcionarios</a></li>
        <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=mantenedores/funcionarios/funcionariosAsignados">Funcionarios asignados</a></li>
          </ul>
        </div>
      </li>
      

 <!--           <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary">
            Funcionarios
        </button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropend</span>
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="index.php?p=mantenedores/funcionarios/index">Todos los funcionarios</a></li>
            <li><a class="dropdown-item" href="index.php?p=mantenedores/funcionarios/funcionariosAsignados">Funcionarios asignados</a></li>

            
        </ul>
        </div>

 Dropdown menu links -->

 

 <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="collapse" data-bs-target="#asignacion-collapse" aria-expanded="false">
          Asignación
        </button>
        <div class="collapse" id="asignacion-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=equipos/asignacion/index">Asignar</a></li>
          <li><a class="dropdown-item list-group-item list-group-item-action bg-transparent second-text fw-bold" href="index.php?p=mantenedores/funcionarios/EditarAsignacion">Editar</a></li>
          </ul>
        </div>
      </li>
<!--
<div class="btn-group dropend">
  <button type="button" class="btn btn-secondary">
    Asignación
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropend</span>
  </button>
  <ul class="dropdown-menu">
  <li><a class="dropdown-item" href="index.php?p=equipos/asignacion/index">Asignar</a></li>
    <li><a class="dropdown-item" href="index.php?p=mantenedores/funcionarios/EditarAsignacion">Editar</a></li>

    
  </ul>
</div>-->


        

        

        


<a href="index.php?p=reportes/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Reportes</a>



                <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-user me-2"></i>Usuarios</a>
                
                <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-bars-progress me-2"></i>Mantenedores</a>
                        
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-calendar me-2"></i>Calendario</a>
                        <a href="index.php?p=equipos/indexTickets" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-bars-progress me-2"></i>Tickets</a>
                        <li class="border-top my-3"></li>
                <a href="pages/auth/actions/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Salir</a>
            </div>
 </div>




</head>

<body>
	<div class="min-vh-100">
		<?php require_once 'includes/navbar.php'; ?>