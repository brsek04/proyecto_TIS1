<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

<?php
include("../../../../database/connection.php");

$funcionario = $_POST["funcionario"];
$idEquipo = $_POST["equipo"];

$queryUpdate = "UPDATE equipos SET funcionario_id = '$funcionario' WHERE id = $idEquipo";
$resultUpdate = mysqli_query($connection, $queryUpdate);

// Check if the update was successful
if ($resultUpdate) {
    // Retrieve tipo_id from equipos
    $queryTipoEquipo = "SELECT tipo_id FROM equipos WHERE id = $idEquipo";
    $resultTipoEquipo = mysqli_query($connection, $queryTipoEquipo);

    // Check if the query was successful
    if ($resultTipoEquipo) {
        $rowTipoEquipo = mysqli_fetch_assoc($resultTipoEquipo);
        $tipo_id = $rowTipoEquipo['tipo_id'];

        // Retrieve the tipo from the tipo table
        $queryTipo = "SELECT tipo FROM tipo WHERE id = $tipo_id";
        $resultTipo = mysqli_query($connection, $queryTipo);

        // Check if the query was successful
        if ($resultTipo) {
            $rowTipo = mysqli_fetch_assoc($resultTipo);
            $tipo = $rowTipo['tipo'];

            $queryFuncionario = "SELECT nombre FROM funcionarios WHERE id = $funcionario";
            $resultFuncionario = mysqli_query($connection, $queryFuncionario);

            if ($resultFuncionario) {
                $funcionarioRow = mysqli_fetch_assoc($resultFuncionario);
                $nombreFuncionario = $funcionarioRow['nombre'];

                session_start();
                $_SESSION['addition_success'] = true;

                if ($resultUpdate) {
                    

                    $descripcion = "Se agregó el equipo $idEquipo al funcionario $nombreFuncionario";
                    $query2 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$idEquipo', '$funcionario', NOW())";
                    $result2 = mysqli_query($connection, $query2);

                    if ($result2) {
                        $descripcion2 = "Estimado $nombreFuncionario se le ha asignado el equipo #$idEquipo ";

                        $queryFuncionarioCorreo = "SELECT email FROM funcionarios WHERE id = $funcionario";
                        $resultFuncionarioCorreo = mysqli_query($connection, $queryFuncionarioCorreo);

                        if ($resultFuncionarioCorreo) {
                            $funcionarioRowCorreo = mysqli_fetch_assoc($resultFuncionarioCorreo);
                            $correoFuncionario = $funcionarioRowCorreo['email'];

                            echo '<input type="hidden" id="sendername" value="inventrack!">';
                            echo '<input type="hidden" id="to" value="' . $correoFuncionario . '">';
                            echo '<input type="hidden" id="subject" value="Asignación de equipo">';
                            echo '<input type="hidden" id="replyto" value="">';
                            echo '<input type="hidden" id="message" value="' . $descripcion2 . '">';

                            $estado = "asignado";
                            $queryUpdateTicket = "UPDATE tickets SET estado = '$estado' WHERE tipo_id = $tipo_id AND funcionario_id = $funcionario AND estado = 'enviado' LIMIT 1";
                            $result4 = mysqli_query($connection, $queryUpdateTicket);

                            // The rest of your code for the email sending goes here
                            // ...

                        } else {
                            echo "Error al obtener el correo del funcionario: " . mysqli_error($connection);
                        }
                    } else {
                        echo "Error en la inserción en la tabla 'historialEquipos': " . mysqli_error($connection);
                    }
                } else {
                    echo "Error en la inserción en la tabla 'equipos': " . mysqli_error($connection);
                }
            } else {
                echo "Error al obtener el nombre del funcionario: " . mysqli_error($connection);
            }
        } else {
            echo "Error al obtener el nombre del tipo de equipo: " . mysqli_error($connection);
        }
    } else {
        echo "Error al obtener el tipo_id del equipo: " . mysqli_error($connection);
    }
} else {
    echo "Error al actualizar funcionario_id en la tabla 'equipos': " . mysqli_error($connection);
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
                
                window.location.href = "../../../../index.php?p=equipos/asignacion/index";
            })
            .catch(function (error) {
                console.error("Error al enviar el correo: ", error);
                alert("Error al enviar el correo. Consulta la consola para más detalles.");
                window.location.href = "../../../../index.php?p=equipos/asignacion/index";
            });


    </script>