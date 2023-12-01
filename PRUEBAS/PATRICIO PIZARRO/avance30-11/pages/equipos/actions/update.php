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
$formaIngreso = $_POST["formaIngresos"];
$fechaMantencion = $_POST["fechaMantencion"];
$id = $_POST["id"];

$query = "UPDATE equipos SET fechaIngreso = '$fechaIngreso', tipo_id = '$tipoEquipo', modelo = '$modelo', 
costo = '$costo', marca_id = '$marcas', memoria_id = '$memorias', almacenamiento_id = '$almacenamientos', tipoAlmacenamiento_id = '$tipoAlmacenamientos', 
funcionario_id = '$funcionario', formaIngreso_id = '$formaIngreso', fechaMantencion = '$fechaMantencion'
WHERE id = $id";

$result = mysqli_query($connection, $query);

$query2 = "UPDATE mantenciones SET start_date = '$fechaMantencion', end_date = '$$fechaMantencion'
WHERE equipo_id = $id";

$result2 = mysqli_query($connection, $query2);

if ($result2) {
    header("Location: ../../../index.php?p=equipos/index");
} else {
    echo "Error al actualizar el equipo: " . mysqli_error($connection);
}
?>
