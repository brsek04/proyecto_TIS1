<?php
    
    include("../../database/connection.php");
?>

  
<main class="container mt-5">
    <div class="card">
        <form action="sqlpdf.php" method="POST">
            <div class="card-body">
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
    <label class="form-check-label">Modelo</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="modeloCheckbox" name="modeloCheckbox">
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
    <label class="form-check-label">Memoria</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="memoriaCheckbox" name="memoriaCheckbox">
    </div>
</div>
<div class="col-md-12 mb-3">
    <label class="form-check-label">Almacenamiento</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="almacenamientoCheckbox" name="almacenamientoCheckbox">
    </div>
</div>
<div class="col-md-12 mb-3">
    <label class="form-check-label">Tipo Almacenamieto</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoAlmacenamientoCheckbox" name="tipoAlmacenamientoCheckbox">
    </div>
</div>


<div class="col-md-12 mb-3">
    <label class="form-check-label">Costo</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="costoCheckbox" name="costoCheckbox">
    </div>
</div>





                          


</div>
</div>












            <div class="card-footer text-body-secondary text-end ">
                <button type="submit" class="btn btn-success">Generar Reporte</button>
            </div>
        </form>
        <br>
        <br>
        <br>
        <br>
        
        <br>
                                    
    </div>

</main>


