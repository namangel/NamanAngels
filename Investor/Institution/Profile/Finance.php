<?php
	require '../../../server.php';
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$id = "";
	if (isset($_GET['searchquery'])) {
		$id = $_GET['searchquery'];
	}

	$invid =	$_SESSION['InvID'];

	$transbtn = "Invest";

	$qr = "SELECT * FROM requests WHERE Inv_ID='$invid' AND St_ID='$id'";
	$req = mysqli_query($db, $qr);
	if (mysqli_num_rows($req) == 1)
	{
		$row1 = mysqli_fetch_assoc($req);
		$deal = $row1['Deal'];
		if($deal == 1)
		{
			$transbtn = "Invested";
		}
		if($deal == 0)
		{
			$transbtn = "Transaction In Progress";
		}
	}

	if(isset($_POST["make_deal"]))
	{
		if (mysqli_num_rows($req) == 0)
		{
			$q = "INSERT into requests(Inv_ID,St_ID) values ('$invid','$id')";
			mysqli_query($db, $q);
		}
		header('location: Finance.php?searchquery='.$id);
	}

	$qu = "SELECT * FROM st_details WHERE StpID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
	$Sfname = $row['Sfname'];
	$Email = $row['Email'];
	$Phone = $row['Phone'];
	$Type = $row['Type'];
	$Address = $row['Address'];
	$City = $row['City'];
	$State = $row['State'];
	$Country = $row['Country'];
	$Website = $row['Website'];
	$Inv = $row['Investment'];

	$q = "SELECT * FROM st_addetails WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Stage = $row['Stage'] == "" ? '--' : $row['Stage'];
	$DOF = $row['DOF'] == "" ? '--' : $row['DOF'];
	$EmpNum = $row['EmpNum']==""? '--':$row['EmpNum'];
	$IncType = $row['IncType']==""? '--':$row['IncType'];
	$LinkedInLink = $row['LinkedIn']==""? '--':$row['LinkedIn'];
	$TwitterLink = $row['Twitter']==""? '--':$row['Twitter'];
	$FBLink = $row['Facebook']==""? '--':$row['Facebook'];
	$InstaLink = $row['Instagram']==""? '--':$row['Instagram'];
	$YTLink = $row['Youtube']==""? '--':$row['Youtube'];

	$q = "SELECT * FROM st_uploads WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$PitchName = $row['PitchName'];
	$PitchExt = $row['PitchExt'];
	$Logo = $row['Logo'];
  $Backimg = $row['BackImg'];

	?>
	<html>
	    <head>
	        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
	        <link rel="stylesheet" href="../css/financial.css" type="text/css">
	        <script src="js/profform.js"></script>
					<title>StartUp Profile - NamanAngels</title>

	    </head>
	    <body>
			<?php require '../include/header/stp_profile.php'; ?>
			<?php require '../include/nav/nav.php'; ?>
	        <div class="container">
	            <div class="main">
				<div class="backimg">

					<?php
							if($Backimg != ""){
								echo "<img src=".$Backimg." />";
							}
							else{
								echo '<div class="back">';
								echo 'Upload a background image!!';
								echo '</div>';
							}
				?>
			</div>
                <div class="sideprof">

                    <div class="upload">
						<div><?= "<img src=".$Logo." />";?></div>
                    </div>
                    <ul class="proflist">
                        <li class="item">Name <span class="value"><?= $Stname?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Stage <span class="value"><?= $Stage?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Industry <span class="value"><?= $Type?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
						<li class="item">Location <span class="value"><?= $Address?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">City <span class="value"><?= $City?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
						<li class="item">State <span class="value"><?= $State?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
						<li class="item">Country <span class="value"><?= $Country?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Founded <span class="value"><?= $DOF?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Employees <span class="value"><?= $EmpNum?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Incorporation Type <span class="value"><?= $IncType?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Website <span class="value"><?= $Website?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li>
							<?php
								$q = "SELECT * FROM current_round WHERE StpID='$id'"; 
								$results = mysqli_query($db, $q);
								if(mysqli_num_rows($results) != 0){
									echo '<form method="post"><button class="b1" name="make_deal">'.$transbtn.'</button></form>';
								}		
							?>
						</li>
                    </ul>
                </div>

                <div class="contact sideprof">

                    <h3>Contact</h3>
					<ul class="proflist">
						<li class="item">Phone :  <span class="value"><?= $Phone?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Email ID : <span class="value"><?= $Email?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                    </ul>

                </div>

				<div class="social sideprof">

                    <h3>Social presence</h3>
					<ul class="proflist">
						<li class="item">LinkedIn <span class="value"><?= $LinkedInLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
						<li class="item">Twitter <span class="value"><?= $TwitterLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
	                    <li class="item">Facebook <span class="value"><?= $FBLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
                    </ul>
                </div>

				<div class="nav">
						<div><a href="index.php?searchquery=<?=$id?>" >Overview</a></div>
						<div><a href="Exec.php?searchquery=<?=$id?>" >Executive summary</a></div>
						<div><a href="Finance.php?searchquery=<?=$id?>" style="color:black;">Financials</a></div>
						<div><a href="Doc.php?searchquery=<?=$id?>" >Documents</a></div>

				</div>

				<div class="summary">
					<div class="databox">
						<h3>Current Funding Round (USD)</h3>

							Detail your stage of funding, the capital you're seeking and your pre-money valuation.<br><br>
							<?php
								$q = "SELECT * FROM current_round"; 
								$results = mysqli_query($db, $q);
								while($row = mysqli_fetch_assoc($results)){
									if($row['StpID'] == $id){
										echo '<span style="float:left">Round</span><span style="float:right">'.$row['Round'].'</span><br/><hr>';
										echo '<span style="float:left">Seeking</span><span style="float:right">$ '.$row['Seeking'].'</span><br/><hr>';
										echo '<span style="float:left"></span>Security Type<span style="float:right">'.$row['Security_type'].'</span><br/><hr>';
										if($row['Security_type'] == 'Preferred Equity' || $row['Security_type'] == 'Common Equity'){
											echo '<span style="float:left">Premoney Valuation</span><span style="float:right">$ '.$row['Premoney_val'].'</span><br/><hr>';
										}
										if($row['Security_type'] == 'Convertible Notes'){
											echo '<span style="float:left">Valuation Capital</span><span style="float:right">'.$row['Val_cap'].'</span><br/><hr>';
											echo '<span style="float:left">Conversion discount</span><span style="float:right">'.$row['Conversion_disc'].' %</span><br/><hr>';
											echo '<span style="float:left">Interest Rate</span><span style="float:right">'.$row['Interest_rate'].' %</span><br/><hr>';
											echo '<span style="float:left">Term Length</span><span style="float:right">'.$row['Term_len'].' Months</span><br/><hr>';
										}
										// echo '<button class="btnfund" onclick="clroundon()">Close Funding Round</button>';
									}
								}
								// $q = "SELECT * FROM current_round WHERE StpID='$id'"; 
								// $results = mysqli_query($db, $q);
								// if(mysqli_num_rows($results)== 0){
								// 	echo '<button class="btnfund" onclick="roundon()">Open Funding Round</button>';
								// }
							?>
					</div>
					<div class="databox">
						<h3>Funding History (USD)</h3><br>
						<?php
							$q= "SELECT * FROM round_history WHERE StpID = '$id';";
							$results = mysqli_query($db, $q);
							while($row=mysqli_fetch_assoc($results)){
								echo '<span style="float:left">Round</span><span style="float:right">'.$row['Round'].'</span><br/><hr>';
								echo '<span style="float:left"></span>Security Type<span style="float:right">'.$row['Security_type'].'</span><br/><hr>';
								echo '<span style="float:left">Capital raised</span><span style="float:right">$ '.$row['Capital_raised'].'</span><br/><hr>';
								echo '<span style="float:left">Close Date</span><span style="float:right">'.$row['Close_date'].'</span><br/><hr style="height:1px; background-color:black;">';
							}
						?>	
					</div>
					<div class="databox">
						<h3>Annual Financials (USD)</h3>
						<div class="p2">
						</div>
						<p>Enter your financials for this year and last year, as well as projections for the following three years.</p>
						<p>Investors like to compare and evaluate financial performance over this timeframe, so do your best to complete it.</p>
					<?php
						$y=date("Y");
						$q = "SELECT revenue_rate,burn_rate FROM annual_financial WHERE StpId='$id' AND year= '$y' "; 
						$results = mysqli_query($db, $q);
						$row=mysqli_fetch_array($results);
						$revrr= $row[0];
						$mbr= $row[1];
					?>
						<pre>Annual Revenue Run Rate: <?=$revrr?>                        Monthly Burn Rate: <?=$mbr?><pre>
							<table>
								<td>Year</td>
								<?php
									$q = "SELECT year FROM annual_financial WHERE StpID='$id'"; 
									$result = mysqli_query($db, $q);
									$storeArray = Array();
									$x=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$storeArray[] =  $row['year'];  
										echo '<td>'.$storeArray[$x++].'</td>';
									}	
								?>
								</tr>
								<tr>
								<td>Sales $</td>
								<?php
									$q = "SELECT sales FROM annual_financial WHERE StpID='$id'"; 
									$result = mysqli_query($db, $q);
									$storeArray = Array();
									$x=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$storeArray[] =  $row['sales'];  
										echo '<td>'.$storeArray[$x++].'</td>';
									}	
								?>
								</tr>
								<tr>
								<td>Revenue $</td>
								<?php
									$q = "SELECT revenue FROM annual_financial WHERE StpID='$id'"; 
									$result = mysqli_query($db, $q);
									$storeArray = Array();
									$x=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$storeArray[] =  $row['revenue'];  
										echo '<td>'.$storeArray[$x++].'</td>';
									}	
								?>
								</tr>
								<tr>
								<td>Expenditure $</td>
								<?php
									$q = "SELECT expenditure FROM annual_financial WHERE StpID='$id'"; 
									$result = mysqli_query($db, $q);
									$storeArray = Array();
									$x=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$storeArray[] =  $row['expenditure'];  
										echo '<td>'.$storeArray[$x++].'</td>';
									}	
								?>
								</tr>
								<tr>
								<td>Profit $</td>
								<?php
									$yr= date("Y") -2;
									for($i=0;$i<6;$i++){
										$q = "SELECT revenue,expenditure FROM annual_financial WHERE StpID='$id' AND year='$yr'"; 
										$result = mysqli_query($db, $q);
										$row = mysqli_fetch_array($result);
										$prof=$row[0]-$row[1];
										$yr=$yr+1;
										echo '<td>'.$prof.'</td>';
									}	
								?>
								</tr>
							</table>
					</div>
				</div>

				</div>
			<?php require "../../../include/footer/footer.php" ?>
        </div>

    </body>
</html>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
