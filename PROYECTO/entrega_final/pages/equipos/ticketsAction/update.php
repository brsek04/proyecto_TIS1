<?php
include("database/connection.php");

$estado = "Rechazado";

$id = $_GET["id"];

$query = "UPDATE tickets SET estado = '$estado' WHERE id = " . $id . ";";

$result = mysqli_query($connection, $query);

echo "<script>window.location.href='index.php?p=equipos/indexTickets';</script>";
?>