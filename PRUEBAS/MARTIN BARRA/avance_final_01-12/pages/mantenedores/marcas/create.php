<?php
include("database/auth.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    <h2 class="fs-2 mx-4 text-white">Agregar nueva marca de equipo</h2>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<main class="container mx-5">
    <div class="row" id="contenedortabla">
        <div class="card text-bg-dark">
            <form action="pages/mantenedores/marcas/actions/store.php" method="POST">
                <div class="card-body table-responsive text-bg-dark ">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="opcion" class="form-label">Marca de equipo</label>
                            <input type="text" class="form-control text-bg-dark" id="opcion" name="opcion"
                                placeholder="LG, Olidata, HP ...">
                        </div>
                    </div>
                </div>

                <div class="card-footer text-body-secondary text-end">
                    <button type="submit"
                        class="btn btn-sm text-white btn-outline-primary border border-light">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</main>