<?php
	require('../../server.php');
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
	$CAdvName = $row['CAdvName']==""? '--':$row['CAdvName'];
	$CAdvEmail = $row['CAdvEmail']==""? '--':$row['CAdvEmail'];
	$PIName = $row['PIName']==""? '--':$row['PIName'];
	$PIEmail = $row['PIEmail']==""? '--':$row['PIEmail'];
	$OLP = $row['OLP']==""? '--':$row['OLP'];
	$Logo = $row['Logo'];

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
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <link rel="stylesheet" href="../css/financial.css" type="text/css">
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
                        <li><button class="b1" name="requestbtn" onclick="reqon();showreqs(<?= $reqnum ?>)"><?=$transbtn."  ( ".$reqnum." ) " ?></button></li>
                    </ul>
                </div>
                <div class="social">
                    <h3>Social presence</h3>
                    <li class="item" style="list-style: none; display: inline">LinkedIn :  <span class="value"><?= $LinkedInLink?></span></li>
                    <li style="list-style: none; display: inline">
                        <hr>
                    </li>
                    <li class="item" style="list-style: none; display: inline">Twitter : <span class="value"><?= $TwitterLink?></span></li>
                    <li style="list-style: none; display: inline">
                        <hr>
                    </li>
                    <li class="item" style="list-style: none; display: inline">Facebook : <span class="value"><?= $FBLink?></span></li>
                    <li style="list-style: none; display: inline">
                        <hr>
                    </li>
                </div>
                <div class="contact">
                    <h3>Contact</h3>
                    <li class="item" style="list-style: none; display: inline">Phone :  <span class="value"><?= $Phone?></span></li>
                    <li style="list-style: none; display: inline">
                        <hr>
                    </li>
                    <li class="item" style="list-style: none; display: inline">Email ID : <span class="value"><?= $Email?></span></li>
                    <li style="list-style: none; display: inline">
                        <hr>
                    </li>
                </div>
								<div class="nav">
									<div><a href="Overview.php">Overview</a></div>
									<div><a href="Exec.php">Executive summary</a></div>
									<div><a href="Finance.php" style="color:black;">Financials</a></div>
									<div><a href="Doc.php">Documents</a></div>
								</div>
								<div class="summary">
									<center><i class="fa fa-lock icsize">Only NamanAngels users who have been granted access can view this content.</i></center>
									<div class="databox">
										<h3>Current Funding Round (USD)</h3>
										  Detail your stage of funding, the capital you're seeking and your pre-money valuation.<br><br>
									</div>
									<div class="databox">
										<h3>Funding History (USD)</h3><br>
										  Please add any previous funding rounds.
									</div>
									<div class="databox">
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
        </div>

    </body>
</html>
