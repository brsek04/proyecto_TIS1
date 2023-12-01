<?php
    include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                <h2 class="fs-2 mx-4 text-white">Agregar nuevo establecimiento</h2>
                
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

<main class="container mx-5">
<div class="row" id="contenedortabla"> 
    <div class="card text-bg-dark">
        <form action="pages/mantenedores/establecimientos/actions/store.php" method="POST">
            <div class="card-body table-responsive text-bg-dark">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label"> Nombre del establecimiento</label>
                        <input type="text" class="form-control text-bg-dark" id="opcion" name="opcion" placeholder="Ingrese el nombre del establecimiento">
                    </div>

                </div>

                <div class="col-md-12 mb-3">
                        <label for="comuna" class="form-label">Comuna a la que pertenece</label>
                        <select class="form-control text-bg-dark" id="comuna" name="comuna">
                            <option select disabled> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM comunas");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['comuna']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-sm text-white btn-outline-primary border border-light">Guardar</button>
            </div>
        </form>
    </div>
</div>
</main>

  