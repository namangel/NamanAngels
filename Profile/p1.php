<?php

require('server.php');
$s = $_SESSION['StpID'];

$sql1="SELECT * FROM st_details where StpID='NAMST0000001'";
$record1= mysqli_query($db,$sql1);
$sql2="SELECT * FROM st_description where StpID='NAMST0000001'";
$record2= mysqli_query($db,$sql2);
$sql3="SELECT * FROM current_round where StpID='NAMST0000001'";
$record3= mysqli_query($db,$sql3);
$sql4="SELECT * FROM round_history where StpID='NAMST0000001'";
$record4= mysqli_query($db,$sql4);
$sql5="SELECT * FROM st_advisors where StpID='NAMST0000001'";
$record5= mysqli_query($db,$sql5);
$sql6="SELECT * FROM annual_financial where StpID='NAMST0000001'" ;
$record6= mysqli_query($db,$sql6);
$sql7="SELECT * FROM annual_financial where StpID='NAMST0000001'" ;
$record7= mysqli_query($db,$sql7);
$sql8="SELECT * FROM annual_financial where StpID='NAMST0000001'" ;
$record8= mysqli_query($db,$sql8);
$sql9="SELECT * FROM annual_financial where StpID='NAMST0000001'" ;
$record9= mysqli_query($db,$sql9);
$sql10="SELECT * FROM annual_financial where StpID='NAMST0000001'" ;
$record10= mysqli_query($db,$sql10);

require("library/fpdf.php");

class PDF extends FPDF {
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',12);
        $this->Cell(0,10,'Page'.$this->PageNo(),0,0,'C');
    }

    function mycell($w,$h,$x,$t){
        $height=$h/3;
        $first=$height+2;
        $second=$height+$height+$height+3;
        $len= strlen($t);
        if($len>60){
            $txt= str_split($t,60);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
        }
        else {
            $this->SetX($x);
            $this->Cell($w,$h,$t,'','0','L','0');
        }
    }
}


$pdf= new PDf('p','mm','A4');

$pdf->AddPage();

while(($row1= mysqli_fetch_array($record1)) && ($row2= mysqli_fetch_array($record2)) && ($row3= mysqli_fetch_array($record3))
&& ($row4= mysqli_fetch_array($record4))&& ($row5= mysqli_fetch_array($record5))  ){
    $pdf->SetFont('Arial','B',25);

    $pdf->cell(0,10, $row1['Stname'], 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->cell(25,5,$row1['Type'] , 0, 0, 'L');
    $pdf->cell(2, 5, ",", 0, 0, 'L');
    $pdf->cell(25, 5,$row1['State'] , 0, 0, 'L');
    $pdf->cell(2, 5, ",", 0, 0, 'L');
    $pdf->cell(25, 5,$row1['Country'] , 0, 1, 'L');
    $pdf->cell(1, 10,$row2['OLP'] , 0, 1, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(60, 10 , "Company Summary ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['Summary']!=''){
        $pdf->mycell(40,10,$x,$row2['Summary']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10, 10 , "NOT PROVIDED ", 0, 1, 'L');
    }
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Customer Problem ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CustomerProblem']!=''){
        $pdf->mycell(40,10,$x,$row2['CustomerProblem']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Product/Services", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['ProductService']!=''){
        $pdf->mycell(40,10,$x,$row2['ProductService']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Target Market", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['TargetMarket']!=''){
        $pdf->mycell(40,10,$x,$row2['TargetMarket']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Business Model", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['BusinessModel']!=''){
        $pdf->mycell(40,10,$x,$row2['BusinessModel']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Customer Segments", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CustomerSegments']!=''){
        $pdf->mycell(40,10,$x,$row2['CustomerSegments']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Sales/Marketing Strategy", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['SaleMarketStrat']!=''){
        $pdf->mycell(40,10,$x,$row2['SaleMarketStrat']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Competitors", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['Competitors']!=''){
        $pdf->mycell(40,10,$x,$row2['Competitors']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Competitive Advantage", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CompAdvantage']!=''){
        $pdf->mycell(40,10,$x,$row2['CompAdvantage']);
        $pdf->Ln();
    }
    else{
        $pdf->cell(10,10 , "Not Provided ", 0, 1, 'L');
    }
    $pdf->SetFont('Arial','B',16);
    $pdf->SetTextColor(135,206,235);
    $pdf->cell(40, 5 , "Startup Anual Financial", 0, 1, 'L');
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',13);
    $pdf->SetXY(40,180);
    while($row6= mysqli_fetch_assoc($record6)){
        $pdf->cell(25,10,$row6['year'],0,0,'L');
    }
    $pdf->SetXY(10,190);
    $pdf->cell(30, 10 , "Sales", 1, 0, 'L');
    while($row10= mysqli_fetch_assoc($record10)){
        $pdf->cell(25,10,$row10['sales'],1,0,'L');
    }
    $pdf->Ln();
    $pdf->cell(30,10,"Revenue",1,0,'L');
    while($row7= mysqli_fetch_assoc($record7)){
        $pdf->cell(25,10,$row7['revenue'],1,0,'L');
    }
    $pdf->Ln();
    $pdf->cell(30,10,"Expenditure",1,0,'L');
    while($row8= mysqli_fetch_assoc($record8)){
        $pdf->cell(25,10,$row8['expenditure'],1,0,'L');
    }
    $pdf->Ln();
    $pdf->cell(30,10,"Profit",1,0,'L');
    while($row9= mysqli_fetch_assoc($record9)){
        $pro=$row9['revenue']-$row9['expenditure'];
        $pdf->cell(25,10,$pro,1,0,'L');
    }
    $pdf->Ln();


    $pdf->SetFont('Arial','B',11);
    $pdf->SetXY(150,40);
    $pdf->cell(0,0, "Company ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->SetXY(150,50);
    $pdf->cell(0,0 , "URL:", 0, 0, 'L');
    $pdf->SetXY(150,50);
    $pdf->cell(0,0,$row1['Website'] , 0, 1, 'R');
    $pdf->SetXY(150,51);
    $pdf->cell(0, 10 , "Founder 1:", 0, 0, 'L');
    $pdf->SetXY(150,51);
    $pdf->cell(0, 10,$row1['Ffname'] , 0, 1, 'R');
    $pdf->SetXY(150,56);
    $pdf->cell(0, 10 , "Founder 2:", 0, 0, 'L');
    $pdf->SetXY(150,56);
    $pdf->cell(0, 10,$row1['Sfname'] , 0, 1, 'R');
    $pdf->SetXY(150,62);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Entrepreneur", 0, 0, 'L');
    $pdf->SetXY(150,70);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , $row1['Stname'], 0, 0, 'L');
    $pdf->SetXY(150,74);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , $row1['Email'], 0, 0, 'L');
    $pdf->SetXY(150,82);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Round Overview", 0, 0, 'L');
    $pdf->SetXY(135,91);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , "Funding Stage:", 0, 0, 'L');
    $pdf->SetXY(135,91);
    $pdf->cell(0, 10 , $row3['Round'], 0, 0, 'R');
    $pdf->SetXY(135,96);
    $pdf->cell(0, 10 , "Capital Raised:", 0, 0, 'L');
    $pdf->SetXY(135,96);
    $pdf->cell(0, 10 , $row4['Capital_raised'], 0, 0, 'R');
    $pdf->SetXY(135,101);
    $pdf->cell(0, 10 , "Capital Seeking:", 0, 0, 'L');
    $pdf->SetXY(135,101);
    $pdf->cell(0, 10 , $row3['Seeking'], 0, 0, 'R');
    $pdf->SetXY(135,106);
    $pdf->cell(0, 10 , "Pre-money Valuation:", 0, 0, 'L');
    $pdf->SetXY(135,106);
    $pdf->cell(0, 10 , $row3['Premoney_val'], 0, 0, 'R');
    $pdf->SetXY(150,115);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Advisors", 0, 0, 'L');
    $pdf->SetXY(150,123);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , $row5['Name'], 0, 0, 'L');
}
$pdf->OutPut();
?>
