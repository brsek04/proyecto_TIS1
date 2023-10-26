<?php
    include("../../../database/connection.php");

   
    $fechaIngreso = $_POST["fechaIngreso"];
    $tipoEquipo = $_POST["tipoEquipo"];
    $modelo = $_POST["modelo"];
    $costo= $_POST["costo"];

    $query = "INSERT INTO equipos (fechaIngreso, tipoEquipo, modelo,  costo) VALUES ('$fechaIngreso', '$tipoEquipo', '$modelo',  '$costo');";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../index.php?p=equipos/index");
?>

