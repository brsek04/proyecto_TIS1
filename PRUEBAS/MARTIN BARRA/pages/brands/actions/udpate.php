<?php
    include("../../../database/connection.php");
    
    $personalize_id = $POST["personalize_id"];
    $nombre = $_POST["nombre"];
    $origen= $_POST["origen"];
    $logo = $_POST["logo"];
    $id= $_POST["id"];
    
    $query = "UPDATE marcas SET nombre = '$nombre', origen= '$origen', logo='$logo' , personalize_id='$personalize_id' WHERE id = ".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../index.php?p=brands/index");
?>  