<?php
    include("../../../database/connection.php");

   
    $fechaIngreso = $_POST["fechaIngreso"];
    $tipoEquipo = $_POST["tipoEquipo"];
    $marcas = $_POST["marcas"];
    $memorias = $_POST["memorias"];
    $almacenamientos = $_POST["almacenamientos"];
    $tipoAlmacenamientos = $_POST["tipoAlmacenamientos"];
    $modelo = $_POST["modelo"];
    $costo= $_POST["costo"];

    $query = "INSERT INTO equipos (fechaIngreso, tipo_id, marca_id, memoria_id, almacenamiento_id, tipoAlmacenamiento_id, modelo,  costo) VALUES ('$fechaIngreso', '$tipoEquipo', '$marcas', '$memorias', '$almacenamientos', '$tipoAlmacenamientos', '$modelo',  '$costo');";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../index.php?p=equipos/index");
?>
