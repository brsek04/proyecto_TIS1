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
        <form action="pages/mantenedores/funcionarios/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">nombre</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" placeholder="notebook">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" >
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="establecimiento" class="form-label">establecimiento</label>
                        <select class="form-control" id="establecimiento" name="establecimiento">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM establecimientos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['establecimiento']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div> 

                    <div class="col-md-12 mb-3">
                        <label for="departamento" class="form-label">departamento</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <option select disabled> Seleccionar opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT * FROM departamentos");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['departamento']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>





                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    aaaaaaa
    <br>
    <br>
    <br>
    a
</main>

  