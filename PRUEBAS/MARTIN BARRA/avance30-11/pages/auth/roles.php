<?php
require('database/connection.php');
session_start();

$sesion = $_SESSION["username"];
$datos = mysqli_query($connection, "SELECT * from users where username = '$username'");

while($consulta = mysqli_fetch_array($datos)){
    $rol = $consulta 
}

if($rol=='admin'){
    


}
?>