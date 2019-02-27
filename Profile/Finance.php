<?php
	require '../server.php';

	$id = $_GET['s'];
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



		if(isset($_SESSION['InvID'])){
			$invid = $_SESSION['InvID'];
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
				header('location: index.php?s='.$id);
			}
		}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title><?= $Stname ?>'s Profile- Finance | NAMAN</title>
  		<link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
	<style>
		/* .annual_table{
		width: 100%;
		border: 2px solid silver;
		border-collapse: collapse;
		padding: 10px 10px 10px 10px;
		}
		.annual_table td{
		width: 100%;
		border: 2px solid silver;
		border-collapse: collapse;
		padding: 10px 10px 10px 10px;
		} */
		.LinkedIn, .Facebook, .Twitter, .Instagram, .Others{
			display: none;
			margin-bottom: 10px;
		}
		.annual_table{
			width: 100%;
			border: 2px solid silver;
			border-collapse: collapse;
			padding: 10px 10px 10px 10px;
		}
		.annual_table td{
			width: 100%;
			border: 2px solid silver;
			border-collapse: collapse;
			padding: 10px 10px 10px 10px;
		}

		.formfin{
		/* display: grid; */
		/* grid-template-rows:1fr 2fr; */
		justify-items: center;
		align-items: center;
		width: 500px;
		margin: 100px auto;
		background-color: #eee;
		padding: 50px;
		box-sizing: border-box;
		}
		.formtextfin {
		/* grid-row:2; */
		max-width: 100%;
		/* height: 100%; */
		width: 400px;
		}
		.formheadfin {
		/* grid-row:1; */
		width: 400px;
		}
	</style>
	<link rel="stylesheet" href="css/companyprof.css" type="text/css">
	<link rel="stylesheet" href="css/financial.css" type="text/css">
    </head>
    <body>
		<?php include('header.php') ?>
        <div class="container">
            <div class="main">
			<div class="backimg">
				<?php
						if($Backimg != ""){
							echo "<img src='../".$Backimg."' />";
						}
				?>
			</div>
                <div class="sideprof">
                    <div class="upload">
						<div><?= "<img src='../".$Logo."' />";?></div>
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
                        <li><button class="b1" name="requestbtn" onclick="window.open('generateonepager.php?op=<?= $id?>','_blank')">Download One Pager</button></li>
						<?php
							if(isset($_SESSION['InvID'])){
								$q = "SELECT * FROM current_round WHERE StpID='$id'";
								$results = mysqli_query($db, $q);
								if(mysqli_num_rows($results) != 0){
									echo '<li><form method="post"><button class="b1" name="make_deal">'.$transbtn.'</button></form></li>';
								}
								else{
									echo '<li><p>Funding Round closed. Invest when open.</p></li>';
								}
							}
						?>
                    </ul>
                </div>
				<div class="nav">
                    <div><a href="index.php?s=<?= $id?>" style="color:black;">Overview</a></div>
                    <div><a href="Exec.php?s=<?= $id?>">Executive summary</a></div>
                    <div><a href="Finance.php?s=<?= $id?>">Financials</a></div>
                    <div><a href="Doc.php?s=<?= $id?>">Documents</a></div>
                </div>

				<div class="summary">
					<center><i class="fa fa-lock icsize">Only NamanAngels users who have been granted access can view this content.</i></center>
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

									}
								}
							?>
					</div>
					<div class="databox">
						<h3>Funding History (USD)</h3><br>
						<?php
							$q= "SELECT * FROM round_history WHERE StpID = '$id';";
							$results = mysqli_query($db, $q);
							while($row=mysqli_fetch_assoc($results)){
								echo '<br>';
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
						$q = "SELECT revenue_rate,burn_rate,revenue_driver FROM annual_financial WHERE StpId='$id' AND year= '$y' ";
						$results = mysqli_query($db, $q);
						$row=mysqli_fetch_array($results);
						$revrr= $row[0];
						$mbr= $row[1];
						$revdr= $row[2];
					?>
						<h4>Annual Revenue Run Rate: <?=$revrr?></h4>
						<h4>Monthly Burn Rate: <?=$mbr?></h4>
							<table class="annual_table">
								<td class="annual_head">Year</td>
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
								<td class="annual_head"><?=$revdr?> $</td>
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
								<td class="annual_head">Revenue $</td>
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
									<td class="annual_head">Expenditure $</td>
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
								<td class="annual_head">Profit $</td>
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
			<?php require "../include/footer/footer.php" ?>
        </div>

    </body>
</html>
