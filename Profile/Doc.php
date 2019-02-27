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
	$BPlan = $row['BPlan'];
	$BPlanExt = $row['BPlanExt'];
	$FProjection = $row['FProjection'];
	$FProjectionExt = $row['FProjectionExt'];
	$AdDocs = $row['AdDocs'];
	$AdDocsExt = $row['AdDocsExt'];



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
        <link rel="stylesheet" href="css/companyprof.css" type="text/css">
		<title><?= $Stname ?>'s Profile- Documents | NAMAN</title>
  		<link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
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
					<div class="databox">
						<?php
							if($BPlan == ""){
		                        echo '<h3>Business Plan</h3>';
								echo 'No File Found';
							}
							else{
								echo '<h3>Business Plan</h3>';
								echo '<iframe src="../'.$BPlan.'" height=500px width=100%></iframe>';
							}
						?>
					</div>
					<div class="databox">
						<?php
							if($FProjection == ""){
		                        echo '<h3>Financial Projections</h3>';
		                        echo 'No File Found';
							}
							else{
								echo '<h3>Financial Projections</h3>';
								echo '<iframe src="../'.$FProjection.'" height=500px width=100%></iframe>';
							}
						?>
	    			</div>
					<div class="databox">
						<?php
							if($AdDocs == ""){
		                        echo '<h3>Additional Documents</h3>';
		                        echo 'No File Found';
							}
							else{
								echo '<h3>Additional Documents</h3>';
								echo '<iframe src="../../'.$AdDocs.'" height=500px width=100%></iframe>';
							}
						?>
					</div>
				</div>
			</div>
		<?php include '../include/footer/footer.php'; ?>
        </div>

    </body>
</html>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
