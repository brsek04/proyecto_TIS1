<?php
    include("database/connection.php");
    include("database/auth.php");

    $id = $_GET["id"];

    $query = "SELECT * FROM marcas WHERE id=" . $id . ";";
    $result =  mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
       
        $opcion = $row["opcion"];
       
        $id = $row["id"];
    } else {
        header("Location: index.php?p=mantenedores/marcas/index");
    }
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Formulario de edición</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/marcas/actions/update.php" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">

                   

                    <div class="col-md-12 mb-3">


                        <label for="origin" class="form-label">marcas equipo</label>
                        <select class="form-control" id="opcion" name="opcion">
                           
                        </select>
                    </div>

                    
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>