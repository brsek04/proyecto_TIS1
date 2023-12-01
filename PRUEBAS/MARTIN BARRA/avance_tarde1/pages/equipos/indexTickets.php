<?php ob_start(); 
include("database/connection.php");
include("database/auth.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$deletionSuccess = isset($_SESSION['deletion_success']) ? $_SESSION['deletion_success'] : false;
unset($_SESSION['deletion_success']);

$additionSuccess = isset($_SESSION['addition_success']) ? $_SESSION['addition_success'] : false;
unset($_SESSION['addition_success']);

$query = "SELECT tickets.*, funcionarios.email AS email, tipo.tipo AS tipo
FROM tickets
LEFT JOIN tipo ON tickets.tipo_id = tipo.id
LEFT JOIN funcionarios ON tickets.funcionario_id = funcionarios.id
ORDER BY tickets.fecha DESC";

$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-rbs5jfMz1DA5/yo2Dm/YBrZfuZ9foKTfvcDxpP1wq" crossorigin="anonymous">
    <title>Tu Página</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <h2 class="fs-2 mx-4 text-white">Tickets</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <main class="container mx-5">
        <div class="row" id="contenedortabla">
            <div class="card text-bg-dark">
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
                <div class="card-body table-responsive text-bg-dark">
                    <table class="table table-hover table-dark table-striped tableAux  table-borderless" id="dataTablesTickets">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_array($result)) : ?>
                                <tr>
                                    <th scope="row"><?= $fila['id'] ?></th>
                                    <td><?= $fila['fecha'] ?></td>
                                    <td><?= $fila['email'] ?></td>
                                    <td><?= $fila['tipo'] ?></td>
                                    <td data-bs-toggle="popover" data-bs-content="<?= htmlspecialchars($fila['comentario']) ?>">
                                        <?= strlen($fila['comentario']) > 50 ? htmlspecialchars(substr($fila['comentario'], 0, 50)) . '...' : htmlspecialchars($fila['comentario']) ?>
                                    </td>
                                    <td><?= $fila['estado'] ?></td>
                                    <td>
                                        <a href="index.php?p=equipos/ticketsAction/update&id=<?= $fila['id'] ?>" class="btn btn-sm text-white btn-outline-warning border border-light">Rechazar</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+WiNDi7fxj3m2aqA6bXykO+5l5E0e5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-EU3m5zQ02eAxZAeKM9XlFR7KaLsD7jsyPPFRfFsw5eVCgMBeRcXMIch5cjo5gZbY" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover',
                    html: true
                });
            });
        });
    </script>
</body>

</html>