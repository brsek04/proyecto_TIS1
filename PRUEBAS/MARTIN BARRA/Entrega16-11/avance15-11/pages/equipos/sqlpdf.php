<?php

require_once ('../../fpdf/fpdf.php');
include("../../database/connection.php");

class PDF extends FPDF
{
    private $fechaInicio;
    private $fechaTermino;

    function setFechas($fechaInicio, $fechaTermino)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
    }

    function Header()
    {
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(150, 10, 'Reporte ', 0, 1, 'C');
        $this->Cell(270, 10, $this->fechaInicio . ' - ' . $this->fechaTermino, 0, 0, 'C');

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

        $this->Ln();
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

$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos 
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id;";
$result = mysqli_query($connection, $query);

$pdf = new PDF('L');
$pdf->setFechas($fechaInicio, $fechaTermino); // Configurar las fechas
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
    $pdf->Cell(20, 10, $row['costo'], 1, 1, 'C', 0);
    $pdf->Ln();
}

$pdf->Output();
?>
