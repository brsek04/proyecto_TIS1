<?php
include('pages/auth/denegaciones.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/es.js"></script>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mantencionSuccess = isset($_SESSION['mantencion_success']) ? $_SESSION['mantencion_success'] : false;
unset($_SESSION['mantencion_success']);

?>

<?php if ($mantencionSuccess): ?>
    <script>
        Swal.fire({
            title: 'Correo enviado',
            icon: 'success',
            confirmButtonColor: '#28a745',
        });
    </script>
<?php endif; ?>


<h2 class="container col-lg-8 text-center ">
    Mantenciones
    <button id="generarPdf" class="btn btn-sm btn-outline-light text-center ">Generar PDF </button>
</h2>

<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-2 "></div>
        <div class="col-lg-8 ">
            <div id="calendar"></div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<?php
include("database/connection.php");
$fetch_event = mysqli_query($connection, "SELECT id, title, start_date, end_date FROM mantenciones");

?>

<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            events: [
                <?php
                while ($result = mysqli_fetch_array($fetch_event)) { ?>
                                {
                        title: '<?php echo $result['title']; ?>',
                        start: '<?php echo $result['start_date']; ?>',
                        end: '<?php echo $result['end_date']; ?>',
                        color: 'yellow',
                        textColor: 'black',
                        id: <?php echo $result['id']; ?>
                    },
                <?php } ?>
            ],
            editable: true,
            eventClick: function (event) {
                if (confirm("¿Desea enviar un correo de recordatorio?")) {
                    var id = event.id;
                    // Redirige a alerta.php con el parámetro id
                    window.location.href = "pages/calendario/alerta.php?id=" + id;
                }
            },
            locale: 'es',
            buttonText: {
                today: 'Hoy'
            }
        });


        document.getElementById('generarPdf').addEventListener('click', function () {
            var contenidoCalendario = document.getElementById('calendar');
            var pdf = new jsPDF();

            html2canvas(contenidoCalendario).then(function (canvas) {
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 10, 180, 150);
                pdf.save('calendarioMantenciones.pdf');
            });
        });
    });
</script>