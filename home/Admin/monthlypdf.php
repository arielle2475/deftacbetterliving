<?php
include_once('fpdf17/fpdf.php');
include_once("connections.php");
//A4 width: 219mm
//Default margin: 10mm each side

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/deftac.jpg',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Monthly Transactions',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('mfillup.u_fname' .'mfillup.u_lname'=> 'Name','users.username'=> 'Username', 'transhistory.appDate'=> 'Approved Date','transhistory.expDate'=> 'End Date','transhistory.payment'=> 'Payment');
// 'transhistory.id'=>'Transaction #', 
$result = mysqli_query($connString, "SELECT users.username, mfillup.u_fname, mfillup.u_lname, transhistory.appDate, transhistory.expDate, transhistory.payment FROM users, transhistory, mfillup WHERE users.id = transhistory.usersid AND mfillup.username=users.username AND YEAR(transhistory.appDate)=YEAR(curdate()) AND MONTH(transhistory.appDate)=MONTH(curdate())") or die("database error:". mysqli_error($connString));
// $header = mysqli_query($connString, "SHOW columns FROM users, transhistory, mfillup");

$pdf = new PDF();
// header
$pdf->AddPage();
// foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
// foreach($header as $heading) {
// $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
// }

$pdf->Ln();
//cell(width , height , text , border , end line , [align]
$pdf->Cell(32  ,15,'          Username',1,0);
$pdf->Cell(32  ,15,'          First Name',1,0); 
$pdf->Cell(32  ,15,'          Last Name',1,0); 
$pdf->Cell(32  ,15,'        Approved Date',1,0);  
$pdf->Cell(32  ,15,'          End Date',1,0);
$pdf->Cell(32  ,15,'          Payment',1,1); //end of line

foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(32,12,$column,1);
}


$pdf->Output();
?>