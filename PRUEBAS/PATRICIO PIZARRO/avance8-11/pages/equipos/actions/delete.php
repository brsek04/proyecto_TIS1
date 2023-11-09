<?php
include("../../../database/connection.php");

$id = $_GET["id"];

// Obtén el nombre del equipo que vas a eliminar y el ID del funcionario asociado
$queryNombreEquipo = "SELECT equipos.*, tipo.tipo, funcionarios.id AS funcionario_id FROM equipos
                     INNER JOIN tipo ON equipos.tipo_id = tipo.id
                     INNER JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
                     WHERE equipos.id = $id";

$resultNombreEquipo = mysqli_query($connection, $queryNombreEquipo);

if ($resultNombreEquipo) {
    $equipoData = mysqli_fetch_assoc($resultNombreEquipo);
    $nombreTipoEquipo = $equipoData['tipo'];
    $funcionario_id = $equipoData['funcionario_id'];

    // Elimina el equipo de la tabla "equipos"
    $query = "DELETE FROM equipos WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Inserta en la tabla "historialEquipos" con equipo_id y funcionario_id
        $descripcion = "Se eliminó el equipo $id - $nombreTipoEquipo";
        $query2 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$id', '$funcionario_id', NOW())";
        $result2 = mysqli_query($connection, $query2);

        if ($result2) {
            // Ambas operaciones fueron exitosas
            header("Location: ../../../index.php?p=equipos/index");
        } else {
            // Error en la inserción en la tabla "historialEquipos"
            echo "Error en la inserción en la tabla 'historialEquipos': " . mysqli_error($connection);
        }
    } else {
        // Error al eliminar el equipo
        echo "Error al eliminar el equipo: " . mysqli_error($connection);
    }
} else {
    // Error al obtener el nombre del equipo o el ID del funcionario
    echo "Error al obtener el nombre del equipo o el ID del funcionario: " . mysqli_error($connection);
}

?>
