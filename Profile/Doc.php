<?php
	require '../server.php';

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
	$BPlan = $row['BPlan'];
	$BPlanExt = $row['BPlanExt'];
	$FProjection = $row['FProjection'];
	$FProjectionExt = $row['FProjectionExt'];
	$AdDocs = $row['AdDocs'];
	$AdDocsExt = $row['AdDocsExt'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/companyprof.css" type="text/css">
		<title>StartUp Profile - NamanAngels</title>
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
						<li><button class="b1" name="requestbtn" onclick="">Download One Pager</button></li>
	                </ul>
	            </div>

				<div class="nav">
	                <div><a href="index.php">Overview</a></div>
	                <div><a href="Exec.php">Executive summary</a></div>
	                <div><a href="Finance.php">Financials</a></div>
					<div><a href="Doc.php" style="color:black;">Documents</a></div>
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
