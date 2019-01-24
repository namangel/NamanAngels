<?php
	require '../../server.php';
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$u = "";
	if (isset($_GET['searchquery'])) {
		$u = $_GET['searchquery'];
	}

		$invu = $_SESSION['username'];

	$qu = "SELECT * FROM user_st WHERE Username='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$uname = $row['Username'];
	$ID = $row['ID'];
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
	$Sfname = $row['Sfname'];
	$Email = $row['Email'];
	$Type = $row['Type'];
	$Country = $row['Country'];
	$State = $row['State'];
	$City = $row['City'];
	$Website = $row['Website'];
	$Inv = $row['Inv'];
	$Phone = $row['Phone'];
	$Password = $row['Password'];

	$q = "SELECT * FROM st_overview WHERE Username='$u';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Stage = $row['Stage'] == "" ? '--' : $row['Stage'];
	$DOF = $row['DOF'] == "" ? '--' : $row['DOF'];
	$EmpNum = $row['EmpNum']==""? '--':$row['EmpNum'];
	$IncType = $row['IncType']==""? '--':$row['IncType'];
	$LinkedInLink = $row['LinkedInLink']==""? '--':$row['LinkedInLink'];
	$TwitterLink = $row['TwitterLink']==""? '--':$row['TwitterLink'];
	$FBLink = $row['FBLink']==""? '--':$row['FBLink'];
	$Summary = $row['Summary']==""? 'Tell the world who you are and what makes your company special.':$row['Summary'];
	$OLP = $row['OLP']==""? '--':$row['OLP'];
	$Logo = $row['Logo'];

	$qu = "SELECT * FROM st_exec WHERE Username='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);

	$Username = $row['Username'];
	$MTeam = $row['MTeam'];
	$CProb = $row['CProb'];
	$ProdSer = $row['ProdSer'];
	$TarMar = $row['TarMar'];
	$BModel = $row['BModel'];
	$CSegments = $row['CSegments'];
	$SMStrat = $row['SMStrat'];
	$Competitors = $row['Competitors'];
	$CompAdv = $row['CompAdv'];

	$transbtn = "Invest";

	$qr = "SELECT * FROM request WHERE inv_name='$invu' AND st_name='$u'";
	$req = mysqli_query($db, $qr);
	if (mysqli_num_rows($req) == 1)
	{
		$row1 = mysqli_fetch_assoc($req);
		$deal = $row1['deal'];
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
			$q = "INSERT into request(inv_name,st_name) values ('$invu','$u')";
			mysqli_query($db, $q);
		}

		header('location: Exec.php?searchquery='.$uname);
	}

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
						<font style="font-size:30px;"><?= $Stname?></font>
				</div>
				<div class="sideprof">
					<div class="upload">
						<div><?= '<img src="data:image/jpeg;base64,'.base64_encode($Logo).'"/>';?></div>
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
						<li class="item">Location <span class="value"><?= $City.", ".$State.", ".$Country?></span></li>
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
						<li><form method="post"><button class="b1" name="make_deal"><?= $transbtn?></button></form></li>
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
				<div class="nav">
                    <div><a href="Overview.php?searchquery=<?=$u?>">Overview</a></div>
                    <div><a href="Exec.php?searchquery=<?=$u?>">Executive summary</a></div>
                    <div><a href="Finance.php?searchquery=<?=$u?>">Financials</a></div>
                    <div><a href="Doc.php?searchquery=<?=$u?>">Documents</a></div>
                </div>
				<div class="summary">
					<div class="databox">
						<h3>Management Team</h3>
						<p>Who are the members of your management team and how will their experience aid in your success?</p>
						<div><?php echo $MTeam ?></div>
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
