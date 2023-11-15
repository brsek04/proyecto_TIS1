<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

<?php
include("../../../database/connection.php");

$fechaIngreso = $_POST["fechaIngreso"];
$funcionario = $_POST["funcionario"];
$tipoEquipo = $_POST["tipoEquipo"];
$marcas = $_POST["marcas"];
$memorias = $_POST["memorias"];
$almacenamientos = $_POST["almacenamientos"];
$tipoAlmacenamientos = $_POST["tipoAlmacenamientos"];
$modelo = $_POST["modelo"];
$costo = $_POST["costo"];


$queryTipoEquipo = "SELECT tipo.tipo FROM tipo WHERE tipo.id = $tipoEquipo";
$resultTipoEquipo = mysqli_query($connection, $queryTipoEquipo);

if ($resultTipoEquipo) {
    $tipoEquipoRow = mysqli_fetch_assoc($resultTipoEquipo);
    $nombreTipoEquipo = $tipoEquipoRow['tipo'];

   
    $queryFuncionario = "SELECT nombre FROM funcionarios WHERE id = $funcionario";
    $resultFuncionario = mysqli_query($connection, $queryFuncionario);

    if ($resultFuncionario) {
        $funcionarioRow = mysqli_fetch_assoc($resultFuncionario);
        $nombreFuncionario = $funcionarioRow['nombre'];

        
        $query = "INSERT INTO equipos (fechaIngreso, funcionario_id, tipo_id, marca_id, memoria_id, almacenamiento_id, tipoAlmacenamiento_id, modelo, costo) VALUES ('$fechaIngreso', '$funcionario', '$tipoEquipo', '$marcas', '$memorias', '$almacenamientos', '$tipoAlmacenamientos', '$modelo', '$costo')";
        $result = mysqli_query($connection, $query);

        session_start();
        $_SESSION['addition_success'] = true;

        if ($result) {
            $idEquipo = mysqli_insert_id($connection);

            
            $descripcion = "Se agregó el equipo $idEquipo al funcionario $nombreFuncionario";
            $query2 = "INSERT INTO historialEquipos (descripcion, equipo_id, funcionario_id, trn_date) VALUES ('$descripcion', '$idEquipo', '$funcionario', NOW())";
            $result2 = mysqli_query($connection, $query2);

            if ($result2) {
                

                $queryFuncionarioCorreo = "SELECT email FROM funcionarios WHERE id = $funcionario";
                $resultFuncionarioCorreo = mysqli_query($connection, $queryFuncionarioCorreo);

                if ($resultFuncionarioCorreo) {
                    $funcionarioRowCorreo = mysqli_fetch_assoc($resultFuncionarioCorreo);
                    $correoFuncionario = $funcionarioRowCorreo['email'];

                    echo '<input type="hidden" id="sendername" value="inventrack!">';
                    echo '<input type="hidden" id="to" value="' . $correoFuncionario . '">';
                    echo '<input type="hidden" id="subject" value="Asignación de equipo">';
                    echo '<input type="hidden" id="replyto" value="">';
                    echo '<input type="hidden" id="message" value="' . $descripcion . '">';
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
                
                window.location.href = "../../../index.php?p=equipos/index";
            })
            .catch(function (error) {
                console.error("Error al enviar el correo: ", error);
                alert("Error al enviar el correo. Consulta la consola para más detalles.");
                window.location.href = "../../../index.php?p=equipos/index";
            });


    </script>

