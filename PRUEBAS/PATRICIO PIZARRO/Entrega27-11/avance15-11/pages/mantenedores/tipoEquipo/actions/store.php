<?php
    include("../../../../database/connection.php");

    $opcion = $_POST["opcion"];
    

    $query = "INSERT INTO tipo (tipo) VALUES ('$opcion');";
    $result =  mysqli_query($connection, $query);

  
    if ($result) {
        // Set a session variable to indicate successful deletion
        session_start();
        $_SESSION['addition_success'] = true;
    }




    header("Location: ../../../../index.php?p=mantenedores/tipoEquipo/index");
?>



