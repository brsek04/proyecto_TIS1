<?php
    include("database/auth.php");
?>

<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/regiones/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">regiones</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" placeholder="PC fijo, Notebooks ...">
                    </div>

                    

                    

                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>

  