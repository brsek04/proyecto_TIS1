<?php
    include("database/auth.php");
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Formulario de registro</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="pages/equipos/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="fechaIngreso" class="form-label">Fecha ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" >
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="funcionario" class="form-label">funcionarios</label>
                        <select class="form-control" id="funcionario" name="funcionario">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT  * FROM funcionarios");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['nombre']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>



                


                    <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo</label>
                        <select class="form-control" id="tipoEquipo" name="tipoEquipo">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM tipo");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['tipo']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="marcas" class="form-label">marca</label>
                        <select class="form-control" id="marcas" name="marcas">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM marcas");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['marca']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                               


                    <div class="col-md-12 mb-3">
                        <label for="memorias" class="form-label">memoria</label>
                        <select class="form-control" id="memorias" name="memorias">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM memorias");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['memoria']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          
                    
                    <div class="col-md-12 mb-3">
                        <label for="almacenamientos" class="form-label">almacenamiento</label>
                        <select class="form-control" id="almacenamientos" name="almacenamientos">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM almacenamientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['almacenamiento']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          



                    <div class="col-md-12 mb-3">
                        <label for="tipoAlmacenamientos" class="form-label">tipoAlmacenamiento</label>
                        <select class="form-control" id="tipoAlmacenamientos" name="tipoAlmacenamientos">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM tipoAlmacenamientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['tipoAlmacenamiento']." </option>";
                                    }


                                ?>
                                </select>

                    </div>
                          














                       
                    </div>           



                   
                    <div class="col-md-12 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" placeholder="">
                    </div>




                </div>
            </div>

            <div class="card-footer text-body-secondary text-end ">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <br>
        <br>
        <br>
        <br>
        sd
        <br>
                                    
    </div>

</main>