<?php
     include("../../../../database/connection.php");

    $id = $_GET["id"];

    $query = "DELETE FROM regiones WHERE id=".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/regiones/index");
?>





