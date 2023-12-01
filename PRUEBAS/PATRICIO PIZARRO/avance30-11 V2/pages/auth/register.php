<?php
require('database/connection.php'); 

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($connection, $username);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($connection, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($connection, $password);

    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Envía un correo de confirmación al correo proporcionado por el usuario
        $to = $email; // Usar la dirección de correo proporcionada por el usuario
        $subject = "Registro Exitoso";
        $message = "¡Te has registrado correctamente en nuestro sitio web!";

        // Envía el correo electrónico desde la dirección de correo del remitente (puedes personalizar esto)
        $headers = "From: ogsokor@gmail.com"; // Cambia esto al remitente que desees

        // Envía el correo electrónico
        mail($to, $subject, $message, $headers);

        echo "<br> <div class='form'><h3>Te has registrado correctamente!</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
    }
} else {
?>

<div class="contenedorprincipal ">
        <div class="container-fluid ">
            <div class="row m-5">

                <div id="contenedorizquierda" class="col-lg-6 text-bg-dark">
                    <img id="fotox" class=" mx-auto "
                        src="" alt="">

                </div>

                <div id="contenedorderecha" class="col-lg-6 text-bg-dark  ">
                    
                    <form name="registration" action="" method="post">
                            <div class="form-group mb-3 text-bg-dark">
                                <label for="username" class="form-label ">Usuario</label>
                                <input type="text" name="username" class="form-control text-bg-dark" id="username" required>
                            </div>
                            <div class="form-group mb-3 ">
                                <label for "email" class="form-label ">Correo</label>
                                <input type="email" name="email" class="form-control text-bg-dark" id="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control text-bg-dark" id="password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary ">Registrarse</button>
                            </div>
                        </form>
                    <span class="fs-5 text-white">Ya tienes una cuenta?</span>
                    <br>
                     <a href='index.php?p=auth/login'>Iniciar sesion</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>


<?php
}
?>



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
