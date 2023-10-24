<?php
    include("../../../database/connection.php");

    $opcion = $_POST["opcion"];
    

    $query = "INSERT INTO personalize (opcion) VALUES ('$opcion');";
    $result =  mysqli_query($connection, $query);

    if ($result) {
        // Obtiene el ID de la opción personalizada recién insertada
        $personalize_id = mysqli_insert_id($connection);
    
        // Ahora, actualiza la tabla "marcas" con el ID de la opción personalizada
        /* El ID de la marca que deseas actualizar */;
        $update_query = "UPDATE marcas SET personalize_id = $personalize_id ";
        
        $update_result = mysqli_query($connection, $update_query);
        
        if ($update_result) {
            // Redirección o mensaje de éxito
            header("Location: ../../../index.php?p=personalize/index");
        } else {
            // Manejo de errores en la actualización de "marcas"
        }
    } else {
        // Manejo de errores en la inserción en "personalize"
    }




    header("Location: ../../../index.php?p=personalize/index");
?>

