<?php
    include("database/auth.php");
?>

<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/establecimientos/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Establecimientos</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" placeholder="Ingrese el nombre del establecimiento">
                    </div>

                    

                    

                </div>


                <div class="col-md-12 mb-3">
                        <label for="comuna" class="form-label">comuna</label>
                        <select class="form-control" id="comuna" name="comuna">
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
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>

  