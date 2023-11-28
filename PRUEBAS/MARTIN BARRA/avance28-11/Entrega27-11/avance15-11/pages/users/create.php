<?php
    include("database/auth.php");
?>

<main class="container mt-5">
    <div class="card">
        <form action="pages/users/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="origin" class="form-label">Correo electronico</label>
                        <input type="email"  class="form-control" name="email" id="email" placeholder="example@example.cl" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="logo" class="form-label">Contraseña</label>
                        <input type="password"  class="form-control" name="password" id="" required>
                    </div>

                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
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