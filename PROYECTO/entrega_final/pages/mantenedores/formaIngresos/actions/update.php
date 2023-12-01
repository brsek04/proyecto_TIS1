<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];

$id = $_POST["id"];

$query = "UPDATE formaIngresos SET formaIngreso = '$opcion' WHERE id = " . $id . ";";

$result = mysqli_query($connection, $query);

header("Location: ../../../../index.php?p=mantenedores/formaIngresos/index");
?>