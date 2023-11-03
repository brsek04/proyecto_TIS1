<?php
    include("../../../../database/connection.php");
    
    $opcion = $_POST["opcion"];
    
    $id= $_POST["id"];
    
    $query = "UPDATE funcionarios SET departamento = '$opcion' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/departamentos/index");
?>  