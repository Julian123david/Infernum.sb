<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{


// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../img/logo2.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de detalles venta General',0,0,'C');
    // Salto de línea
    $this->Ln(20);

   
    $this->SetFillColor(200);
    $this->Cell(18, 10, 'Codigo', 1, 0, 'C', 1);
    $this->Cell(20, 10, 'Descuento', 1, 0, 'C', 1);
    $this->Cell(28, 10, 'Codigo Pedido', 1, 0, 'C', 1);
    $this->Cell(48, 10, 'Producto', 1, 0, 'C', 1);
    $this->Cell(20, 10, 'Cantidad', 1, 0, 'C', 1);
    $this->Cell(20, 10, 'Precio', 1, 0, 'C', 1);
    $this->Cell(30, 10, 'SubTotal', 1, 1, 'C', 1);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'cn.php';
//$consulta = "SELECT * FROM detallepedido";
$consulta1= "SELECT * FROM subtotal";
$resultado = $mysqli->query($consulta1);




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(18, 10, $row['IdDetalle'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['DescuentoPedido'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['IdPedido'], 1, 0, 'C', 0);
    $pdf->Cell(48, 10, $row['nom'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['CantidadProducto'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['PrecioUnitario'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['subtotal'], 1, 1, 'C', 0);
}

$pdf->Output();
?>