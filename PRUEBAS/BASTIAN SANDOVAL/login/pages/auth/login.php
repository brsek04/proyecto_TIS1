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
            header("Location: index.php?p=home"); // Redirect user to index.php
        } else {
            echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
        }
    } else {
        ?>
        <div class="container-fluid ps-md-0">
  <div class="row g-0">

      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="text-center login-heading mb-4">Inicia Sesión</h3>

              <form>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="Ingresa tu usuario">
                  <label for="floatingInput">Usuario</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Ingresa tu contraseña">
                  <label for="floatingPassword">Contraseña</label>
                </div>


                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Ingresar</button>
                
                </div>

                <p class="text-center">¿No estás registrado aún? <a href='index.php?p=auth/register'>Regístrate aquí</a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <?php
    } 
?>

