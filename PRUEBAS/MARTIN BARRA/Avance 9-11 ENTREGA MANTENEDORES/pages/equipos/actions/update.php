<?php
include("../../../database/connection.php");

$fechaIngreso = $_POST["fechaIngreso"];
$funcionario = $_POST["funcionario"];
$tipoEquipo = $_POST["tipoEquipo"];
$marcas = $_POST["marcas"];
$memorias = $_POST["memorias"];
$almacenamientos = $_POST["almacenamientos"];
$tipoAlmacenamientos = $_POST["tipoAlmacenamientos"];
$modelo = $_POST["modelo"];
$costo = $_POST["costo"];
$id = $_POST["id"];

$query = "UPDATE equipos SET fechaIngreso = '$fechaIngreso', tipo_id = '$tipoEquipo', modelo = '$modelo', 
costo = '$costo', marca_id = '$marcas', memoria_id = '$memorias', almacenamiento_id = '$almacenamientos', tipoAlmacenamiento_id = '$tipoAlmacenamientos', funcionario_id = '$funcionario' 
WHERE id = $id";

$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: ../../../index.php?p=equipos/index");
} else {
    echo "Error al actualizar el equipo: " . mysqli_error($connection);
}
?>
