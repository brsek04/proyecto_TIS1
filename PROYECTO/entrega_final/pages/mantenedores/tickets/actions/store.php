<?php
include("../../../../database/connection.php");

$tipo = $_POST["tipoEquipo"];
$funcionario = $_POST["funcionario"];
$comentario = $_POST["comentario"];
$estado = $_POST["estado"];



$query = "INSERT INTO tickets (tipo_id, fecha ,funcionario_id, comentario, estado) VALUES ('$tipo', NOW(),$funcionario, '$comentario', '$estado');";
$result = mysqli_query($connection, $query);

if ($result) {
    // Set a session variable to indicate successful deletion
    session_start();
    $_SESSION['addition_success'] = true;
}




header("Location: ../../../../index.php?p=mantenedores/tickets/index");
?>