<?php
include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Agregar nuevo Usuario</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <form action="pages/users/actions/store.php" method="POST">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control text-bg-dark" id="username" name="username"
                                placeholder="username" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="origin" class="form-label">Correo electronico (example@example.cl)</label>
                            <input type="email" class="form-control text-bg-dark" name="email" id="email"
                                placeholder="example@example.cl" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="logo" class="form-label">Contraseña</label>
                            <input type="password" class="form-control text-bg-dark" name="password" id="" required>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-body-secondary text-end">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</main>


<!-- validacion email -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("email").addEventListener("input", function () {
            var emailInput = this.value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput)) {
                this.setCustomValidity("El email no es válido.");
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>