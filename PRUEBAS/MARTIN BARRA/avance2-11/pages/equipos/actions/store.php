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

// Primero, obtén el nombre del tipo de equipo
$queryTipoEquipo = "SELECT tipo.tipo FROM tipo WHERE tipo.id = $tipoEquipo";
$resultTipoEquipo = mysqli_query($connection, $queryTipoEquipo);

if ($resultTipoEquipo) {
    $tipoEquipoRow = mysqli_fetch_assoc($resultTipoEquipo);
    $nombreTipoEquipo = $tipoEquipoRow['tipo'];

    // Ahora, obtén el nombre del funcionario
    $queryFuncionario = "SELECT nombre FROM funcionarios WHERE id = $funcionario";
    $resultFuncionario = mysqli_query($connection, $queryFuncionario);

    if ($resultFuncionario) {
        $funcionarioRow = mysqli_fetch_assoc($resultFuncionario);
        $nombreFuncionario = $funcionarioRow['nombre'];

        // Inserta en la tabla "equipos"
        $query = "INSERT INTO equipos (fechaIngreso, funcionario_id, tipo_id, marca_id, memoria_id, almacenamiento_id, tipoAlmacenamiento_id, modelo, costo) VALUES ('$fechaIngreso', '$funcionario', '$tipoEquipo', '$marcas', '$memorias', '$almacenamientos', '$tipoAlmacenamientos', '$modelo', '$costo')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $idEquipo = mysqli_insert_id($connection);
            
            // Inserta en la tabla "historialEquipos" con la fecha actual en "trn_date"
            $descripcion = "Se agregó el equipo $idEquipo al funcionario $nombreFuncionario";
            $query2 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$idEquipo', '$funcionario', NOW())";
            $result2 = mysqli_query($connection, $query2);

            if ($result2) {
                // Ambas inserciones fueron exitosas
                header("Location: ../../../index.php?p=equipos/index");
            } else {
                // Error en la inserción en la tabla "historialEquipos"
                echo "Error en la inserción en la tabla 'historialEquipos': " . mysqli_error($connection);
            }
        } else {
            // Error en la inserción en la tabla "equipos"
            echo "Error en la inserción en la tabla 'equipos': " . mysqli_error($connection);
        }
    } else {
        // Error al obtener el nombre del funcionario
        echo "Error al obtener el nombre del funcionario: " . mysqli_error($connection);
    }
} else {
    // Error al obtener el nombre del tipo de equipo
    echo "Error al obtener el nombre del tipo de equipo: " . mysqli_error($connection);
}
?>
