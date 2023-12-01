<?php
include("database/auth.php");
?>
<br><br>
<div class="container mx-5 text-white">
    <h1>Bienvenido(a),
        <?php echo $_SESSION['username']; ?>!
    </h1>
    <p class="fs-3">Comienza a navegar.</p>
    <img src="https://i.imgflip.com/6x7zre.jpg" alt="" width="200" class="rounded-circle me-2">
</div>

<?php
$username = $_SESSION["username"];
$queryPassword = "SELECT id, contrasena FROM users WHERE username = '$username'";
$resultPassword = mysqli_query($connection, $queryPassword);

if ($resultPassword) {
    $row = mysqli_fetch_assoc($resultPassword);
    $userPassword = $row['contrasena'];

    if ($userPassword == $username . "123") {

        $userId = $row['id'];

        // Redirige a la página de edición con el ID
        echo "<script>window.location.href='index.php?p=funcionarios/edit&id=$userId';</script>";
        exit();
    }
}

?>