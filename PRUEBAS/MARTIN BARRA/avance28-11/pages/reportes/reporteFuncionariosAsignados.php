<?php

require_once ('../../fpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
    
    $this->Ln(20);
    
    $this->SetFont('Arial','B',20);
  
   
    $this->Cell(60);

    
    $this->Cell(150,10,'Tabla de Funcionarios Asignados',0,0,'C');
  
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(2);
    $this->Cell(7,10,'ID',1,0,'C',0);
    $this->Cell(25,10,'Nombre',1,0,'C',0);
    $this->Cell(28,10,'Apellido',1,0,'C',0,);
    $this->Cell(45,10,'Email',1,0,'C',0);
    $this->Cell(50,10,'Establecimiento',1,0,'C',0);
    $this->Cell(40,10,'Departamento',1,0,'C',0);
    $this->Cell(98,10,'Información de Equipos',1,1,'C',0);
    
    

  
}

function Footer()
{
    
    $this->SetY(-15);
    
    
    $this->SetFont('Arial','I',8);
    
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   
}
}

include("../../database/connection.php"); 
$query = "SELECT funcionarios.*, establecimientos.establecimiento AS establecimiento, departamentos.departamento AS departamento,
GROUP_CONCAT(CONCAT(equipos.id, '-', tipo.tipo) SEPARATOR ', ') AS equipos_info
FROM funcionarios
LEFT JOIN establecimientos ON funcionarios.establecimiento_id = establecimientos.id
LEFT JOIN departamentos ON funcionarios.departamento_id = departamentos.id
LEFT JOIN equipos ON funcionarios.id = equipos.funcionario_id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
WHERE funcionarios.nombre != 'no asignado'
GROUP BY funcionarios.id
HAVING equipos_info IS NOT NULL AND equipos_info != ''
;";


$result = mysqli_query($connection, $query);

$pdf = new PDF('L');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row=$result->fetch_assoc()) {

    $pdf->SetX(2);
    $pdf->Cell(7,10,$row['id'],1,0,'C',0);
    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(28,10,$row['apellido'],1,0,'C',0);
	$pdf->Cell(45,10,$row['email'],1,0,'C',0);
    $pdf->Cell(50,10,$row['establecimiento'],1,0,'C',0);
    $pdf->Cell(40,10,$row['departamento'],1,0,'C',0);
    $pdf->Cell(98,10,$row['equipos_info'],1,1,'C',0);
   
	
} 

	$pdf->Output();
?>