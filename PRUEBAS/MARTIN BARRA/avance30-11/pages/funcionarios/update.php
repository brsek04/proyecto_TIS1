<?php
    include("../../database/connection.php");
    
    $contrasena = $_POST["contrasena"];
    
    $id= $_POST["id"];
    
    $query = "UPDATE users SET contrasena = '$contrasena' WHERE id = ".$id.";";



    $result =  mysqli_query($connection, $query);

    if ($result) {
        // Set a session variable to indicate successful deletion
        session_start();
        $_SESSION['addition_success'] = true;
    }

    header("Location: ../../index.php?p=funcionarios/index");
?>  