<?php
require('fpdf17/fpdf.php');

//A4 width: 219mm
//Default margin: 10mm each side

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

//set font to arial
$image1 = "images/demo/img/deftac.jpg";
$pdf->SetFont('Arial','B',14);
$pdf->Cell(189	,20,'',0,1);//end of line

$pdf->Cell(189	,10,'',0,1);//end of line
//cell(width , height , text , border , end line , [align]

$pdf->Image($image1, 68, 4, 70, 30);


$pdf->Cell(180  ,40,'                            DEFTAC Betterliving Pre-Registration Form',1,0);
$pdf->Cell(9  ,40,'',1,1); //end of line

$pdf->SetFont('Arial','B',12);

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' First Name:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Last Name:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Username:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Subscription:',1,0);
$pdf->Cell(130  ,10,' 1 Month Membership (P1,500.00)',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Gender:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' E-mail Address:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Age:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Home Address 1:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Home Address 2:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,10,' Contact Number:',1,0);
$pdf->Cell(130  ,10,'',1,1); //end of line

//cell(width , height , text , border , end line , [align]
$pdf->Cell(59  ,50,' Why do you want to join?',1,0);
$pdf->Cell(130  ,50,'',1,1); //end of line


$pdf->Output();
?>