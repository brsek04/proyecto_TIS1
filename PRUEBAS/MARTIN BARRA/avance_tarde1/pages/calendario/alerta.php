<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

<?php 
include("../../database/connection.php");

$id = $_GET['id'];

// Asumo que $id es el ID de la mantención
$query = "SELECT m.*, e.funcionario_id, e.id as idEquipo
          FROM mantenciones m 
          JOIN equipos e ON m.equipo_id = e.id 
          WHERE m.id = $id";

$result = mysqli_query($connection, $query);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $funcionario_id = $row['funcionario_id'];
    $fechaMantencion = $row['start_date'];
    $idEquipo = $row['idEquipo'];

    // Obtener información del funcionario
    $queryFuncionario = "SELECT * FROM funcionarios WHERE id = $funcionario_id";
    $resultFuncionario = mysqli_query($connection, $queryFuncionario);

    if ($resultFuncionario && $rowFuncionario = mysqli_fetch_assoc($resultFuncionario)) {
        $funcionario_nombre = $rowFuncionario['nombre'];
        $funcionario_email = $rowFuncionario['email'];

        // Construir la descripción del mensaje
        $descripcion2 = "$funcionario_nombre, recuerde mantenimiento equipo #$idEquipo - $fechaMantencion";

        // Imprimir los campos como inputs hidden
        echo '<input type="hidden" id="sendername" value="inventrack">';
        echo '<input type="hidden" id="to" value="' . $funcionario_email . '">';
        echo '<input type="hidden" id="subject" value="Mantenimiento de Equipo">';
        echo '<input type="hidden" id="replyto" value="">';
        echo '<input type="hidden" id="message" value="' . $descripcion2 . '">';

        session_start();
        $_SESSION['mantencion_success'] = true;

        } else {
            // Manejar el caso en que no se pueda obtener información del funcionario
            echo 'Error al obtener información del funcionario.';
        }
    } else {
        // Manejar el caso en que no se pueda obtener información de la mantención
        echo 'Error al obtener información de la mantención.';
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
            window.location.href = "../../index.php?p=calendario/index";
        })
        .catch(function (error) {
            console.error("Error sending the email: ", error);
            alert("Error sending the email. Check the console for more details.");
            window.location.href = "../../index.php?p=calendario/index";
        });
        
</script>