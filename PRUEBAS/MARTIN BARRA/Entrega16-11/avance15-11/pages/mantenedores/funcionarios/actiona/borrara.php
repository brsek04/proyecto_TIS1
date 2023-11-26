<?php
    include("../../../../database/connection.php");
    
    $id = $_GET["id"];

    $query = "SELECT id FROM funcionarios WHERE nombre = 'no asignado'";

    // Ejecuta la consulta
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    $idFuncionario = $row['id'];



    
    
    $query2 = "UPDATE equipos SET funcionario_id = '$idFuncionario' WHERE id = ".$id.";";

    $result2 =  mysqli_query($connection, $query2);

    header("Location: ../../../../index.php?p=mantenedores/funcionarios/editarAsignacion");
?>  