<?php

require('../server.php');
$s = $_GET['op'];

$sql1="SELECT * FROM st_details where StpID='$s'";
$record1= mysqli_query($db,$sql1);
$sql2="SELECT * FROM st_description where StpID='$s'";
$record2= mysqli_query($db,$sql2);
$sql3="SELECT * FROM current_round where StpID='$s'";
$record3= mysqli_query($db,$sql3);
$sql4="SELECT * FROM round_history where StpID='$s'";
$record4= mysqli_query($db,$sql4);
$sql5="SELECT * FROM st_advisors where StpID='$s'";
$record5= mysqli_query($db,$sql5);
$sql6="SELECT * FROM annual_financial where StpID='$s'" ;
$record6= mysqli_query($db,$sql6);
$sql7="SELECT * FROM annual_financial where StpID='$s'" ;
$record7= mysqli_query($db,$sql7);
$sql8="SELECT * FROM annual_financial where StpID='$s'" ;
$record8= mysqli_query($db,$sql8);
$sql9="SELECT * FROM annual_financial where StpID='$s'" ;
$record9= mysqli_query($db,$sql9);
$sql10="SELECT * FROM annual_financial where StpID='$s'" ;
$record10= mysqli_query($db,$sql10);
$sql11="SELECT * FROM st_team where StpID='$s'" ;
$record11= mysqli_query($db,$sql11);

require("../generateonepager/fpdf.php");

class PDF extends FPDF {
    // function footer(){
    //     $this->SetY(-15);
    //     $this->SetFont('Arial','',12);
    //     $this->Cell(0,10,'Page'.$this->PageNo(),0,0,'C');
    // }


}


$pdf= new PDF('p','mm','A4');

$pdf->AddPage();
    $row1= mysqli_fetch_array($record1);
    $row2= mysqli_fetch_array($record2);
    $row3= mysqli_fetch_array($record3);
    $row4= mysqli_fetch_array($record4);
    $pdf->SetFont('Arial','B',11);
    $pdf->SetXY(135,40);
    $pdf->cell(0,0, "Company ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->SetXY(135,50);
    $pdf->cell(0,0 , "URL:", 0, 0, 'L');
    $pdf->SetXY(135,50);
    $pdf->cell(0,0,$row1['Website'] , 0, 1, 'R');
    $pdf->SetXY(135,51);
    $pdf->cell(0, 10 , "Founder 1:", 0, 0, 'L');
    $pdf->SetXY(135,51);
    $pdf->cell(0, 10,$row1['Ffname'] , 0, 1, 'R');
    $pdf->SetXY(135,56);
    $pdf->cell(0, 10 , "Founder 2:", 0, 0, 'L');
    $pdf->SetXY(150,56);
    $pdf->cell(0, 10,$row1['Sfname'] , 0, 1, 'R');
    $pdf->SetXY(135,62);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Entrepreneur", 0, 0, 'L');
    $pdf->SetXY(135,70);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , $row1['Stname'], 0, 0, 'L');
    $pdf->SetXY(135,74);
    $pdf->SetFont('Arial','',11);
    $pdf->cell(0, 10 , $row1['Email'], 0, 0, 'L');
    $pdf->SetXY(135,82);
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
    $pdf->SetXY(135,115);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Advisors", 0, 0, 'L');
    $pdf->SetXY(135,123);
    $pdf->SetFont('Arial','',11);
    while($row5= mysqli_fetch_assoc($record5)){
      $pdf->cell(0, 10 , $row5['Name'], 0, 0, 'L');
    }
    $pdf->SetXY(135,131);
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(0, 10 , "Team", 0, 1, 'L');
    $pdf->SetXY(135,139);
    $pdf->SetFont('Arial','',11);
    while($row11= mysqli_fetch_assoc($record11)){
      $pdf->cell(0, 10 , $row11['FName']." ".$row11['LName'], 0, 0, 'L');
      $pdf->cell(0, 10 , $row11['Designation'], 0, 1, 'R');
    }

    $pdf->SetXY(10,10);
    $pdf->SetFont('Arial','B',25);
    $pdf->cell(0,10, $row1['Stname'], 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->cell(100,5,$row1['Type'].", ".$row1['State'].", ".$row1['Country'] , 0, 1, 'L');
    $pdf->cell(1, 5,$row2['OLP'] , 0, 1, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(60, 10 , "Company Summary ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['Summary']!=''){
        $pdf->MultiCell(120,5, $row2['Summary']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Customer Problem ", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CustomerProblem']!=''){
        $pdf->MultiCell(120,5,$row2['CustomerProblem']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }
    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Product/Services", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['ProductService']!=''){
        $pdf->MultiCell(120,5,$row2['ProductService']);
        $pdf->Ln();
    }
    else{
    $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Target Market", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['TargetMarket']!=''){
        $pdf->MultiCell(120,5,$row2['TargetMarket']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Business Model", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['BusinessModel']!=''){
        $pdf->MultiCell(120,5,$row2['BusinessModel']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Customer Segments", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CustomerSegments']!=''){
        $pdf->MultiCell(120,5,$row2['CustomerSegments']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Sales/Marketing Strategy", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['SaleMarketStrat']!=''){
        $pdf->MultiCell(120,5,$row2['SaleMarketStrat']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Competitors", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['Competitors']!=''){
        $pdf->MultiCell(120,5,$row2['Competitors']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }


    $pdf->SetFont('Arial','B',11);
    $pdf->cell(40, 5 , "Competitive Advantage", 0, 1, 'L');
    $pdf->SetFont('Arial','',11);
    $x=$pdf->GetX();
    if($row2['CompAdvantage']!=''){
        $pdf->MultiCell(120,5,$row2['CompAdvantage']);
        $pdf->Ln();
    }
    else{
        $pdf->MultiCell(120,5,"The Company has not provided any details concerning the said Point of discussion with aayush in consideration.");
        $pdf->Ln();
    }



    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x,$y);
    $pdf->SetFont('Arial','B',16);
    $pdf->cell(40, 5 , "Startup Annual Financial", 0, 1, 'L');


    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetFont('Arial','',13);
    $pdf->SetXY($x+30,$y);
    while($row6= mysqli_fetch_assoc($record6)){
        $pdf->cell(25,10,$row6['year'],0,0,'L');
    }
    $pdf->SetXY($x,$y+10);
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

$pdf->OutPut();
?>
