<?php
    include("../../../database/connection.php");

    $opcion = $_POST["opcion"];
    

    $query = "INSERT INTO personalize (opcion) VALUES ('$opcion');";
    $result =  mysqli_query($connection, $query);

  




    header("Location: ../../../index.php?p=personalize/index");
?>



