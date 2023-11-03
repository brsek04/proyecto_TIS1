<!DOCTYPE html>
<html lang="es">

<head>
	<title>Ejemplo de navegación</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap  -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- CSS --> 
	<link rel="stylesheet" href="http://localhost/xampp/PRUEBAS\BASTIAN-SANDOVAL\login\includes\edit.css">

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>	

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>


<!-- data tables -->
<script>
$(document).ready(function(){
	$("#tablaEquipos").DataTable({
		"pageLength":5,
		lengthMenu:[
		[5,10,25,50],
		[5,10,25,50]

		],
		"language":{
			"url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es_ES.json"
		}	
	});
});
</script>

<!-- alertas -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





</head>

<body>
	<div class="min-vh-100">
		<?php require_once 'includes/navbar.php'; ?>