<?php
    include("../../../../database/connection.php");
    
    $opcion = $_POST["opcion"];
    
    $id= $_POST["id"];
    
    $query = "UPDATE tipoAlmacenamientos SET tipoAlmacenamiento = '$opcion' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/tipoAlmacenamientos/index");
?>  