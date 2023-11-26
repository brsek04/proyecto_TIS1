<?php
    include("../../../../database/connection.php");
    
    $funcionarioID = $_POST["funcionario"];
    
    $id= $_POST["equipo"];
    
    $query = "UPDATE equipos SET funcionario_id = '$funcionarioID' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/comunas/index");
?>  