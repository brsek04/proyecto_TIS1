<?php
    include("../../../../database/connection.php");

    $opcion = $_POST["opcion"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $establecimiento = $_POST["establecimiento"];
    $departamento = $_POST["departamento"];
    

    $query = "INSERT INTO funcionarios (nombre, apellido, email, establecimiento_id, departamento_id) VALUES ('$opcion', '$apellido', '$email',  '$establecimiento', '$departamento' );";
    $result =  mysqli_query($connection, $query);

  




    header("Location: ../../../../index.php?p=mantenedores/funcionarios/index");
?>



