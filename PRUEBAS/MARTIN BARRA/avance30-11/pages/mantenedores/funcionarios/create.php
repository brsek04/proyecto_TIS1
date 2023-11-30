<?php
    include("database/auth.php");
?>


<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/funcionarios/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                <div class="col-md-12 mb-3">
                        <label for="opcion" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="opcion" name="opcion" placeholder="Ingrese el nombre del funcionario">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido del funcionario" >
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="abcde@xxxx.com" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="establecimiento" class="form-label">Establecimiento</label>
                        <select class="form-control" id="establecimiento" name="establecimiento">
                            <option select disabled> Seleccione una opcion</option>
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
                        <label for="departamento" class="form-label">Departamento</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <option select disabled> Seleccione una opcion</option>
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
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>

<!-- validacion email -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("email").addEventListener("input", function () {
            var emailInput = this.value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput)) {
                this.setCustomValidity("El email no es válido.");
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</main>

  