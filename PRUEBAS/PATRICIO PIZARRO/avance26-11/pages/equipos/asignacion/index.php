
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





        <div class="d-flex" id="wrapper">
            <div class="bg-white" id="sidebar-wrapper">
            <li class="nav-item row align-items-start">
                            <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home"><img class="p-0 m-3" src="logo-inventrack.png" alt="" width="240"></a>
                        </li>

    <div class="list-group list-group-flush my-3">
                    <a href="index.php?p=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-tachometer-alt me-2"></i>Inicio</a>
                    <a href="index.php?p=equipos/index" class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                            class="fas fa-project-diagram me-2"></i>Equipos</a>




                            
                    <a href="index.php?p=users/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fa-solid fa-user me-2"></i>Usuarios</a>
                    <a href="index.php?p=mantenedores/funcionarios/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fa-solid fa-people-group me-2"></i>Funcionarios</a>
                    <a href="index.php?p=mantenedores/index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fa-solid fa-bars-progress me-2"></i>Mantenedores</a>
                            
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-calendar me-2"></i>Calendario</a>
                            <a href="index.php?p=equipos/indexTickets" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fa-solid fa-bars-progress me-2"></i>Tickets</a>
                    <a href="pages/auth/actions/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Salir</a>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Asignación</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="index.php?p=auth/profile" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i> <?php echo $_SESSION['username'] ?? null ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Configuracion</a></li>
                                    <li><a class="dropdown-item" href="#">Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                


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
            <div class="card-body table-responsive"  id="bbbb">
                <table border = 1 cellpadding = 10 class="table table-hover tableAux" id="" >
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
            <div class="card-body table-responsive ">
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