<?php
    include("database/connection.php");  // Incluye la conexión
    include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

    $query = "SELECT funcionarios.*, establecimientos.establecimiento AS establecimiento, departamentos.departamento AS departamento,
    GROUP_CONCAT(CONCAT(equipos.id, '-', tipo.tipo) SEPARATOR ', ') AS equipos_info
FROM funcionarios
LEFT JOIN establecimientos ON funcionarios.establecimiento_id = establecimientos.id
LEFT JOIN departamentos ON funcionarios.departamento_id = departamentos.id
LEFT JOIN equipos ON funcionarios.id = equipos.funcionario_id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
WHERE funcionarios.nombre != 'no asignado'
GROUP BY funcionarios.id
HAVING equipos_info IS NOT NULL AND equipos_info != ''



;";
    

    $result = mysqli_query($connection, $query);


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
   
    $deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;
    
    unset($_SESSION['deletion_success']);
    $additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
    unset($_SESSION['addition_success']);

?>

<main class="container mt-5">


    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">
                <?php if ($deletionSuccess): ?>
                        <script>
                        Swal.fire({
                        title: 'Eliminación exitosa',
                        icon: 'success',
                        confirmButtonColor: '#28a745', 
                        });
                        </script>
                    <?php endif; ?>
                    <?php if ($additionSuccess): ?>
                        <script>
                        Swal.fire({
                        title: 'Registro exitoso',
                        icon: 'success',
                        confirmButtonColor: '#28a745',
                        });
                        </script>
                    <?php endif; ?>
                </div>
                <div>              

                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        
                        <th scope="col">Correo electronico</th>
                        
                        <th scope="col">Departamento</th>

                        <th scope="col">Info de equipo</th>
                        <th scope="col">Acción</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            
                            <td><?= $fila['nombre'] ?></td>
                            
                            <td><?= $fila['email'] ?></td>
                            <td><?= $fila['departamento'] ?></td>
                          
                            <td><?= $fila['equipos_info'] ?>

                    </td>
                    <td>


                          

                            
                                        <?php
                                            $equipos = explode(', ', $fila['equipos_info']);
                                            foreach ($equipos as $equipo) {
                                                list($id, $tipo) = explode('-', $equipo);
                                                echo '<a href="javascript:borrar(' . $id . ');" class="btn btn-sm btn-outline-danger">quitar #' . $id . '</a><br>';
                                            }
                                        ?>
                                        
                                      

                                        </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</main>


<script>
    function borrar (id){
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            confirmButtonColor: '#dc3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location="pages/mantenedores/funcionarios/actiona/borrara.php?id="+id;
                    
  }
});
    }
    </script>