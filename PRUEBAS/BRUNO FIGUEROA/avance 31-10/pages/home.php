<?php
// Descomentar linea 3 si es que se quiere usar la autenticación para esta página
// require("database/auth.php");
?>

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="logo-inventrack.png" alt="" width="400">
    <h1 class="display-5 fw-bold">Bienvenido <?php echo $_SESSION['username'] ?? null ?></h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sitio de pruebas de los mantenedores, basado en ejemplo entregado por Juanito.</p>
    </div>
</div>