<?php
    include("../../../../database/connection.php");
    
    $opcion = $_POST["opcion"];
    
    $id= $_POST["id"];
    
    $query = "UPDATE personalize SET opcion = '$opcion' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/tipoEquipo/index");
?>  