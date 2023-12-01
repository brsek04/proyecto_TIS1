<?php
include("../../../../database/connection.php");

$id = $_GET["id"];

$query = "DELETE FROM memorias WHERE id=" . $id . ";";

$result = mysqli_query($connection, $query);

if ($result) {
    // Set a session variable to indicate successful deletion
    session_start();
    $_SESSION['deletion_success'] = true;
}


header("Location: ../../../../index.php?p=mantenedores/memorias/index");
?>