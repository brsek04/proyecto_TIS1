
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/es.js"></script>



  <h2><center>Mantenciones</center></h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                
            </div>
            <div class="col-lg-8">
            <div id="calendar"></div>
            </div>

            <div class="col-lg-2">

            </div>
        </div>
    </div>


  




<?php 
include("database/connection.php");  
$fetch_event = mysqli_query($connection, "select * from mantenciones");
?>
<script>
   $(document).ready(function() {
   $('#calendar').fullCalendar({
       events:[
       <?php
       while($result = mysqli_fetch_array($fetch_event))
       { ?>
      {
          title: '<?php echo $result['title']; ?>',
          start: '<?php echo $result['start_date']; ?>',
          end: '<?php echo $result['end_date']; ?>',
          color: 'yellow',
          textColor: 'black'
       },
    <?php } ?>
       ],
       locale: 'es',
       buttonText: {
           today: 'Hoy' // Cambia el texto del botón "today" a "Hoy"
       }
});
});
</script>