<?php
include("database/connection.php");
include("database/auth.php");

$id = $_GET["id"];

$query = "SELECT * FROM users WHERE id = " . $id . ";";
$result = mysqli_query($connection, $query);


if ($user = mysqli_fetch_assoc($result)) {
    $username = $user["username"];
    $email = $user["email"];
    $id = $user["id"];
} else {
    header("Location: index.php?p=brands/index");
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                    <h2 class="fs-2 mx-4 text-white">Editar usuario</h2>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

<main class="container mx-5">
<div class="row" id="contenedortabla">
    <div class="card text-bg-dark">
        <form action="pages/users/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                    <div class="col-md-12 mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" id="username" class="form-control text-bg-dark" name="username" value="<?php echo $username ?>" placeholder="username" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="origin" class="form-label">Correo electronico</label>
                        <input type="email" id="email" class="form-control text-bg-dark"  name="email" value="<?php echo $email ?>" required>
                    </div>

                    <!-- <div class="col-md-12 mb-3">
                        <label for="logo" class="form-label">Contraseña</label>
                        <input type="password" id="" class="form-control" name="password" value="">
                        <span class="text-muted">Complete este campo solo si desea cambiar la contraseña.</span>
                    </div> -->
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
    </div>
</main>