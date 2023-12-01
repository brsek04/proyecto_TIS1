<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];
$region = $_POST["region"];


$query = "INSERT INTO comunas (comuna, region_id) VALUES ('$opcion', '$region');";
$result = mysqli_query($connection, $query);


if ($result) {
    // Set a session variable to indicate successful deletion
    session_start();
    $_SESSION['addition_success'] = true;
}



header("Location: ../../../../index.php?p=mantenedores/comunas/index");
?>