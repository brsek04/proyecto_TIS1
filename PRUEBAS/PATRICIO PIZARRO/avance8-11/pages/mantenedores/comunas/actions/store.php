<?php
    include("../../../../database/connection.php");

    $opcion = $_POST["opcion"];
    $region = $_POST["region"];
    

    $query = "INSERT INTO comunas (comuna, region_id) VALUES ('$opcion', '$region');";
    $result =  mysqli_query($connection, $query);

  




    header("Location: ../../../../index.php?p=mantenedores/comunas/index");
?>



