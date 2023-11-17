<?php

require_once ('../../fpdf/fpdf.php');
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
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(150, 10, 'Reporte ', 0, 1, 'C');
        $this->Cell(270, 10, $this->fechaInicio . ' - ' . $this->fechaTermino, 0, 1, 'C');
        
        // Mostrar el costo solo si el checkbox de costo está marcado
        if (!empty($this->costo)) {
            $texto = "Costos totales : $" . $this->costo;
            $this->Cell(150, 10, $texto, 0, 1, 'C');
        }
        if ($this->mostrarFuncionarios) {
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Información de Funcionarios', 0, 1, 'L');
            $this->SetFont('Arial', '', 10);
            

            // Obtener la cantidad de equipos por funcionario
            $queryFuncionarios = "SELECT funcionarios.nombre AS funcionario, COUNT(equipos.id) AS cantidadEquipos
            FROM funcionarios
            LEFT JOIN equipos ON funcionarios.id = equipos.funcionario_id
                AND equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
            GROUP BY funcionarios.id
            ORDER BY cantidadEquipos DESC";
            $resultFuncionarios = mysqli_query($connection, $queryFuncionarios);

            while ($rowFuncionario = $resultFuncionarios->fetch_assoc()) {
                $this->Cell(0, 10, "{$rowFuncionario['funcionario']}: {$rowFuncionario['cantidadEquipos']} equipos", 0, 1, 'L');
            }


            
        }

        if (isset($_POST["modeloCheckbox"])) {
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Información de Modelos', 0, 1, 'L');
            $this->SetFont('Arial', '', 10);
        
            // Obtener la cantidad de equipos por modelo
            $queryModelos = "SELECT modelo, COUNT(id) AS cantidadEquipos
                             FROM equipos
                             WHERE fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
                             GROUP BY modelo
                             ORDER BY cantidadEquipos DESC";
            $resultModelos = mysqli_query($connection, $queryModelos);
        
            while ($rowModelo = $resultModelos->fetch_assoc()) {
                $this->Cell(0, 10, "{$rowModelo['modelo']}: {$rowModelo['cantidadEquipos']} equipos", 0, 1, 'L');
            }

            $this->Cell(0, 10, '', 0, 1, 'L'); // Espacio en blanco
        }

        if (isset($_POST["tipoCheckbox"])) {
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Información de Tipos', 0, 1, 'L');
            $this->SetFont('Arial', '', 10);

            // Obtener la cantidad de equipos por tipo
            $queryTipos =   "SELECT tipo.tipo AS tipo, COUNT(equipos.id) AS cantidadEquipos
            FROM tipo
            LEFT JOIN equipos ON tipo.id = equipos.tipo_id
                AND equipos.fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
            GROUP BY tipo.id
            ORDER BY cantidadEquipos DESC";
            $resultTipos = mysqli_query($connection, $queryTipos);

            while ($rowTipo = $resultTipos->fetch_assoc()) {
                $this->Cell(0, 10, "{$rowTipo['tipo']}: {$rowTipo['cantidadEquipos']} equipos", 0, 1, 'L');
            }

            $this->Cell(0, 10, '', 0, 1, 'L'); // Espacio en blanco
        }

        if (isset($_POST["marcaCheckbox"])) {
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Información de Marcas', 0, 1, 'L');
            $this->SetFont('Arial', '', 10);

            // Obtener la cantidad de equipos por marca
            $queryMarcas = "SELECT marcas.marca AS nombreMarca, COUNT(equipos.id) AS cantidadEquipos
                            FROM equipos
                            LEFT JOIN marcas ON equipos.marca_id = marcas.id
                            WHERE fechaIngreso BETWEEN '$this->fechaInicio' AND '$this->fechaTermino'
                            GROUP BY marcas.id
                            ORDER BY cantidadEquipos DESC";
            $resultMarcas = mysqli_query($connection, $queryMarcas);

            while ($rowMarca = $resultMarcas->fetch_assoc()) {
                $this->Cell(0, 10, "{$rowMarca['nombreMarca']}: {$rowMarca['cantidadEquipos']} equipos", 0, 1, 'L');
            }

            $this->Cell(0, 10, '', 0, 1, 'L'); // Espacio en blanco
        }

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(15);
        $this->Cell(7, 10, 'ID', 1, 0, 'C', 0);
        $this->Cell(25, 10, 'Fecha Ingreso', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Funcionario', 1, 0, 'C', 0);
        $this->Cell(27, 10, 'Modelo', 1, 0, 'C', 0);
        $this->Cell(27, 10, 'Tipo', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'Marca', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'Memoria', 1, 0, 'C', 0);
        $this->Cell(35, 10, 'Almacenamiento', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Tipo Almacenamiento', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'Costo', 1, 1, 'C', 0);
        $this->headerPrinted = true;
    }
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
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
$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos 
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
WHERE equipos.fechaIngreso BETWEEN '$fechaInicio' AND '$fechaTermino';";

$result = mysqli_query($connection, $query);

// Calcular la suma de los costos y encontrar el ID del equipo con el costo más alto
$totalCosto = 0;
$costoMasCaro = 0;
$idEquipoMasCaro = 0;

$pdf = new PDF('L');
$pdf->setFechas($fechaInicio, $fechaTermino, $costoCheckbox ? $totalCosto : '', $funcionarioCheckbox, $tipoCheckbox, $marcaCheckbox); // Configurar las fechas, el costo total y si se deben mostrar los funcionarios
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $result->fetch_assoc()) {
    $pdf->SetX(15);
    $pdf->Cell(7, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['fechaIngreso'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['funcionario'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['nombreOpcion'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['marcas'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['memorias'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['almacenamientos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['tipoAlmacenamientos'], 1, 0, 'C', 0);
    
    // Mostrar el costo solo si el checkbox de costo está marcado
    if ($costoCheckbox) {
        $pdf->Cell(20, 10, "costo = {$row['costo']}", 1, 1, 'C', 0);
        $totalCosto += $row['costo'];

        // Verificar si el costo actual es mayor al costo más caro registrado
        if ($row['costo'] > $costoMasCaro) {
            $costoMasCaro = $row['costo'];
            $idEquipoMasCaro = $row['id'];
        }
    } else {
        $pdf->Cell(20, 10, '', 1, 1, 'C', 0);
    }

    // Verificar si es necesario agregar una nueva página
    if ($pdf->GetY() > 250) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        // Reimprimir el encabezado en la nueva página
        $pdf->Header();
    }

    // Verificar si es necesario agregar una nueva página después de cada conjunto
    if (isset($_POST["modeloCheckbox"]) && $row = $resultModelos->fetch_assoc()) {
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        // Reimprimir el encabezado en la nueva página
        $pdf->Header();
    }
   
}

// Mostrar los costos totales al final
$pdf->Ln(10);
$pdf->Cell(0, 10, "Costos totales: $" . $totalCosto, 0, 1, 'C');

// Mostrar el ID del equipo con el costo más caro y su costo
$pdf->Cell(0, 10, "ID del equipo con el costo más caro: $idEquipoMasCaro con un costo de $" . number_format($costoMasCaro, 2), 0, 1, 'C');

$pdf->Output();
?>
