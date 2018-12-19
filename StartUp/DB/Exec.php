<?php
	require '../../server.php';
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$u = $_SESSION['username'];

	$qu = "SELECT * FROM user_st WHERE Username='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
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


	if(isset($_POST["cbsave"])){
		$cbname = mysqli_real_escape_string($db, $_POST['cbname']);
		$cbstage = mysqli_real_escape_string($db, $_POST['cbstage']);
		$cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
		$cbstate = mysqli_real_escape_string($db, $_POST['cbstate']);
		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
		$cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
		$cbempnum = mysqli_real_escape_string($db, $_POST['cbempnum']);
		$cbinc = mysqli_real_escape_string($db, $_POST['cbinc']);
		$cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);


		if($cbname != "")
		{
			$q = "UPDATE user_st set Stname='$cbname' where Username='$u';";
			mysqli_query($db, $q);
		}

		if($cbstage != 'Select Stage')
		{
			$q = "UPDATE st_overview set Stage='$cbstage' where Username='$u';";
			mysqli_query($db, $q);
		}

		if($cbcity != "")
		{
			$q = "UPDATE user_st set City='$cbcity' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbstate != "")
		{
			$q = "UPDATE user_st set State='$cbstate' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbcountry != "")
		{
			$q = "UPDATE user_st set Country='$cbcountry' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbdate != "")
		{
			$q = "UPDATE st_overview set DOF='$cbdate' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbempnum != "")
		{
			$q = "UPDATE st_overview set EmpNum='$cbempnum' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbinc != 'Select Incorporation')
		{
			$q = "UPDATE st_overview set IncType='$cbinc' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbweb != "")
		{
			$q = "UPDATE user_st set Website='$cbweb' where Username='$u';";
			mysqli_query($db, $q);
		}

		$check = getimagesize($_FILES["cblogo"]["tmp_name"]);
	    if($check !== false){
			$image = $_FILES['cblogo']['tmp_name'];
	        $imgContent = addslashes(file_get_contents($image));

			$q = "UPDATE st_overview set Logo='$imgContent' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: Overview.php');
	}

	if(isset($_POST["sfsave"])){
		$sftwitter = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$sflinkedin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sffacebook = mysqli_real_escape_string($db, $_POST['sffacebook']);

		if($sftwitter != "")
		{
			$q = "UPDATE st_overview set TwitterLink='$sftwitter' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($sflinkedin != "")
		{
			$q = "UPDATE st_overview set LinkedInLink='$sflinkedin' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($sffacebook != "")
		{
			$q = "UPDATE st_overview set FBLink='$sffacebook' where Username='$u';";
			mysqli_query($db, $q);
		}
		header('location: Overview.php');
	}

	if(isset($_POST["cfsave"])){
		$cfphone = mysqli_real_escape_string($db, $_POST['cfphone']);
		$cfemail = mysqli_real_escape_string($db, $_POST['cfemail']);

		if($cfphone != "")
		{
			$q = "UPDATE user_st set Phone='$cfphone' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cfemail != "")
		{
			$q = "UPDATE user_st set Email='$cfemail' where Username='$u';";
			mysqli_query($db, $q);
		}
		header('location: Overview.php');
	}


	$rid = array();
	$rfn = array();
	$rln = array();
	$transbtn = "Requests";
	$qr = "SELECT * FROM request WHERE st_name='$u' AND st_approve = 0";
	$req = mysqli_query($db, $qr);
	$reqnum = mysqli_num_rows($req);
	$count = $reqnum;
	// $row = mysqli_fetch_assoc($req);
	// $rname1 = $row['inv_name'];
	// $row = mysqli_fetch_assoc($req);
	// $rname2 = $row['inv_name'];
	while($count >0)
	{
		$row = mysqli_fetch_assoc($req);
		array_push($rid,$row['inv_name']);
		$temp = $row['inv_name'];
		$qr2 = "SELECT Fname,Lname FROM user_inv WHERE Username='$temp';";
		$reqt = mysqli_query($db, $qr2);
		$row2 = mysqli_fetch_assoc($reqt);
		array_push($rfn,$row2['Fname']);
		array_push($rln,$row2['Lname']);
		$count = $count-1;
	}
 //FOR Requests
 	if(isset($_POST['req0'])){
		$_SESSION['search'] = $rid[0];
		header('location: Investor-Profile.php');
	}
	if(isset($_POST['req1'])){
		$_SESSION['search'] = $rid[1];
		header('location: Investor-Profile.php');
	}
	if(isset($_POST['req2'])){
		$_SESSION['search'] = $rid[2];
		header('location: Investor-Profile.php');
	}
	if(isset($_POST['req3'])){
		$_SESSION['search'] = $rid[3];
		header('location: Investor-Profile.php');
	}
	if(isset($_POST['req4'])){
		$_SESSION['search'] = $rid[4];
		header('location: Investor-Profile.php');
	}
?>



<?php
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


	if(isset($_POST["mtsave"])){
		$MTeam = mysqli_real_escape_string($db, $_POST['manageform']);

		$q = "UPDATE st_exec SET MTeam='$MTeam' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["cprobsave"])){
		$CProb = mysqli_real_escape_string($db, $_POST['custform']);

		$q = "UPDATE st_exec SET CProb='$CProb' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["pssave"])){
		$ProdSer = mysqli_real_escape_string($db, $_POST['prodser']);

		$q = "UPDATE st_exec SET ProdSer='$ProdSer' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["tmsave"])){
		$TarMar = mysqli_real_escape_string($db, $_POST['TarMar']);

		$q = "UPDATE st_exec SET TarMar='$TarMar' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["bmsave"])){
		$BModel = mysqli_real_escape_string($db, $_POST['BModel']);

		$q = "UPDATE st_exec SET BModel='$BModel' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["cssave"])){
		$CSegments = mysqli_real_escape_string($db, $_POST['CSegments']);

		$q = "UPDATE st_exec SET CSegments='$CSegments' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}

	if(isset($_POST["smssave"])){
		$SMStrat = mysqli_real_escape_string($db, $_POST['SMStrat']);

		$q = "UPDATE st_exec SET SMStrat='$SMStrat' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["compsave"])){
		$Competitors = mysqli_real_escape_string($db, $_POST['Competitors']);

		$q = "UPDATE st_exec SET Competitors='$Competitors' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}
	if(isset($_POST["cadvsave"])){
		$CompAdv = mysqli_real_escape_string($db, $_POST['CompAdv']);

		$q = "UPDATE st_exec SET CompAdv='$CompAdv' WHERE Username='$u';";
		mysqli_query($db, $q);

		header('location: Exec.php');
	}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <script src="js\profform.js"></script>
				<style media="screen">
					.container{
						height: 1200px;
					}
				</style>
    </head>
    <body>
		<?php require '../include/header/stp_db.php'; ?>
		<?php require '../include/nav/nav.php'; ?>
		<div class="container">
            <div class="main">
				<div class="backimg">
						<font style="font-size:30px;"><?= $Stname?></font>
				</div>
				<div class="sideprof">
					<div class="pen">
						<button class="pencil" onclick="on()"><i class="fa fa-pencil"></i></button>
						<br>
					</div>
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
						<li><button class="b1" name="requestbtn" onclick="reqon();showreqs(<?= $reqnum ?>)"><?=$transbtn."  ( ".$reqnum." ) " ?></button></li>
					</ul>
				</div>
				<div class="social sideprof">
					<button class="pencil" onclick="socialon()"><i class="fa fa-pencil"></i></button>
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
					<button class="pencil" onclick="contacton()"><i class="fa fa-pencil"></i></button>
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
				<div id="overlay">
				  <div class="compbasics">
				      <form class="profform" method="post" action='Exec.php' enctype="multipart/form-data">
				          <button class="close" onclick="off()"><i class="fa fa-close"></i></button>
				          <div class="i1">
				              <h2>Company Basics</h2>
				              <p>Add your company name, elevator pitch, and other basic information about your company.</p>
				              <hr>
				          </div>
				          <div class="i2">
				              <label for="cblogo">Company Logo</label><br>
				              <input name="cblogo" type="file">
				          </div>
				          <div class="i2">
				              <label for="name">Company Name</label><br>
				              <input name="cbname" type="text" placeholder="<?= $Stname?>">
				          </div>
				          <div class="i4">
				              <label for="stage">Company Stage</label><br>
				              <select name="cbstage" placeholder="<?= $Stage?>">
				                  <option>Select Stage</option>
				                  <option>Concept Only</option>
				                  <option>Product in Development</option>
				                  <option>Prototype ready</option>
				                  <option>Full Product Ready</option>
				                  <option>$500K in TTM Revenue</option>
				                  <option>$1M in TTM Revenue</option>
				                  <option>$5M in TTM Revenue</option>
				                  <option>$10M in TTM Revenue</option>
				                  <option>$20M in TTM Revenue</option>
				                  <option>$50M in TTM Revenue</option>
				                  <option>$50M+ in TTM Revenue</option>
				              </select>
				          </div>
				          <div class="i5">
				              <label for="cbcity">City</label><br>
				              <input name="cbcity" type="text"placeholder="<?= $City?>">
				          </div>
				          <div class="i5">
				              <label for="cbstate">State</label><br>
				              <input name="cbstate" type="text" placeholder="<?= $State?>">
				          </div>
				          <div class="i5">
				              <label for="cbcountry">Country</label><br>
				              <input name="cbcountry" type="text" placeholder="<?= $Country?>">
				          </div>
				          <div class="i7">
				              <label for="cbdate">Founding Date</label><br>
				              <input name="cbdate" type="text" placeholder="<?= $DOF?>" onfocus="(this.type='date')">
				          </div>
				          <div class="i8">
				              <label for="cbempnum">Number of Employees</label><br>
				              <input name="cbempnum" type="number" placeholder="<?= $EmpNum?>">
				          </div>
				          <div class="i3">
				              <label for="inc">Incorporation Type</label><br>
				              <select name="cbinc" placeholder="<?= $IncType?>">
				                  <option><?= $IncType?></option>
				                  <option>Not Incorporated</option>
				                  <option>C-corp</option>
				                  <option>S-corp</option>
				                  <option>B-corp</option>
				                  <option>LLC</option>
				                  <option>Other</option>
				              </select>
				          </div>
				          <div class="i9">
				              <label for="cbweb">Company Website</label><br>
				              <input name="cbweb" type="text" placeholder="<?= $Website?>">
				          </div>
				          <div class="butn">
				              <button class="cancel" onclick="off()">Cancel</button> <button class="save" name="cbsave">Save</button>
				          </div>
				      </form>
				  </div>
				</div>
				<div class="nav">
					<div><a href="Overview.php">Overview</a></div>
					<div><a href="Exec.php" style="color:black;">Executive summary</a></div>
					<div><a href="Finance.php">Financials</a></div>
					<div><a href="Doc.php">Documents</a></div>
				</div>
				<div id="socialformov">
					<div class="form">
						<div class="formhead">
							<button class="close" onclick="socialoff()"><i class="fa fa-close"></i></button>
							<h3>Social Presence</h3>
							<p>Add your company's social media links.</p>
						</div>
						<div class="formtext">
							<form method="post">
								<div class="socialic">
									<i class="fa fa-linkedin"></i><input size="30" type="text" name="sflinkedin">
								</div>
								<div class="socialic">
									<i class="fa fa-twitter"></i><input size="30" type="text" name="sftwitter">
								</div>
								<div class="socialic">
									<i class="fa fa-facebook"></i><input size="30" type="text" name="sffacebook">
								</div><br>
								<div class="formtext submits">
									<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="sfsave" type="submit" value="Save">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id="contactform">
					<form class="form" method="post">
						<div class="formhead">
							<button class="close" onclick="contactoff()"><i class="fa fa-close"></i></button>
							<h3>Contact Information</h3>
							<p>Provide contact information for your company.</p>
						</div>
						<div class="formtext">
						<label for="cfphone">Phone Number</label><br>
							<input name="cfphone" size="40" type="text"><br>
							<label for="cfemail">Email</label><br>
							<input name="cfemail" size="40" type="email"><br>
							<br>
							<div class="formtext submits">
								<input class="cancel" name="cancel" type="submit" value="Cancel"> <input class="save" name="cfsave" type="submit" value="Save">
							</div>
						</div>
					</form>
				</div>
				<div class="summary">
					<div class="databox">
						<button onClick="ovon()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Management Team</h3>
						<p>Who are the members of your management team and how will their experience aid in your success?</p>
						<div><?php echo $MTeam ?></div>
					</div>
					<div class="databox">
						<button onClick="custon()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Customer Problem</h3>
						<p>What customer problem does your product and/or service solve?</p>
						<div><?php echo $CProb ?></div>

					</div>
					<div class="databox">
						<button onClick="producton()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Products & Services</h3>
						<p>Describe the product or service that you will sell and how it solves the customer problem, listing the main value proposition for each product/service.</p>
						<div><?php echo $ProdSer?></div>
					</div>
					<div class="databox">
						<button onClick="targeton()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Target Market</h3>
						<p>Define the important geographic, demographic, and/or psychographic characteristics of the market within which your customer segments exist.</p>
						<div><?php echo $TarMar?></div>

					</div>
					<div class="databox">
						<button onClick="bussion()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Business Model</h3>
						<p>What strategy will you employ to build, deliver, and retain company value (e.g., profits)?</p>
						<div><?php echo $BModel?></div>
					</div>
					<div class="databox">
						<button onClick="segson()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Customer Segments</h3>
						<p>Outline your targeted customer segments. These are the specific subsets of your target market that you will focus on to gain traction.</p>
						<div><?php echo $CSegments?></div>
					</div>
					<div class="databox">
						<button onClick="saleson()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Sales & Marketing Strategy</h3>
						<p>What is your customer acquisition and retention strategy? Detail how you will promote, sell and create customer loyalty for your products and services.</p>
						<div><?php echo $SMStrat?></div>
					</div>
					<div class="databox">
						<button onClick="compon()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Competitors</h3>
						<p>Describe the competitive landscape and your competitors strengths and weaknesses. If direct competitors don't exist, describe the existing alternatives.</p>
						<div><?php echo $Competitors?></div>
					</div>
					<div class="databox">
						<button onClick="advon()" class="pencil"><i class="fa fa-pencil"></i></button>
						<h3>Competitive Advantage</h3>
						<p>What is your company's competitive or unfair advantage? This can include patents, first mover advantage, unique expertise, or proprietary processes/technology.</p>
						<div><?php echo $CompAdv?></div>
					</div>
				</div>
				<div class="exe">
	                <div id="overly">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="ovoff()" class="close"><i class="fa fa-close"></i></button>
	                                <h3>Management Team</h3>
	                                <p>Who are the members of your management team and how will their experience aid in your success?
	                                </p>
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75" name="manageform"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="mtsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="cust" >
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                               <button onClick="custoff()" class="close"><i class="fa fa-close"></i></button>
			                            <h3>Customer Problem</h3>
			    						What customer problem does your product and/or service solve?
			                        </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75" name="custform"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="cprobsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="product">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="productoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Products & Services</h3>
								    	Describe the product or service that you will sell and how it solves the customer problem, listing the main value proposition for each product/service.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="prodser"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="pssave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="target">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="targetoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Target Market</h3>
								Define the important geographic, demographic, and/or psychographic characteristics of the market within which your customer segments exist.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75" name="TarMar"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="tmsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="bussi">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="bussioff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Business Model</h3>
								What strategy will you employ to build, deliver, and retain company value (e.g., profits)?
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="BModel"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="bmsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="segs">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="segsoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Customer Segments</h3>
								Outline your targeted customer segments. These are the specific subsets of your target market that you will focus on to gain traction.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="CSegments"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="cssave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="sales">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="salesoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Sales & Marketing Strategy</h3>
								What is your customer acquisition and retention strategy? Detail how you will promote, sell and create customer loyalty for your products and services.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="SMStrat"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="smssave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="comp">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="compoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Competitors</h3>
								Describe the competitive landscape and your competitors' strengths and weaknesses. If direct competitors don't exist, describe the existing alternatives.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="Competitors"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="compsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
					<div id="adv">
	                    <div id="manageform">
	                        <div class="form">
	                            <div class="formhead">
	                                <button onClick="advoff()" class="close"><i class="fa fa-close"></i></button>
	                            <h3>Competitive Advantage</h3>
	    							What is your company's competitive or unfair advantage? This can include patents, first mover advantage, unique expertise, or proprietary processes/technology.
	                            </div>
	                            <div class="formtext">
	                                <form method="post">
	                                    <div class="formtext"><textarea autofocus rows="10" cols="75"name="CompAdv"></textarea></div>
	                                    <div class="formtext submits">
	                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
	                                        <input type="submit" value="Save" name="cadvsave" class="save">
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
	                  	</div>
					</div>
				</div>
	        </div>
<?php require "../../include/footer/footer.php" ?>
	    </div>

    </body>
</html>
