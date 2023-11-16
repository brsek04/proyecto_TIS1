<?php
    include("../../../../database/connection.php");
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $departamentos = $_POST["departamentos"];
    $establecimientos = $_POST["establecimientos"];
    
    $id= $_POST["id"];
    
    $query = "UPDATE funcionarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', departamento_id = '$departamentos', establecimiento_id = '$establecimientos' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/funcionarios/index");
?>  