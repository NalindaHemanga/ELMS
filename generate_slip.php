<?php
require_once 'core/init.php';

$pdf = new PDFGenerator();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->ln(30);
$pdf->SetFont('Times','',12);
$header = array('Index', 'Item Name', 'Item Copy No', 'Quantity');
// Data loading
$data=array();
$basket=$_SESSION["basket"];
$c=1;
foreach ($basket as $key => $value) {
	array_push($data,array($c,$value["item_copy_name"],$value["item_copy_no"],$value["quantity"]));
	$c=$c+1;
}


	


	

$pdf->SetFont('Arial','',14);

//$pdf->BasicTable($header,$data);
//$pdf->AddPage();
$pdf->Cell(0,0,'Item Details',0,0,'C');
$pdf->ln(10);
$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();

?>
