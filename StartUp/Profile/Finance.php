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
	// $CAdvName = $row['CAdvName']==""? '--':$row['CAdvName'];
	// $CAdvEmail = $row['CAdvEmail']==""? '--':$row['CAdvEmail'];
	// $PIName = $row['PIName']==""? '--':$row['PIName'];
	// $PIEmail = $row['PIEmail']==""? '--':$row['PIEmail'];
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

		header('location: StartUp-DB.php');
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
		header('location: StartUp-DB.php');
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
		header('location: StartUp-DB.php');
	}

	if(isset($_POST['sumsave'])){
		$summaryform = mysqli_real_escape_string($db, $_POST['summaryform']);
		$q = "UPDATE st_overview set Summary='$summaryform' where Username='$u';";
		mysqli_query($db, $q);

		header('location: StartUp-DB.php');
	}

	if(isset($_POST['casave'])){
		$caname = mysqli_real_escape_string($db, $_POST['caname']);
		$caemail = mysqli_real_escape_string($db, $_POST['caemail']);
		if($caname !="")
		{
			$q = "UPDATE st_overview set CAdvName='$caname' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($caemail !="")
		{
			$q = "UPDATE st_overview set CAdvEmail='$caemail' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: StartUp-DB.php');
	}

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piemail = mysqli_real_escape_string($db, $_POST['piemail']);
		if($piname !="")
		{
			$q = "UPDATE st_overview set PIName='$piname' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($piemail !="")
		{
			$q = "UPDATE st_overview set PIEmail='$piemail' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: StartUp-DB.php');
	}

	if(isset($_POST['olpsave'])){
		$olpnew = mysqli_real_escape_string($db, $_POST['olpform']);
		if($olpnew !="")
		{
			$q = "UPDATE st_overview set OLP='$olpnew' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: StartUp-DB.php');
	}


	$rid = array();
	$rfn = array();
	$rln = array();
	$transbtn = "Requests";
	$qr = "SELECT * FROM request WHERE st_name='$u' AND st_approve = 0";
	$req = mysqli_query($db, $qr);
	$reqnum = mysqli_num_rows($req);
	$count = $reqnum;
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
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <link rel="stylesheet" href="../css/financial.css" type="text/css">
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
                        <form class="profform" method="post" action='StartUp-DB.php' enctype="multipart/form-data">
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
									<div><a href="Exec.php">Executive summary</a></div>
									<div><a href="Finance.php" style="color:black;">Financials</a></div>
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
									<center><i class="fa fa-lock icsize">Only NamanAngels users who have been granted access can view this content.</i></center>
									<div class="databox">
										<h3>Current Funding Round (USD)</h3>
										  Detail your stage of funding, the capital you're seeking and your pre-money valuation.<br><br>
										  <button class="btnfund">Open Funding Round</button>
									</div>
									<div class="databox">
										<button class="pencil"><i class="fa fa-pencil "></i></button>
										<h3>Funding History (USD)</h3><br>
										  Please add any previous funding rounds.
									</div>
									<div class="databox">
										<button class="pencil"><i class="fa fa-pencil"></i></button>
										<h3>Annual Financials (USD)</h3>
										<div class="p2">
										</div>
										<p>Enter your financials for this year and last year, as well as projections for the following three years.</p>
										<p>Investors like to compare and evaluate financial performance over this timeframe, so do your best to complete it.</p>
									</div>
									<div class="databox">
										<pre>Annual Revenue Run Rate --                        Monthly Burn Rate --<pre>
											<table>
											  <tr>
												<td>         </td>
											  </tr>
											  <tr>
												<td>Revenue Driver</td>
											  </tr>
											  <tr>
												<td>Revenue $</td>
											  </tr>
											  <tr>
												<td>Expenditure $</td>
											  </tr>
											  <tr>
												<td>Profit (Loss) $</td>
											  </tr>
											</table>
									</div>
								</div>
            </div>
			<?php require "../../include/footer/footer.php" ?>
        </div>

    </body>
</html>
