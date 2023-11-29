<?php
    include("database/connection.php");
    
    $estado = "rechazado";
    
    $id= $_GET["id"];
    
    $query = "UPDATE tickets SET estado = '$estado' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: index.php?p=equipos/indexTickets");
?>  