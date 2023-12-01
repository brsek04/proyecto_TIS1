<?php

require_once('../../fpdf/fpdf.php');
include("../../database/connection.php");

class PDF extends FPDF
{
    private $fechaInicio;
    private $fechaTermino;
    private $costo;
    private $mostrarFuncionarios;
    private $connection;
    private $headerPrinted = false;

    function setFechas($fechaInicio, $fechaTermino, $costo, $mostrarFuncionarios)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
        $this->costo = $costo;
        $this->mostrarFuncionarios = $mostrarFuncionarios;
    }

    function Header()
    {
        global $connection;

        if (!$this->headerPrinted) {

            $this->Ln(0);
            $this->SetFont('Arial', 'B', 18);
            $queryTotalEquipos = "SELECT COUNT(id) AS totalEquipos FROM equipos WHERE fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'";
            $resultTotalEquipos = mysqli_query($connection, $queryTotalEquipos);
            $rowTotalEquipos = $resultTotalEquipos->fetch_assoc();
            $totalEquipos = $rowTotalEquipos['totalEquipos'];

            $this->Cell(60);
            $this->Cell(65, 2, "Reporte: {$this->fechaInicio} - {$this->fechaTermino} ($totalEquipos Equipos)", 0, 1, 'C'); // Título "Reporte"




            // Mostrar el costo solo si el checkbox de costo está marcado

            if ($this->mostrarFuncionarios) {
                $this->Ln(5);
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'Información de Funcionarios', 0, 1, 'L');
                $this->SetFont('Arial', '', 10);

                // Obtener la cantidad de equipos por funcionario
                $queryFuncionarios = "
        SELECT funcionarios.nombre AS funcionario, GROUP_CONCAT(equipos.id) AS idsEquipos, COUNT(equipos.id) AS cantidadEquipos
        FROM funcionarios
        LEFT JOIN equipos ON funcionarios.id = equipos.funcionario_id
            AND equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
        WHERE equipos.id IS NOT NULL   -- Excluir funcionarios sin equipos asignados
        GROUP BY funcionarios.id
        HAVING cantidadEquipos > 0   -- Excluir funcionarios con 0 equipos
        ORDER BY cantidadEquipos DESC";
                $resultFuncionarios = mysqli_query($connection, $queryFuncionarios);

                while ($rowFuncionario = $resultFuncionarios->fetch_assoc()) {
                    $this->Cell(0, 5, "{$rowFuncionario['funcionario']} ({$rowFuncionario['idsEquipos']}): {$rowFuncionario['cantidadEquipos']} equipos", 0, 1, 'L');
                }

                if ($this->GetY() > 250) {
                    $this->AddPage();
                    $this->SetFont('Arial', '', 8);
                }
            }


            if (isset($_POST["tipoCheckbox"])) {
                $this->Ln(5);
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'Información de Tipos', 0, 1, 'L');
                $this->SetFont('Arial', '', 10);

                // Obtener la cantidad de equipos por tipo
                $queryTipos = "
                SELECT tipo.tipo AS tipo, GROUP_CONCAT(equipos.id) AS idsEquipos, COUNT(equipos.id) AS cantidadEquipos
                FROM tipo
                LEFT JOIN equipos ON tipo.id = equipos.tipo_id
                    AND equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
                WHERE equipos.id IS NOT NULL
                GROUP BY tipo.id
                HAVING cantidadEquipos > 0
                ORDER BY cantidadEquipos DESC";
                $resultTipos = mysqli_query($connection, $queryTipos);

                while ($rowTipo = $resultTipos->fetch_assoc()) {
                    $this->Cell(0, 5, "{$rowTipo['tipo']} ({$rowTipo['idsEquipos']}): {$rowTipo['cantidadEquipos']} equipos", 0, 1, 'L');
                }
            }

            if (isset($_POST["marcaCheckbox"])) {
                $this->Ln(5);
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'Información de Marcas', 0, 1, 'L');
                $this->SetFont('Arial', '', 10);

                // Obtener la cantidad de equipos por marca
                $queryMarcas = "
                SELECT marcas.marca AS nombreMarca, GROUP_CONCAT(equipos.id) AS idsEquipos, COUNT(equipos.id) AS cantidadEquipos
                FROM equipos
                LEFT JOIN marcas ON equipos.marca_id = marcas.id
                WHERE equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
                GROUP BY marcas.id
                HAVING cantidadEquipos > 0
                ORDER BY cantidadEquipos DESC";
                $resultMarcas = mysqli_query($connection, $queryMarcas);

                while ($rowMarca = $resultMarcas->fetch_assoc()) {
                    $this->Cell(0, 5, "{$rowMarca['nombreMarca']} ({$rowMarca['idsEquipos']}): {$rowMarca['cantidadEquipos']} equipos", 0, 1, 'L');
                }
            }

            if (isset($_POST["formaIngresoCheckbox"])) {
                $this->Ln(5);
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'Información de Formas de Ingreso', 0, 1, 'L');
                $this->SetFont('Arial', '', 10);

                // Obtener la cantidad de equipos por forma de ingreso
                $queryFormasIngreso = "
                SELECT formaIngresos.formaIngreso AS nombreFormaIngreso, GROUP_CONCAT(equipos.id) AS idsEquipos, COUNT(equipos.id) AS cantidadEquipos
                FROM equipos
                LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
                WHERE equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
                GROUP BY formaIngresos.id
                HAVING cantidadEquipos > 0
                ORDER BY cantidadEquipos DESC";
                $resultFormasIngreso = mysqli_query($connection, $queryFormasIngreso);

                while ($rowFormaIngreso = $resultFormasIngreso->fetch_assoc()) {
                    $this->Cell(0, 5, "{$rowFormaIngreso['nombreFormaIngreso']} ({$rowFormaIngreso['idsEquipos']}): {$rowFormaIngreso['cantidadEquipos']} equipos", 0, 1, 'L');
                }
            }


            $this->Ln(5);
            $this->SetFont('Arial', 'B', 8);
            $this->SetX(5);
            $this->Cell(20, 10, 'Fecha Ingreso', 1, 0, 'C', 0);
            $this->Cell(20, 10, 'Funcionario', 1, 0, 'C', 0);
            $this->Cell(27, 10, 'Modelo', 1, 0, 'C', 0);
            $this->Cell(20, 10, 'Tipo', 1, 0, 'C', 0);
            $this->Cell(14, 10, 'Memoria', 1, 0, 'C', 0);
            $this->Cell(25, 10, 'Almacenamiento', 1, 0, 'C', 0);
            $this->Cell(30, 10, 'Tipo Almacenamiento', 1, 0, 'C', 0);
            $this->Cell(22, 10, 'Forma Ingreso', 1, 0, 'C', 0);
            $this->Cell(20, 10, 'Costo', 1, 1, 'C', 0);
            $this->headerPrinted = true;
        }
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 6);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Obtener las fechas desde POST
$fechaInicio = $_POST["fechaInicio"];
$fechaTermino = $_POST["fechaTermino"];

// Verificar si el checkbox de costo está marcado
$costoCheckbox = isset($_POST["costoCheckbox"]);
$funcionarioCheckbox = isset($_POST["funcionarioCheckbox"]);
$tipoCheckbox = isset($_POST["tipoCheckbox"]);
$marcaCheckbox = isset($_POST["marcaCheckbox"]);

// Modificar la consulta SQL para seleccionar las filas dentro del rango de fechas
$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos, formaIngresos.formaIngreso AS formaIngresos
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
WHERE equipos.fechaIngreso BETWEEN '$fechaInicio' AND '$fechaTermino';";

$result = mysqli_query($connection, $query);

// Calcular la suma de los costos y encontrar el ID del equipo con el costo más alto
$totalCosto = 0;
$costoMasCaro = 0;
$idEquipoMasCaro = 0;

$pdf = new PDF();
$pdf->setFechas($fechaInicio, $fechaTermino, $costoCheckbox ? $totalCosto : '', $funcionarioCheckbox, $tipoCheckbox, $marcaCheckbox); // Configurar las fechas, el costo total y si se deben mostrar los funcionarios
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);



$queryTotalCosto = "SELECT SUM(costo) AS totalCosto FROM equipos WHERE fechaIngreso BETWEEN '$fechaInicio' AND '$fechaTermino'";
$resultTotalCosto = mysqli_query($connection, $queryTotalCosto);
$rowTotalCosto = $resultTotalCosto->fetch_assoc();
$totalCosto = $rowTotalCosto['totalCosto'];

// Realizar una consulta para obtener el equipo con el costo más alto
$queryEquipoMasCaro = "SELECT id, costo FROM equipos WHERE fechaIngreso BETWEEN '$fechaInicio' AND '$fechaTermino' ORDER BY costo DESC LIMIT 1";
$resultEquipoMasCaro = mysqli_query($connection, $queryEquipoMasCaro);
$rowEquipoMasCaro = $resultEquipoMasCaro->fetch_assoc();
$idEquipoMasCaro = $rowEquipoMasCaro['id'];
$costoMasCaro = $rowEquipoMasCaro['costo'];

// Mostrar los costos totales antes de la tabla




while ($row = $result->fetch_assoc()) {
    $pdf->SetX(5);
    $pdf->Cell(20, 10, $row['fechaIngreso'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['funcionario'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['nombreOpcion'], 1, 0, 'C', 0);
    $pdf->Cell(14, 10, $row['memorias'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['almacenamientos'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['tipoAlmacenamientos'], 1, 0, 'C', 0);
    $pdf->Cell(22, 10, $row['formaIngresos'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['costo'], 1, 1, 'C', 0);


    // Verificar si es necesario agregar una nueva página después de cada conjunto


}

// Mostrar los costos totales al final
$pdf->Ln(5);


// Mostrar el ID del equipo con el costo más caro y su costo
$pdf->Cell(0, 5, "ID del equipo con el costo más caro: $idEquipoMasCaro con un costo de $" . number_format($costoMasCaro, 2), 0, 1, 'C');
$pdf->Cell(0, 5, "Costos totales: $" . $totalCosto, 0, 1, 'C');

$pdf->Output();
?>