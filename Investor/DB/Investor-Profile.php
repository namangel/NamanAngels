<?php
	require 'server.php';
	// $_SESSION['search'] = 'abc123';//predefine -- nikalo mujhe
	$su = $_SESSION['search'];
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$u = $_SESSION['username'];

	$qu = "SELECT * FROM user_inv WHERE Username='$su'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['Fname'];
	$lname = $row['Lname'];
	$web = $row['Website'];
	$country = $row['Country'];
	$phone = $row['Phone'];
	$email = $row['Email'];

	$q = "SELECT * FROM inv_overview WHERE Username='$su'";
  	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$ioi = $row['IndustryOfInterest']==""? '--':$row['IndustryOfInterest'] ;
	$basedin = $row['BasedIn']==""? '--':$row['BasedIn'];
	$TSF = $row['TotalStartupFunded']==""? '--':$row['TotalStartupFunded'];
	$recfund = $row['RecentFunding']==""? '--':$row['RecentFunding'];
	$fbl = 	$row['FBLink']==""? '--':$row['FBLink'] ;
	$twl = 	$row['TwitterLink']==""? '--':$row['TwitterLink'] ;
	$linkl = $row['LinkedIn']==""? '--':$row['LinkedIn'] ;
	$summ =  $row['Summary']==""? 'The Investor has not written about himself till date':$row['Summary'] ;
	$gname =  $row['GrpName']==""? '--':$row['GrpName'] ;
	$gdes =  $row['GrpDesignation']==""? '--':$row['GrpDesignation'] ;
	$gexp = $row['GrpExperience']==""? '--':$row['GrpExperience'] ;
	$piname =  $row['PIName']==""? '--':$row['PIName'] ;
	$piurl = $row['PIUrl']==""? '-- ':$row['PIUrl'] ;
	$Image = $row['Image'];

	$transbtn = "Approve Investment";

	$qr = "SELECT * FROM request WHERE inv_name='$su' AND st_name='$u'";
	$req = mysqli_query($db, $qr);
	if (mysqli_num_rows($req) == 1)
	{
		$row = mysqli_fetch_assoc($req);
		$iapp = $row['inv_approve'];
		$sapp = $row['st_approve'];
		if($iapp == 0 && $sapp == 1)
		{
			$transbtn = "Approval Sent";
		}
		if($iapp == 1 && $sapp == 1)
		{
			$transbtn = "Investment Taken";
			// $qdel = "DELETE FROM request WHERE inv_name='$u' AND st_name='$su'";
			// mysqli_query($db, $qdel);
		}
	}


	if(isset($_POST["st-to-inv"]))
	{
		// echo "INSIDE";
		// $qr = "SELECT * FROM request WHERE inv_name='$su' AND st_name='$u'";
		// $req = mysqli_query($db, $qr);
		if (mysqli_num_rows($req) == 1)
		{
			$row = mysqli_fetch_assoc($req);
			$iapp = $row['inv_approve'];
			$sapp = $row['st_approve'];
			if($iapp == 0 && $sapp == 0)
			{
				$q = "UPDATE request set st_approve = 1 WHERE inv_name='$su' AND st_name='$u'";
				mysqli_query($db, $q);
			}

		header('location: Investor-Profile.php');
		}
	}

?>

<html>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css\Investor-DashBoard.css" rel="stylesheet" type="text/css">
	<link href="css\navbar.css" rel="stylesheet" type="text/css">
	</script>
	<title><?= $fname?>'s Profile</title>
</head>
<body>

	<div class="topnav">
		<div class="nop"> </div>
		<div class="topx">
      		<center><a href="index.php"><img src="img/logo3.png" style="height:50px;width:135px; margin: 5px;"></a></center>
   		</div>
		<div class="nofull"> </div>
		<div class="toplout">
			<br>
			<center>
			 <a href="StartUp-DB.php">DASHBOARD</a>
			</center>
		</div>
		<div class="toplout">
			<br>
			<center>
			 <a href="index.php">LOGOUT</a>
			</center>
		</div>
		<div class="nop"> </div>
	</div>

	<div class="container">

		<div class="main">
			<!-- <div class="overview">
				<p>Your Overview is unpublished.</p>
				<p>To publish your overview in Naman's searchable directory of companies, go to your <a href="#">Account Settings</a>. When published, investor members from groups on Gust can request access to your full profile. You can still submit directly to investor groups without being published.</p>
			</div> -->
			<div class="backimg">
				<div class="bg">
					<div class="uploadbg">
						<?= "Welcome to ".$fname." ".$lname."'s Profile"?>
					</div>
				</div>
			</div>
			<div class="sideprof">
				<div class="upload">
					<div><?= '<img src="data:image/jpeg;base64,'.base64_encode($Image).'"/>';?></div>
				</div>
				<ul class="proflist">
					<li class="item">Name <span class="value"><?= $fname." ".$lname?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Industry of Interest <span class="value"><?= $ioi?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Based In<span class="value"><?= $basedin?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Country <span class="value"><?= $country?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Total StartUp Funded <span class="value"><?= $TSF ?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Recent Funding <span class="value"><?= $recfund?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li class="item">Website <span class="value"><?= $web?></span></li>
					<li style="list-style: none; display: inline">
						<hr>
					</li>
					<li><form method="post"><button class="sidebutn b1" name="st-to-inv"><?= $transbtn ?></button></form></li>
				</ul>
			</div>
			<div class="social">
				<h3>Social presence</h3>

				<li class="item" style="list-style: none; display: inline">LinkedIn : <span class="value"><?= $linkl?></span></li>
				<li style="list-style: none; display: inline">
					<hr>
				</li>
				<li class="item" style="list-style: none; display: inline">Twitter : <span class="value"><?= $twl?></span></li>
				<li style="list-style: none; display: inline">
					<hr>
				</li>
				<li class="item" style="list-style: none; display: inline">Facebook : <span class="value"><?= $fbl?></span></li>
				<li style="list-style: none; display: inline">
					<hr>
					</li>
			</div>
			<div class="contact">

				<h3>Contact</h3>
				<li class="item" style="list-style: none; display: inline">Phone No : <span class="value"><?= $phone?></span></li>
				<li style="list-style: none; display: inline">
					<hr>
				</li>
				<li class="item" style="list-style: none; display: inline">E-Mail : <span class="value"><?= $email?></span></li>
				<li style="list-style: none; display: inline">
					<hr>
				</li>
			</div>
			<div class="nav">
				<div class="overv">
					Overview
				</div>
			</div>
			<div class="summary">
				<h3>Investor Summary</h3>
				<?= $summ?>
				<br><br><br><br>

				<hr>
				<div class="team">
					<h3>Group</h3>
						<b>Group Name</b> <br>  <?= $gname?><br><br>
						<b>Group Designation</b> <br>   <?= $gdes?><br><br>
						<b>Group Experience</b> <br> <?= $gexp?><br><br>
						<br><br>
					<hr>
				</div>
				<div class="inv">
					<h3>Most Profitable Investment</h3>
					<b>Startup Name</b><br><?= $piname?><br><br>
					<b>Startup Website</b> <br> <?= $piurl?><br><br>
					<br><br>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<?php require "include/footer/footer.php"?>
</body>
</html>
