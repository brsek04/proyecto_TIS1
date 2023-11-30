<?php
    include("../../../../database/connection.php");

    $opcion = $_POST["opcion"];
    

    $query = "INSERT INTO memorias (memoria) VALUES ('$opcion');";
    $result =  mysqli_query($connection, $query);

  




    header("Location: ../../../../index.php?p=mantenedores/memorias/index");
?>



