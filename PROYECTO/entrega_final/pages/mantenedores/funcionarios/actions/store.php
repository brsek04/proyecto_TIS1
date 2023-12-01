<?php
include("../../../../database/connection.php");

$opcion = $_POST["opcion"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$establecimiento = $_POST["establecimiento"];
$departamento = $_POST["departamento"];
$opcion2 = $opcion;
$opcion3 = $opcion2 . "123";
$rol = "funcionario";
$email2 = $email;




$query = "INSERT INTO funcionarios (nombre, apellido, email, establecimiento_id, departamento_id) VALUES ('$opcion', '$apellido', '$email',  '$establecimiento', '$departamento' );";
$result1 = mysqli_query($connection, $query);




$query2 = "INSERT INTO users (username, contrasena, email, rol) VALUES ('$opcion2', '$opcion3', '$email2',  '$rol');";
$result = mysqli_query($connection, $query2);



if ($result) {
    // Set a session variable to indicate successful deletion
    session_start();
    $_SESSION['addition_success'] = true;
}




header("Location: ../../../../index.php?p=mantenedores/funcionarios/funcionariosPanel");
?>