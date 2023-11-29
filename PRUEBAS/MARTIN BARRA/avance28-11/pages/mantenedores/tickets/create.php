<?php
    include("database/auth.php");
?>


<main class="container mt-5">
    <div class="card">
        <form action="pages/mantenedores/tickets/actions/store.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                

                <div class="col-md-12 mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo</label>
                        <select class="form-control" id="tipoEquipo" name="tipoEquipo">
                            <option disabled selected> Seleccione una opcion</option>
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
                        <label for="funcionario" class="form-label">Funcionario a cargo</label>
                       
                        <select class="form-control" id="funcionario" name="funcionario">
                            <option disabled selected> Seleccione una opcion</option>
                                <?php
                                    include("database/connection.php");
                                    $sql = $connection -> query ("SELECT  * FROM funcionarios");
                                    while($resultado = $sql -> fetch_assoc()){
                                        echo "<option value='".$resultado['id']."'>".$resultado['email']." </option>";
                                    }


                                ?>
                                </select>
                       
                    </div>




                    <div class="col-md-12 mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <input type="text" class="form-control" id="comentario" name="comentario" placeholder="">
                    </div>

                        <input type="hidden" class="form-control" id="estado" name="estado" value="enviado">
                    






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

  