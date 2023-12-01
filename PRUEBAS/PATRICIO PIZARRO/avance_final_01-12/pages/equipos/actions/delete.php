<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<?php
include("../../../database/connection.php");

$id = $_GET["id"];

// Obtain the name of the equipment you are going to delete and the ID of the associated funcionario
$queryNombreEquipo = "SELECT equipos.*, tipo.tipo, funcionarios.id AS funcionario_id, funcionarios.nombre AS funcionario_nombre, funcionarios.email AS funcionario_email FROM equipos
                     INNER JOIN tipo ON equipos.tipo_id = tipo.id
                     INNER JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
                     WHERE equipos.id = $id";

$resultNombreEquipo = mysqli_query($connection, $queryNombreEquipo);

if ($resultNombreEquipo) {
    $equipoData = mysqli_fetch_assoc($resultNombreEquipo);
    $nombreTipoEquipo = $equipoData['tipo'];
    $funcionario_id = $equipoData['funcionario_id'];
    $funcionario_nombre = $equipoData['funcionario_nombre'];
    $funcionario_email = $equipoData['funcionario_email'];

    // Delete the equipment from the "equipos" table
    $query = "DELETE FROM equipos WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Insert into the "historialEquipos" table with equipo_id and funcionario_id
        $descripcion = "Se eliminó el equipo # $id - $nombreTipoEquipo";
        $query2 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$id', '$funcionario_id', NOW())";
        $result2 = mysqli_query($connection, $query2);

        session_start();
        $_SESSION['deletion_success'] = true;


        if ($result2) {
            // Both operations were successful
            $descripcion2 = "Estimado $funcionario_nombre, se le eliminó el equipo $id - $nombreTipoEquipo";
            echo '<input type="hidden" id="sendername" value="inventrack!">';
            echo '<input type="hidden" id="to" value="' . $funcionario_email . '">';
            echo '<input type="hidden" id="subject" value="Eliminación de equipo">';
            echo '<input type="hidden" id="replyto" value="">';
            echo '<input type="hidden" id="message" value="' . $descripcion2 . '">';

            // Rest of the code here...

        } else {
            // Error in the insertion into the "historialEquipos" table
            echo "Error in the insertion into the 'historialEquipos' table: " . mysqli_error($connection);
        }
    } else {
        // Error deleting the equipment
        echo "Error deleting the equipment: " . mysqli_error($connection);
    }
} else {
    // Error getting the name of the equipment or the ID of the funcionario
    echo "Error getting the name of the equipment or the ID of the funcionario: " . mysqli_error($connection);
}
?>

<script>
    (function () {
        emailjs.init("8EKVR49iuRwyr7KCb");
    })();

    var sendername = document.querySelector("#sendername").value;
    var to = document.querySelector("#to").value;
    var subject = document.querySelector("#subject").value;
    var replyto = document.querySelector("#replyto").value;
    var message = document.querySelector("#message").value;
    var serviceID = "service_0jocw7d";
    var templateID = "template_58o7f6d";

    emailjs
        .send(serviceID, templateID, { sendername, to, subject, replyto, message })
        .then(function (response) {
            window.location.href = "../../../index.php?p=equipos/equiposPanel";
        })
        .catch(function (error) {
            console.error("Error sending the email: ", error);
            alert("Error sending the email. Check the console for more details.");
            window.location.href = "../../../index.php?p=equipos/equiposPanel";
        });
</script>