<?php
require('database/connection.php');

if (isset($_POST['username'])) {

    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($connection, $username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection, $password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $user = mysqli_num_rows($result);

    if ($user == 1) {
        $_SESSION['username'] = $username;
        echo "<script>window.location.href='index.php?p=home';</script>"; // Redirect user to index.php
        exit();
    } else {
        echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
    }
} else {
    ?>
    <div class="container-flex ">
        <div class="row m-5">

            <div id="contenedorizquierda" class="col-lg-6 text-bg-dark">
                <img id="fotox" class=" mx-auto " src="" alt="">

            </div>

            <div id="contenedorderecha" class="col-lg-6 text-bg-dark  ">

                <form action="" method="post" name="login">
                    <div class="form-group mb-3">
                        <label for="username">Usuario</label>
                        <input type="text" name="username" class="form-control text-bg-dark" placeholder="Ingresa tu usuario" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control text-bg-dark" placeholder="Ingresa tu contraseña"
                            required />
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary ">Entrar</button>
                    </div>
                </form>

                <p class="text-center">¿No estás registrado aún? <br> <a href='index.php?p=auth/register'>Regístrate aquí</a></p>
            </div>
        </div>
    </div>
    <?php
}
?>