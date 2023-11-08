<?php
    include("../../../../database/connection.php");

    $opcion = $_POST["opcion"];
    $comuna = $_POST["comuna"];
    

    $query = "INSERT INTO establecimientos (establecimiento, comuna_id) VALUES ('$opcion', '$comuna');";
    $result =  mysqli_query($connection, $query);

  




    header("Location: ../../../../index.php?p=mantenedores/establecimientos/index");
?>



