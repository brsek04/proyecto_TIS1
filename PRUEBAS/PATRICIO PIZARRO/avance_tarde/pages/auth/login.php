<?php
    require('database/connection.php');
   

    if (isset($_POST['username'])) {
        
        $_SESSION['sesionsuccess'] = true;

        $_SESSION['sesionid'] = true;
      $username = $_POST["username"];
        $contrasena = $_POST["contrasena"];

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and contrasena='$contrasena'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }

        $user = mysqli_num_rows($result);
        
        if ($user > 0) {
            $row = mysqli_fetch_assoc($result);
        
            if ($row['rol'] == 'admin') {
                // Si el usuario es un admin, redirige a home
                $_SESSION['username'] = $username;
                echo "<script>window.location.href='index.php?p=home';</script>";
                exit();
            } else {
                // Si el usuario no es admin, redirige a funcionarios.index
                $_SESSION['username'] = $username;
                echo "<script>window.location.href='index.php?p=auth/profile';</script>";
                exit();
            }
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
                        <input type="password" name="contrasena" class="form-control text-bg-dark" placeholder="Ingresa tu contraseña"
                            required />
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary ">Entrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php
    } 
?>