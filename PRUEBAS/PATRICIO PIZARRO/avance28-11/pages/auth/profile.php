<?php
    include("database/auth.php");
?>
<br><br>
<div class="container mx-5 text-white">
    <h1>Bienvenido(a), <?php echo $_SESSION['username']; ?>!</h1>
    <p class="fs-3">Comienza a navegar.</p>
    <img src="https://i.imgflip.com/6x7zre.jpg" alt="" width="200" class="rounded-circle me-2">
</div>