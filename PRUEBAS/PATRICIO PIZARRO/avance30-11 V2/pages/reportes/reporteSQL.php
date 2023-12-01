<?php
    
    include("database/connection.php");
?>


<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                
                    <h2 class="fs-2 mx-4 text-white">Creación de reporte</h2>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>


<main class="container mx-5">
<div class="row" id="contenedortabla"> 
    <div class="card text-bg-dark">
        <form action="pages/reportes/sqlpdf.php" method="POST">
            <div class="card-body table-responsive text-bg-dark">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" >
                    </div>

                  

<div class="col-md-12 mb-3">
    <label for="fechaTermino" class="form-label">Fecha Termino</label>
    <input type="date" class="form-control" id="fechaTermino" name="fechaTermino">
</div>



<div class="col-md-12 mb-3">
    <label class="form-check-label">Funcionario</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="funcionarioCheckbox" name="funcionarioCheckbox">
    </div>
</div>



<div class="col-md-12 mb-3">
    <label class="form-check-label">Tipo</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoCheckbox" name="tipoCheckbox">
    </div>
</div>

<div class="col-md-12 mb-3">
    <label class="form-check-label">Marca</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="marcaCheckbox" name="marcaCheckbox">
    </div>
</div>

<div class="col-md-12 mb-3">
    <label class="form-check-label">Forma de Ingreso</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="formaIngresoCheckbox" name="formaIngresoCheckbox">
    </div>
</div>



<div class="col-md-12 mb-3">
    <label class="form-check-label">Costo</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="costoCheckbox" name="costoCheckbox">
    </div>


</div>
</div>

            <div class="card-footer text-body-secondary text-end ">
                <button type="submit" class="btn btn-sm text-white btn-outline-primary border border-light">Generar Reporte</button>
            </div>
        </form>

                                    
    </div>
</div>

</main>


