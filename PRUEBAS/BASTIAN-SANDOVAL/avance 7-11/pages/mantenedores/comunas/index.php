<?php
    include("database/connection.php");  // Incluye la conexión
    include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login


    $query = "SELECT comunas.*, regiones.region AS region 
FROM comunas

LEFT JOIN regiones ON comunas.region_id = regiones.id;
";



    
    $result = mysqli_query($connection, $query);
?>





<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">comunas</h1>
    </div>
</div>

<main class="container mt-5">


    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">

                </div>
                <div>              
                    <a class="btn btn-sm btn-primary" href="index.php?p=mantenedores/comunas/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">comuna</th>
                        <th scope="col">region</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            
                            <td><?= $fila['comuna'] ?></td>
                            <td><?= $fila['region'] ?></td>
                            <td>


                            
                                <a href="index.php?p=mantenedores/comunas/edit&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                <!-- la alerta-->
                                <a href="javascript:borrar(<?= $fila['id'] ?>);" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

 <!-- script alerta borrar-->
<script>
    function borrar (id){
        Swal.fire({
            title: '¿Seguro que deseas borrar?',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location="pages/mantenedores/comunas/actions/delete.php?id="+id;
   
  }
});
    }
    </script>



