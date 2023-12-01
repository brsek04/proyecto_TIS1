<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];
$comuna = $_POST["comuna"];
$id = $_POST["id"];

$query = "UPDATE establecimientos SET establecimiento = '$opcion', comuna_id = $comuna WHERE id = " . $id . ";";

$result = mysqli_query($connection, $query);

header("Location: ../../../../index.php?p=mantenedores/establecimientos/index");
?>