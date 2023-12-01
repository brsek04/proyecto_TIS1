<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];
$comuna = $_POST["comuna"];


$query = "INSERT INTO establecimientos (establecimiento, comuna_id) VALUES ('$opcion', '$comuna');";
$result = mysqli_query($connection, $query);

if ($result) {
    // Set a session variable to indicate successful deletion
    session_start();
    $_SESSION['addition_success'] = true;
}




header("Location: ../../../../index.php?p=mantenedores/establecimientos/index");
?>