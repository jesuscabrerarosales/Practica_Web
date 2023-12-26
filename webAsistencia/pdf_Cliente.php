<?php
require ('fpdf.php');
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',15);
        $this->Cell(60);
        $this->Cell(70,10,'Reporte de Clientes',1,0,'C');
        $this->Ln(20);

        $this->Cell(40,10,'DNI',1,0,'C',0);
        $this->Cell(40,10,'Nombre',1,0,'C',0);
        $this->Cell(50,10,'Apellido Paterno',1,0,'C',0);
        $this->Cell(50,10,'Apellido Materno',1,1,'C',0);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
include 'controlador/conexion.php';
$sentencia= $db->query("SELECT nrodocumento, nombre, apellidoPaterno,apellidoMaterno  FROM cliente");
$resultado= $sentencia->fetchAll(PDO::FETCH_ASSOC);


$pdf =new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
foreach($resultado as $dato){
    $pdf->Cell(40,10,$dato['nrodocumento'],1,0,'C',0);
    $pdf->Cell(40,10,$dato['nombre'],1,0,'C',0);
    $pdf->Cell(50,10,$dato['apellidoPaterno'],1,0,'C',0);
    $pdf->Cell(50,10,$dato['apellidoMaterno'],1,1,'C',0);
}

$pdf->Output();
?>