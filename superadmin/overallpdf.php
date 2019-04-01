<?php
include_once('fpdf17/fpdf.php');
include_once("connections.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../assets/img/deftac.jpg',10,5,70);

        $this->SetFont('Arial','B',13);
        
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(80,10,'Overall Transactions',1,0,'C');
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
$columnHeaders = [
    'username'  => '          Username', 
    'u_fname'   => '         First Name', 
    'u_lname'   => '         Last Name', 
    'appDate'   => '      Approved Date', 
    'expDate'   => '           End Date', 
    'payment'   => '            Payment'
];

$result = mysqli_query($connString, "SELECT users.username, mfillup.u_fname, mfillup.u_lname, transhistory.appDate, transhistory.expDate, transhistory.payment FROM users, transhistory, mfillup WHERE users.id = transhistory.usersid AND mfillup.username=users.username") or die("database error:". mysqli_error($connString));
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);;
$headerKeys = array_keys($result[0]);

$pdf = new PDF();
// header
$pdf->AddPage();
// footer page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
//space
$pdf->Ln();

//Display Appropriate Headers
foreach($headerKeys as $headerKey) {
    $pdf->Cell(32,12, $columnHeaders[$headerKey], 1);
}

$pdf->Ln();

foreach($result as $row) {
    foreach($row as $column) {
        $pdf->Cell(32, 12, $column,1);
    }
    $pdf->Ln();
}


$pdf->Output();
?>