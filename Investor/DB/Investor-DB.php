<?php

	require 'server.php';

	// $_SESSION['username'] = 'abc123';//predefine -- nikalo mujhe
	$u = $_SESSION['username'];
	$qu = "SELECT * FROM user_inv WHERE Username='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['Fname'];
	$lname = $row['Lname'];
	$web = $row['Website'];
	$country = $row['Country'];
	$phone = $row['Phone'];
	$email = $row['Email'];

	$q = "SELECT * FROM inv_overview WHERE Username='$u'";
  	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$ioi = $row['IndustryOfInterest']==""? '--':$row['IndustryOfInterest'] ;
	$basedin = $row['BasedIn']==""? '--':$row['BasedIn'];
	$TSF = $row['TotalStartupFunded']==""? '--':$row['TotalStartupFunded'];
	$recfund = $row['RecentFunding']==""? '--':$row['RecentFunding'];
	$fbl = 	$row['FBLink']==""? '--':$row['FBLink'] ;
	$twl = 	$row['TwitterLink']==""? '--':$row['TwitterLink'] ;
	$linkl = $row['LinkedIn']==""? '--':$row['LinkedIn'] ;
	$summ =  $row['Summary']==""? 'Tell the world who you are and what makes your investment special.':$row['Summary'] ;
	$gname =  $row['GrpName']==""? 'Enter Your Group Affiliation':$row['GrpName'] ;
	$gdes =  $row['GrpDesignation']==""? 'Enter Your Designation in the Group':$row['GrpDesignation'] ;
	$gexp = $row['GrpExperience']==""? 'Write a few words about your experience with the group':$row['GrpExperience'] ;
	$piname =  $row['PIName']==""? 'Enter Your Investment Name ':$row['PIName'] ;
	$piurl = $row['PIUrl']==""? 'Enter Your Investment\'s Website ':$row['PIUrl'] ;
	$Image = $row['Image'];


	if(isset($_POST["IB"]))
	{

		$ibfname = mysqli_real_escape_string($db, $_POST['fname']);
		$iblname = mysqli_real_escape_string($db, $_POST['lname']);
		$ibioi = mysqli_real_escape_string($db, $_POST['ioi']);
		$ibbasedin = mysqli_real_escape_string($db, $_POST['basedin']);
		$ibcountry = mysqli_real_escape_string($db, $_POST['country']);
		$ibTSF = mysqli_real_escape_string($db, $_POST['TSF']);
		$ibrecfund = mysqli_real_escape_string($db, $_POST['recfund']);
		$ibweb = mysqli_real_escape_string($db, $_POST['web']);

		if($ibfname != NULL)
		{
			$q = "UPDATE user_inv set Fname='$ibfname' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($iblname != NULL)
		{
			$q = "UPDATE user_inv set Lname='$iblname' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($ibcountry != NULL)
		{
			$q = "UPDATE user_inv set Country='$ibcountry' where Username='$u'";
			mysqli_query($db, $q);
		}

		if($ibweb != NULL)
		{
			$q = "UPDATE user_inv set Web='$ibweb' where Username='$u'";
			mysqli_query($db, $q);
		}

		if($ibioi != NULL)
		{
			$query = "UPDATE inv_overview SET IndustryOfInterest = '$ibioi' where Username = '$u'";
			mysqli_query($db, $query);
		}

		if($ibbasedin != NULL)
		{
			$query = "UPDATE inv_overview SET BasedIn='$ibbasedin' where Username = '$u'";
			mysqli_query($db, $query);
		}
		if($ibioi != NULL)
		{
			$query = "UPDATE inv_overview SET TotalStartupFunded ='$ibTSF' where Username = '$u'";
			mysqli_query($db, $query);
		}
		if($ibioi != NULL)
		{
			$query = "UPDATE inv_overview SET RecentFunding = '$ibrecfund' where Username = '$u'";
			mysqli_query($db, $query);
		}

		$check = getimagesize($_FILES["ibimage"]["tmp_name"]);
	    if($check !== false){
			$image = $_FILES['ibimage']['tmp_name'];
	        $imgContent = addslashes(file_get_contents($image));

			$q = "UPDATE inv_overview set Image='$imgContent' where Username='$u'";
			mysqli_query($db, $q);
		}


		header('location: Investor-DB.php');
	}

	if(isset($_POST["slsave"]))
	{
		$sllinkin = mysqli_real_escape_string($db, $_POST['sllinkin']);
		$sltwit = mysqli_real_escape_string($db, $_POST['sltwit']);
		$slfb = mysqli_real_escape_string($db, $_POST['slfb']);

		if($sllinkin != NULL)
		{
			$q = "UPDATE inv_overview set LinkedIn='$sllinkin' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($sltwit != NULL)
		{
			$q = "UPDATE inv_overview set TwitterLink='$sltwit' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($slfb != NULL)
		{
			$q = "UPDATE inv_overview set FBLink='$slfb' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Investor-DB.php');
	}

	if(isset($_POST["sfsave"]))
	{
		$sfsum = mysqli_real_escape_string($db, $_POST['summmaryform']);

		if($sfsum != NULL)
		{
			$q = "UPDATE inv_overview set Summary='$sfsum' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Investor-DB.php');
	}

	if(isset($_POST["grpsave"]))
	{
		$gpname = mysqli_real_escape_string($db, $_POST['gpname']);
		$gpos = mysqli_real_escape_string($db, $_POST['gpos']);
		$gexp = mysqli_real_escape_string($db, $_POST['gexp']);

		if($gpname != NULL)
		{
			$q = "UPDATE inv_overview set GrpName='$gpname' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($gpos != NULL)
		{
			$q = "UPDATE inv_overview set GrpDesignation='$gpos' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($gexp != NULL)
		{
			$q = "UPDATE inv_overview set GrpExperience='$gexp' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Investor-DB.php');
	}

	if(isset($_POST["pisave"]))
	{
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piurl = mysqli_real_escape_string($db, $_POST['piurl']);

		if($piname != NULL)
		{
			$q = "UPDATE inv_overview set PIName='$piname' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($piurl != NULL)
		{
			$q = "UPDATE inv_overview set PIUrl='$piurl' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Investor-DB.php');


	}

	if(isset($_POST["searchbtn"]))
	{
		$search = mysqli_real_escape_string($db, $_POST['searchf']);

		$_SESSION['search'] = $search;
		$qu = "SELECT Stname FROM user_st where Stname='$search'";
	  	$results = mysqli_query($db, $qu);
		// while ($row = $results->fetch_assoc()) {
		//     echo $row['Stname']."<br>";
		// }
		if(mysqli_num_rows($results) == 1)
		{
			header('location: Startup-Profile.php');
		}
		else {
			$message = "StartUp Does Not Exist.";
 			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	$transbtn = "Replies";

	$apid = array();
	$apcn = array();
	$transbtn = "Requests";
	$qr = "SELECT * FROM request WHERE inv_name='$u' AND st_approve=1 AND inv_approve=0";
	$req = mysqli_query($db, $qr);
	$reqnum = mysqli_num_rows($req);
	$count = $reqnum;
	while($count >0)
	{
		$row = mysqli_fetch_assoc($req);
		array_push($apid,$row['st_name']);
		$temp = $row['st_name'];
		$qr2 = "SELECT Stname FROM user_st WHERE Username='$temp'";
		$reqt = mysqli_query($db, $qr2);
		$row2 = mysqli_fetch_assoc($reqt);
		array_push($apcn,$row2['Stname']);
		$count = $count-1;
	}

	$deal1 = "Make deal";
	$deal2 = "Make deal";
	$deal3 = "Make deal";
	$deal4 = "Make deal";
	$deal5 = "Make deal";
 //FOR Requests
 	if(isset($_POST['req0'])){
		$deal = "UPDATE request set inv_approve = 1 WHERE st_name = '$apid[0]' AND inv_name = '$u'";
		mysqli_query($db, $deal);
		$deal1 = "Investment Made";
		// echo "<script type='text/javascript'>reqoff();</script>";
		// echo "<script type='text/javascript'>reqon();</script>";
	}
	if(isset($_POST['req1'])){
		$deal = "UPDATE request set inv_approve = 1 WHERE st_name = '$apid[0]' AND inv_name = '$u'";
		mysqli_query($db, $deal);
		$deal2 = "Investment Made";
	}
	if(isset($_POST['req2'])){
		$deal = "UPDATE request set inv_approve = 1 WHERE st_name = '$apid[0]' AND inv_name = '$u'";
		mysqli_query($db, $deal);
		$deal3 = "Investment Made";
	}
	if(isset($_POST['req3'])){
		$deal = "UPDATE request set inv_approve = 1 WHERE st_name = '$apid[0]' AND inv_name = '$u'";
		mysqli_query($db, $deal);
		$deal4 = "Investment Made";
	}
	if(isset($_POST['req4'])){
		$deal = "UPDATE request set inv_approve = 1 WHERE st_name = '$apid[0]' AND inv_name = '$u'";
		mysqli_query($db, $deal);
		$deal5 = "Investment Made";
	}

?>
<html>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css\Investor-DashBoard.css" rel="stylesheet" type="text/css">
	<link href="css\navbar.css" rel="stylesheet" type="text/css">

	<style>
	#req2, #req3, #req4, #req5, #req1{
			display: none;
	}
	</style>

	<script type="text/javascript">
	function showreqs(n)
	{
			var arr=["req1", "req2", "req3", "req4", "req5"];
			for(i = 0; i < n; i++){
					document.getElementById(arr[i]).style.display = "Block";
			}
	}
	</script>

	<script src="js/profform.js"></script>
	<title><?= $fname?>'s DashBoard</title>
</head>
<body>
	<!-- <div class="container"> -->
	<div class="topnav">
		<div class="nop"> </div>
		<div class="nop"> </div>
		<div class="topx">
      		<center><a href="index.php"><img src="img/logo3.png" style="height:50px;width:135px; margin: 5px;"></a></center>
   		</div>
		<div class="nofull"> </div>
		<div class="toplout">
		</div>
		<div class="toplout">
			<br>
			<center>
			 <a href="index.php">LOGOUT</a>
			</center>
		</div>
		<div class="nop"> </div>
	</div>

		<div class="main">
			<!-- <div class="overview">
				<p>Your Overview is unpublished.</p>
				<p>To publish your overview in Naman's searchable directory of companies, go to your <a href="#">Account Settings</a>. When published, investor members from groups on Gust can request access to your full profile. You can still submit directly to investor groups without being published.</p>
			</div> -->
			<div class="backimg">
				<div class="bg">
					<div class="uploadbg">
						<?= "Welcome ".$fname." ".$lname?>
					</div>
				</div>
			</div>
			<div class="sideprof">
				<div class="upload">
					<div class="pen">
						<button class="pencil" onclick="on()"><i class="fa fa-pencil"></i></button>
					</div>
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
					<li>
					<button class="sidebutn b1" onclick="reqon();showreqs(<?= $reqnum ?>)"><?= $transbtn." (".$reqnum.")"?></button></li>
				</ul>
			</div>
			<div class="social">
				<button class="pencil" onclick="socialon()"><i class="fa fa-pencil"></i></button>
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
				<button class="pencil" onclick="contacton()"><i class="fa fa-pencil"></i></button>
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
			<div id="overlay">
				<div class="compbasics">
					<form class="profform" method='POST' enctype="multipart/form-data">
						<button class="close" onclick="off()"><i class="fa fa-close"></i></button>
						<div class="i1">
							<h2>Investor Basics</h2>
							<p>Add your company name, basic information about yourself.</p>
							<hr>
						</div>
						<div class="i2">
							<label for="ibimage">Investor Image</label><br>
							<input name="ibimage" type="file">
						</div>
						<div class="i2">
							<label for="fname">Investor First Name</label><br>
							<input name="fname" placeholder="<?= $fname?>"type="text">
						</div>
						<div class="i2">
							<label for="lname">Investor Last Name</label><br>
							<input name="lname" placeholder="<?= $lname?>" type="text">
						</div>
						<div class="i3">
							<label for="ioi">Industry Of Interest</label><br>
							<input name="ioi" placeholder="<?= $ioi?>" type="text">
						</div>
						<div class="i5">
							<label for="basedin">Based In</label><br>
							<input name="basedin" placeholder="<?= $basedin?>" type="text">
						</div>
						<div class="i6">
							<label for="country">Country</label><br>
							<input name="country"  placeholder="<?= $country?>" type="text">
						</div>
						<div class="i7">
							<label for="TSF">Total StartUp Funded</label><br>
							<input name="TSF" placeholder="<?= $TSF?>" type="number">
						</div>
						<div class="i8">
							<label for="recfund">Recent Funding</label><br>
							<input name="recfund" placeholder="<?= $recfund?>" type="text">
						</div>

						<div class="i9">
							<label for="web">Investor Website</label><br>
							<input name="web" placeholder="<?= $web?>" type="text">
						</div>
						<div class="butn">
							<button class="cancel" onclick="off()">Cancel</button> <button class="save" name="IB" action="Investor-DB.php" method=post>Save</button>
						</div>
					</form>
				</div>
			</div>
			<div class="nav">
				<div class="overv">Overview</div>
				<div class="search-container">
				    <form action="Investor-DB.php" method='POST'>
						<input type="text" placeholder="Search StartUp" name="searchf" required>
						<button type="submit" name='searchbtn'><i class="fa fa-search"></i></button>
				    </form>
				</div>
			</div>
			<div class="summary">
				<div class="summaryip"><button class="pencil" onclick="summon()"><i class="fa fa-pencil"></i></button>
				<h3>Investor Summary</h3>
				<?= $summ?>
				<br><br><br><br>

				<hr>
				<div class="team">
					<button class="pencil" onclick="teamon()"><i class="fa fa-pencil"></i></button>
					<h3>Group</h3>
						<b>Group Name</b> <br>  <?= $gname?><br><br>
						<b>Group Designation</b> <br>   <?= $gdes?><br><br>
						<b>Group Experience</b> <br> <?= $gexp?><br><br>
						<br><br>
					<hr>
				</div>


				<div class="inv">
					<button class="pencil" onclick="invon()"><i class="fa fa-pencil"></i></button>
					<h3>Most Profitable Investment</h3>
					<b>Startup Name</b><br><?= $piname?><br><br>
					<b>Startup Website</b> <br> <?= $piurl?><br><br>
					<br><br>
					<hr>
				</div>
			</div>
			<div id="sumformov">
				<div class="form">
					<div class="formhead">
						<button class="close" onclick="summoff()"><i class="fa fa-close"></i></button>
						<h3>Investor Summary</h3>
						<p>Add an overview to help startup learn about you. You might like to include your basic interests and values.</p>
					</div>
					<div class="formtext">
						<form method='POST'>
							<div class="formtext">
								<textarea cols="150" name="summmaryform" rows="10"><?= $summ ?></textarea>
							</div>
							<div class="formtext submits">
								<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="sfsave" type="submit" value="Save">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="reqformov">
				<div class="form">
					<div class="formhead">
						<button class="close" onclick="reqoff()"><i class="fa fa-close" ></i></button>
						<center><h2>Requests</h2></center>
					</div>
						<!-- <form method="post"> -->
							<div id="req1">
								<center>
								<p><font style="font-size:24px;font-family:Arial;"><?= $apcn[0] ?></font></p>
								<form method="post"><button name="req0" class="save"><?= $deal1?></button></form>
							</center>
							</div >
							<div id="req2">
								<center>
								<p><font style="font-size:24px;font-family:Arial;"><?= $apcn[1] ?></font></p>
								<form method="post"><button name="req1" class="save"><?= $deal2?></button></form>
							</center>
							</div>
							<div id="req3">
								<center>
								<p><font style="font-size:24px;font-family:Arial;"><?= $apcn[2] ?></font></p>
								<form method="post"><button name="req2" class="save"><?= $deal3?></button></form>
								</center>
							</div>
							<div id="req4">
								<center>
								<p><font style="font-size:24px;font-family:Arial;"><?= $apcn[3] ?></font></p>
								<form method="post"><button name="req3" class="save"><?= $deal4 ?></button></form>
							</center>
							</div>
							<div id="req5">
								<center>
								<p><font style="font-size:24px;font-family:Arial;"><?= $apcn[4] ?></font></p>
								<form method="post"><button name="req4" class="save"><?= $deal5?></button></form>
							</center>
							</div>
				</div>
			</div>
			<div id="socialformov">
				<div class="form">
					<div class="formhead">
						<button class="close" onclick="socialoff()"><i class="fa fa-close"></i></button>
						<h3>Social Presence</h3>
						<p>Add your social media links.</p>
					</div>
					<div class="formtext">
						<form method='POST'>
							<div class="socialic">
								<i class="fa fa-linkedin"><input size="30" type="text" name="sllinkin"></i>
							</div>
							<div class="socialic">
								<i class="fa fa-twitter"><input size="30" type="text" name="sltwit"></i>
							</div>
							<div class="socialic">
								<i class="fa fa-facebook"><input size="30" type="text" name="slfb"></i>
							</div><br>
							<div class="formtext submits">
								<input class="cancel" name="slcancel" type="submit" value="Cancel"> <input class="save" name="slsave" type="submit" value="Save">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="contactform">
				<form class="form" method="POST">
					<div class="formhead">
						<button class="close" onclick="contactoff()"><i class="fa fa-close"></i></button>
						<h3>Contact Information</h3>
						<p>Provide contact information..</p>
					</div>
					<div class="formtext">
						<label for="phone">Phone Number</label><br>
						<input name="phone" size="40" type="text"><br>
						<label for="email">Email</label><br>
						<input name="email" size="40" type="text"><br>
						<br>
						<div class="formtext submits">
							<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="save" type="submit" value="Save">
						</div>
					</div>
				</form>
			</div>
			<div id="profteam">
				<div class="form">
					<div class="formhead">
						<button class="close" onclick="teamoff()"><i class="fa fa-close"></i></button>
						<h3>Group</h3>
					</div>
					<div class="formtext">
						<form method='POST'>
							<label for="gpname">Name</label><br>
							<input name="gpname" type="text"><br>
							<label for="gpos">Designation</label><br>
							<input name="gpos" type="text"><br>
							<label for="gexp">Experience</label><br>
							<textarea cols="3" name="gexp" rows="10"></textarea>

						<div class="formtext submits">
							<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="grpsave" type="submit" value="Save">
						</div>
						</form>
					</div>
				</div>
			</div>
			<div id="inv">
				<div class="form">
					<div class="formhead">
						<button class="close" onclick="invoff()"><i class="fa fa-close"></i></button>
						<h3>Add a Previous Investment</h3>
					</div>
					<div class="formtext">
						<form method="POST">
							<div class="formtext">
								<label>Name</label><br>
								<input size="50" type="text" name="piname"><br>
								<br>
								<label>URL</label><br>
								<input size="50" type="text" name="piurl"><br>
								<br>
							</div>
							<div class="formtext submits">
								<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="pisave" type="submit" value="Save">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require "include/footer/footer.php"?>
</body>
</html>
