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
$basket=$_SESSION["temp_basket"];
$c=1;
foreach ($basket as $key => $value) {
	array_push($data,array($c,$value["item_copy_name"],$value["item_copy_no"],$value["quantity"]));
	$c=$c+1;
}


	

$member_id=$_GET["member"];
$username=$_SESSION["logged_in_user"];

$member1=Member::search(array("member_email"=>$username));
$name1=$member1->getInitials()." ".$member1->getSurname();

$member2=Member::search(array("member_id"=>$member_id));
$name2=$member2->getInitials()." ".$member2->getSurname();
	

$pdf->SetFont('Arial','',14);

//$pdf->BasicTable($header,$data);
//$pdf->AddPage();
$pdf->ln(10);
$pdf->Cell(0,0,'Issued Date :',0,0,'L');
$pdf->ln(0);
$pdf->Cell(0,0,date("Y-m-d"),0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,0,'Expected Return Date :',0,0,'L');
$pdf->ln(0);
$pdf->Cell(0,0,$_GET["rdate"],0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,0,'Issuer :',0,0,'L');
$pdf->ln(0);
$pdf->Cell(0,0,$name1,0,0,'C');
//$pdf->ln(5);
//$pdf->Cell(0,0,'Borrower',0,0,'L');
//$pdf->ln(0);
//$pdf->Cell(0,0,$name2,0,0,'C');
$pdf->ln(20);
$pdf->Cell(0,0,'Item Details',0,0,'C');

$pdf->ln(10);
$pdf->ImprovedTable($header,$data);
$pdf->ln(20);
$pdf->Cell(0,0,'.............................................',0,0,'L');
$pdf->ln(0);
$pdf->Cell(0,0,'.............................................',0,0,'R');
$pdf->ln(5);
$pdf->Cell(0,0,'Mr. HEMHB Ekanayake',0,0,'L');
$pdf->ln(0);
$pdf->Cell(0,0,$name2,0,0,'R');
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();

?>
