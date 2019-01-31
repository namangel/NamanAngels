<?php
	require '../../server.php';

	$id = $_SESSION['StpID'];
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

	$qu = "SELECT * FROM st_description WHERE StpID = '$id';";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);

	// $MTeam = $row['MTeam'];
	$CProb = $row['CustomerProblem'];
	$ProdSer = $row['ProductService'];
	$TarMar = $row['TargetMarket'];
	$BModel = $row['BusinessModel'];
	// $Market = $row['Market'];
	$CSegments = $row['CustomerSegments'];
	$SMStrat = $row['SaleMarketStrat'];
	$Competitors = $row['Competitors'];
	$CompAdv = $row['CompAdvantage'];


?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <script src="js\profform.js"></script>
		<title>StartUp Profile - NamanAngels</title>

	    </head>
    <body>
	<?php require '../include/header/stp_profile.php'; ?>
		<div class="container">
            <div class="main">
			<div class="backimg">

				<?php
						if($Backimg != ""){
							echo "<img src=".$Backimg." />";
						}
						else{
							echo '<div class="back">';
							echo 'No a background image!!';
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
					<div><a href="index.php">Overview</a></div>
					<div><a href="Exec.php" style="color:black;">Executive summary</a></div>
					<div><a href="Finance.php">Financials</a></div>
					<div><a href="Doc.php">Documents</a></div>

				</div>

				<div class="summary">
					<div class="databox">

						<h3>Management Team</h3>
						<p>Who are the members of your management team and how will their experience aid in your success?</p>
						<div>
							<!-- //MTeam -->
						</div>
					</div>
					<div class="databox">

						<h3>Customer Problem</h3>
						<p>What customer problem does your product and/or service solve?</p>
						<div><?php echo $CProb ?></div>

					</div>
					<div class="databox">

						<h3>Products & Services</h3>
						<p>Describe the product or service that you will sell and how it solves the customer problem, listing the main value proposition for each product/service.</p>
						<div><?php echo $ProdSer?></div>
					</div>
					<div class="databox">

						<h3>Target Market</h3>
						<p>Define the important geographic, demographic, and/or psychographic characteristics of the market within which your customer segments exist.</p>
						<div><?php echo $TarMar?></div>

					</div>
					<div class="databox">

						<h3>Business Model</h3>
						<p>What strategy will you employ to build, deliver, and retain company value (e.g., profits)?</p>

						<div><?php echo $BModel?></div>
					</div><script>
					function marketon() {
					    document.getElementById("market").style.display = "block";
					}

					function marketoff() {
					    document.getElementById("market").style.display = "none";
					}
					</script>

					<div class="databox">

						<h3>Market Sizing</h3>
						<p>Estimate and realize the potential of you Market.</p>
						<div><?php echo $BModel?></div>
					</div>

					<div class="databox">

						<h3>Customer Segments</h3>
						<p>Outline your targeted customer segments. These are the specific subsets of your target market that you will focus on to gain traction.</p>
						<div><?php echo $CSegments?></div>
					</div>
					<div class="databox">

						<h3>Sales & Marketing Strategy</h3>
						<p>What is your customer acquisition and retention strategy? Detail how you will promote, sell and create customer loyalty for your products and services.</p>
						<div><?php echo $SMStrat?></div>
					</div>
					<div class="databox">

						<h3>Competitors</h3>
						<p>Describe the competitive landscape and your competitors strengths and weaknesses. If direct competitors don't exist, describe the existing alternatives.</p>
						<div><?php echo $Competitors?></div>
					</div>
					<div class="databox">

						<h3>Competitive Advantage</h3>
						<p>What is your company's competitive or unfair advantage? This can include patents, first mover advantage, unique expertise, or proprietary processes/technology.</p>
						<div><?php echo $CompAdv?></div>
					</div>
				</div>

		</div>
<?php require "../../include/footer/footer.php" ?>
	    </div>

    </body>
</html>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
