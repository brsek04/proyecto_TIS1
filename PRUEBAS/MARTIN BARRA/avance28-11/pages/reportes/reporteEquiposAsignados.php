<?php

require_once ('../../fpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
    
    $this->Ln(20);
    
    $this->SetFont('Arial','B',20);
  
   
    $this->Cell(60);

    
    $this->Cell(150,10,'Tabla de Equipos Asignados',0,0,'C');
  
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(2);
    $this->Cell(7,10,'ID',1,0,'C',0);
    $this->Cell(25,10,'Fecha Ingreso',1,0,'C',0);
    $this->Cell(28,10,'Funcionario',1,0,'C',0,);
    $this->Cell(27,10,'Modelo',1,0,'C',0);
    $this->Cell(27,10,'Tipo',1,0,'C',0);
    $this->Cell(20,10,'Marca',1,0,'C',0);
    $this->Cell(18,10,'Memoria',1,0,'C',0);
    $this->Cell(30,10,'Almacenamiento',1,0,'C',0);
    $this->Cell(40,10,'Tipo Almacenamiento',1,0,'C',0);
    $this->Cell(25,10,'Ingreso',1,0,'C',0);
    $this->Cell(25,10,'Mantencion',1,0,'C',0);
    $this->Cell(21,10,'Costo',1,1,'C',0);
    

  
}

function Footer()
{
    
    $this->SetY(-15);
    
    
    $this->SetFont('Arial','I',8);
    
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   
}
}

include("../../database/connection.php"); 
$query = "SELECT equipos.*, funcionarios.nombre AS funcionario, tipo.tipo AS nombreOpcion, marcas.marca AS marcas, memorias.memoria AS memorias, almacenamientos.almacenamiento AS almacenamientos, tipoAlmacenamientos.tipoAlmacenamiento AS tipoAlmacenamientos, formaIngresos.formaIngreso AS formaIngreso 
FROM equipos
LEFT JOIN funcionarios ON equipos.funcionario_id = funcionarios.id
LEFT JOIN tipo ON equipos.tipo_id = tipo.id
LEFT JOIN marcas ON equipos.marca_id = marcas.id
LEFT JOIN memorias ON equipos.memoria_id = memorias.id
LEFT JOIN almacenamientos ON equipos.almacenamiento_id = almacenamientos.id
LEFT JOIN tipoAlmacenamientos ON equipos.tipoAlmacenamiento_id = tipoAlmacenamientos.id
LEFT JOIN formaIngresos ON equipos.formaIngreso_id = formaIngresos.id
WHERE funcionarios.nombre != 'no asignado';
";
$result = mysqli_query($connection, $query);

$pdf = new PDF('L');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row=$result->fetch_assoc()) {

    $pdf->SetX(2);
    $pdf->Cell(7,10,$row['id'],1,0,'C',0);
    $pdf->Cell(25,10,$row['fechaIngreso'],1,0,'C',0);
    $pdf->Cell(28,10,$row['funcionario'],1,0,'C',0);
	$pdf->Cell(27,10,$row['modelo'],1,0,'C',0);
    $pdf->Cell(27,10,$row['nombreOpcion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['marcas'],1,0,'C',0);
    $pdf->Cell(18,10,$row['memorias'],1,0,'C',0);
    $pdf->Cell(30,10,$row['almacenamientos'],1,0,'C',0);
    $pdf->Cell(40,10,$row['tipoAlmacenamientos'],1,0,'C',0);
    $pdf->Cell(25,10,$row['formaIngreso'],1,0,'C',0);
    $pdf->Cell(25,10,$row['fechaMantencion'],1,0,'C',0);
    $pdf->Cell(21,10,$row['costo'],1,1,'C',0);
	
} 

	$pdf->Output();
?>