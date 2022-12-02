<?php
require('fpdf/fpdf.php');

$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
class PDF extends FPDF
{


// Cabecera de página
function Header()
{
 
    // Logo
    $this->Image('../../img/logo2.png',10,8,45);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de detalles venta',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFillColor(200);
    $this->Cell(25, 10, 'Codigo Pedido', 1, 0, 'C', 1);
    $this->Cell(20, 10, 'Cliente', 1, 0, 'C', 1);
    $this->Cell(30, 10, 'Fecha Pedido', 1, 0, 'C', 1);
    $this->Cell(30, 10, 'Fecha Envio', 1, 0, 'C', 1);
    $this->Cell(35, 10, 'Direccion Entrega', 1, 0, 'C', 1);
    $this->Cell(25, 10, 'Total Pedido', 1, 0, 'C', 1);
    $this->Cell(25, 10, 'Metodo Pago', 1, 1, 'C', 1);
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
$consulta1= "SELECT p.IdPedido, c.NombreCliente, p.FechaPedido, p.FechaEnvio, p.DireccionEntrega, p.TotalPedido,  p.MetodoPago FROM  Pedido p   inner join cliente c on p.IdCliente = c.IdCliente WHERE (FechaPedido BETWEEN '$fecha1' AND '$fecha2');";

$resultado = $mysqli->query($consulta1);




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(25, 10, $row['IdPedido'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['NombreCliente'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['FechaPedido'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['FechaEnvio'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['DireccionEntrega'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['TotalPedido'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['MetodoPago'], 1, 1, 'C', 0);


}

$consulta2= "SELECT count(IdPedido) from pedido WHERE (FechaPedido BETWEEN '$fecha1' AND '$fecha2');";
$resultado1 = $mysqli->query($consulta2);

while($row = $resultado1->fetch_assoc()){
    // Salto de línea
    $pdf->Ln(20);
    $pdf->Cell(40, 10, 'Total de Ventas:', 1, 0, 'C', 0);

    $pdf->Cell(25, 10, $row['count(IdPedido)'], 1, 0, 'C', 0);


}




$pdf->Output();
?>