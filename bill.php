<?php
require('fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'grocery');

//get invoices data
$query2 = mysqli_query($con,"SELECT * from user left join orderstatus on user.uid=orderstatus.uid ");
$invoice2 = mysqli_fetch_array($query2);
$query = mysqli_query($con,"SELECT * from orderstatus left join user on orderstatus.uid=user.uid ");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'STORE 2 DOOR',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'MVP COLONY',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'VISAKHAPATNAM 530017 INDIA',0,0);
$pdf->Cell(10	,5,'Date',0,0);
$pdf->Cell(25	,5,$invoice['btime'],0,0);

//end of line

$pdf->Cell(100	,5,'Phone [+12345678]',0,1);

$pdf->Cell(25	,5,'CUSTOMER ID',0,0);
$pdf->Cell(25	,5,$invoice2['uid'],0,1);

$pdf->Cell(25	,5,'BILL ID',0,0);
$pdf->Cell(25	,5,$invoice['bid'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,' ',0,0);
 $pdf->Cell(15	,5,$invoice2['firstname'],0,0);
$pdf->Cell(50,5,$invoice2['lastname'],0,1);

$pdf->Cell(10	,5,' ',0,0);
$pdf->Cell(90	,5,$invoice2['phoneno'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice2['doorno'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice2['landmark'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice2['pincode'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice2['city'],0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Item Name',1,0);
$pdf->Cell(25	,5,'Price',1,0);
$pdf->Cell(34	,5,'Quantity',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select name,price,quantity from item left join orderstatus on item.uid=orderstatus.uid");
$total = 0; //total tax
//$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['name'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['price']),1,0);
	$pdf->Cell(34	,5,number_format($item['quantity']),1,1,'R');//end of line
	//accumulate tax and amount
	$total += ($item['price'] *$item['quantity']);
	
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(6	,5,'Rs',1,0);
$pdf->Cell(30	,5,number_format($total),1,1,'R');//end of line
$pdf->Output();
?>