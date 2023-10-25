<?php
    include("../../../database/connection.php");

    $personalize_id = $_POST["personalize_id"];
    $nombre = $_POST["nombre"];
    $origen = $_POST["origen"];
    $logo = $_POST["logo"];

    $query = "INSERT INTO marcas (nombre, origen, logo, personalize_id) VALUES ('$nombre', '$origen', '$logo', '$personalize_id');";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../index.php?p=equipos/index");
?>

