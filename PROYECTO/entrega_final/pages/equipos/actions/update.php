<?php
include("../../../database/connection.php");

$fechaIngreso = $_POST["fechaIngreso"];
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

// Obtener el nombre del tipo de equipo
$queryTipo = "SELECT tipo FROM tipo WHERE id = '$tipoEquipo'";
$resultTipo = mysqli_query($connection, $queryTipo);
$tipoData = mysqli_fetch_assoc($resultTipo);
$nombreTipoEquipo = $tipoData['tipo'];

$query = "UPDATE equipos SET fechaIngreso = '$fechaIngreso', tipo_id = '$tipoEquipo', modelo = '$modelo', 
costo = '$costo', marca_id = '$marcas', memoria_id = '$memorias', almacenamiento_id = '$almacenamientos', tipoAlmacenamiento_id = '$tipoAlmacenamientos', 
formaIngreso_id = '$formaIngreso', fechaMantencion = '$fechaMantencion'
WHERE id = $id";

$result = mysqli_query($connection, $query);

$query2 = "UPDATE mantenciones SET start_date = '$fechaMantencion', end_date = '$$fechaMantencion'
WHERE equipo_id = $id";

$result2 = mysqli_query($connection, $query2);

if ($result2) {
    $descripcion = "Se modificó el equipo # $id - $nombreTipoEquipo";
    $query3 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$id', '$funcionario_id', NOW())";
    $result3 = mysqli_query($connection, $query3);

    header("Location: ../../../index.php?p=equipos/equiposPanel");
} else {
    echo "Error al actualizar el equipo: " . mysqli_error($connection);
}
?>