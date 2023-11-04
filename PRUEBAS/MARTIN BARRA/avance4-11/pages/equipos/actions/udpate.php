<?php
include("../../../database/connection.php");

$fechaIngreso = $_POST["fechaIngreso"];
$tipoEquipo = $_POST["tipoEquipo"]; // Cambiar a "tipoEquipo"
$modelo = $_POST["modelo"];
$costo = $_POST["costo"];
$id = $_POST["id"];

$query = "UPDATE equipos SET fechaIngreso = '$fechaIngreso', tipo_id = '$tipoEquipo', modelo = '$modelo', costo = '$costo' WHERE id = $id";

$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: ../../../index.php?p=equipos/index");
} else {
    echo "Error al actualizar el equipo: " . mysqli_error($connection);
}
?>
