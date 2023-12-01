<?php
require('database/connection.php');

$sesionsuccess = isset($_SESSION['sesionsuccess']) ? $_SESSION['sesionsuccess'] : false;
unset($_SESSION['sesionsuccess']);



if($sesionsuccess){


$sesion = $_SESSION["username"];
$datos = mysqli_query($connection, "SELECT * from users where username = '$sesion'");

while($consulta = mysqli_fetch_array($datos)){
    $rol = $consulta['rol'];
}

if($rol=='funcionario'){
    
 echo '<script>alert("no eres admin, eres funcionario, no tienes permiso");
 location.href = "index.php?p=funcionarios/index";
 </script>';

} }
?>