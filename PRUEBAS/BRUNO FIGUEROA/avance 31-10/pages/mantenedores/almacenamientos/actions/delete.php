<?php
     include("../../../../database/connection.php");

    $id = $_GET["id"];

    $query = "DELETE FROM almacenamientos WHERE id=".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=mantenedores/almacenamientos/index");
?>





