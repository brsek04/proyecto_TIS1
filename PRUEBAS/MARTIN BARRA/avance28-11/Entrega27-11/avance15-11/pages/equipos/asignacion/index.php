
    <?php ob_start(); 

    include("database/connection.php");  // Incluye la conexión
    include("database/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;
    unset($_SESSION['deletion_success']);

    $additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
    unset($_SESSION['addition_success']);


    $query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos, formaIngresos.formaIngreso AS formaIngresos
    FROM equipos
    LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
    LEFT JOIN tipo ON equipos.tipo_id = tipo.id
    LEFT JOIN marcas ON equipos.marca_id = marcas.id
    LEFT JOIN memorias ON equipos.memoria_id = memorias.id
    LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
    LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
    LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
    WHERE funcionarios.nombre = 'no asignado';
    ;
    ";
    $result = mysqli_query($connection, $query);


    $query2 = "SELECT funcionarios.*, establecimientos.establecimiento AS establecimiento, departamentos.departamento AS departamento,
    GROUP_CONCAT(CONCAT(equipos.id, '-', tipo.tipo) SEPARATOR ', ') AS equipos_info
FROM funcionarios
LEFT JOIN establecimientos ON funcionarios.establecimiento_id = establecimientos.id
LEFT JOIN departamentos ON funcionarios.departamento_id = departamentos.id
LEFT JOIN equipos ON funcionarios.id = equipos.funcionario_id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
WHERE funcionarios.nombre != 'no asignado'
GROUP BY funcionarios.id;";


    $result2 = mysqli_query($connection, $query2);




    ?>

        <div class="container mt-5" id="aaaa">
        


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
                            title: 'Asignación exitosa',
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
            <div class="card-body table-responsive"  id="bbbb">
                <table border = 1 cellpadding = 10 class="table table-hover scrollDataTables" id="" >
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            
                            <!--<th scope="col">idmantenedor</th>-->
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($result)) : ?>
                            <tr>
                                <th scope="row"><?= $fila['id'] ?></th>
                                
                                
                            
                                <td><?= $fila['marcas'] . ',' . $fila['modelo'] . ', ' . $fila['nombreOpcion'] . ', ' . $fila['memorias'] . ', ' . $fila['almacenamientos'] ?> 
                                <button class="btn float-end btn-marcar-equipo" data-id="<?= $fila['id'] ?>">Marcar</button>
                                
                                
                                
                                
                                
                                
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            
            </div>
        
        </div>

        
                        </div>



    <br>



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
            <div class="card-body table-responsive scrollDataTables ">
                <table class="table table-hover">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            
                            <th scope="col">Correo electronico</th>
                            
                            <th scope="col">Departamento</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($result2)) : ?>
                            <tr>
                                <th scope="row"><?= $fila['id'] ?></th>
                                
                                <td><?= $fila['nombre'] ?></td>
                                
                                <td><?= $fila['email'] ?></td>
                                
                                <td><?= $fila['departamento'] ?>
                                <button class="btn float-end btn-marcar-funcionario" data-id="<?= $fila['id'] ?>">Marcar</button>
                                
                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>


            
                <br>
            </div>
            <br>
            <br>
            <br>
        </div>
    </main>
    <br>
    <br>




                            
    <div class="text-center">
        

        

    <button class="btn btn-danger" id="btnAsignar">Asignar</button>
    </div>
    <br>

    <br>    
    <br>
    <br>


    <script>
        function borrar (id){
            Swal.fire({
                title: '¿Seguro que deseas borrar?',
                showCancelButton: true,
                confirmButtonText: 'Si, borrar',
                confirmButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location="pages/equipos/actions/delete.php?id="+id;
                        
    }
    });
        }

    


        document.addEventListener('DOMContentLoaded', function () {
    const btnAsignar = document.getElementById('btnAsignar');

    btnAsignar.addEventListener('click', function () {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'pages/equipos/asignacion/action/update.php';

        // Obtener el equipo marcado actualmente
        const equipoMarcado = obtenerMarcado('.btn-marcar-equipo');
        if (equipoMarcado) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'equipo';
            input.value = equipoMarcado;
            form.appendChild(input);
        } else {
            console.error('Error: No se ha marcado ningún equipo.');
        }

        // Obtener el funcionario marcado actualmente
        const funcionarioMarcado = obtenerMarcado('.btn-marcar-funcionario');
        if (funcionarioMarcado) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'funcionario';
            input.value = funcionarioMarcado;
            form.appendChild(input);
        } else {
            console.error('Error: No se ha marcado ningún funcionario.');
        }

        // Agregar el formulario al documento y enviarlo
        document.body.appendChild(form);
        form.submit();
    });

    const obtenerMarcado = selector => {
        const botones = document.querySelectorAll(selector);

        for (const boton of botones) {
            if (boton.classList.contains('btn-success')) {
                return boton.getAttribute('data-id');
            }
        }

        return null; // Ningún botón está marcado
    };

    const botonesEquipos = document.querySelectorAll('.btn-marcar-equipo');
    const botonesFuncionarios = document.querySelectorAll('.btn-marcar-funcionario');

    botonesEquipos.forEach(boton => {
        boton.addEventListener('click', function () {
            marcarBoton(this, botonesEquipos);
        });
    });

    botonesFuncionarios.forEach(boton => {
        boton.addEventListener('click', function () {
            marcarBoton(this, botonesFuncionarios);
        });
    });

    function marcarBoton(boton, otrosBotones) {
        const id = boton.getAttribute('data-id');
        otrosBotones.forEach(b => b.classList.remove('btn-success')); // Desmarcar todos los demás botones
        boton.classList.toggle('btn-success');
        console.log('ID:', id);
    }
});
</script>