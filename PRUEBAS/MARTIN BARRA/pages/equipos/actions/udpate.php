<?php
    include("../../../database/connection.php");
    
    $origenName = $POST["origenName"];
    $fechaIngreso = $_POST["fechaIngreso"];
    $tipoEquipo= $_POST["tipoEquipo"];
    $modelo = $_POST["modelo"];
    $costo = $_POST["costo"];
    $id= $_POST["id"];
    
    $query = "UPDATE equipos SET fechaIngreso = '$fechaIngreso', tipoEquipo= '$tipoEquipo', modelo='$modelo' , personalize_id='$personalize_id', costo='$costo' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../index.php?p=equipos/index");
?>  