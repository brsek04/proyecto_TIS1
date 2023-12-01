<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];

$id = $_POST["id"];

$query = "UPDATE regiones SET region = '$opcion' WHERE id = " . $id . ";";

$result = mysqli_query($connection, $query);

header("Location: ../../../../index.php?p=mantenedores/regiones/index");
?>