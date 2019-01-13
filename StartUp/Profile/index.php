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

	$q = "SELECT * FROM st_description WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Summary = $row['Summary']==""? 'Tell the world who you are and what makes your company special.':$row['Summary'];
	$OLP = $row['OLP']==""? 'Write A Short Pitch For Your Company In One Line':$row['OLP'];


?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <script src="js/profform.js"></script>
		<title>StartUp Profile - NamanAngels</title>
		<style media="screen">

		.databox div video{
			max-height: 300px;
			max-width: 100%;
		}
		</style>

    </head>
    <body>
			<?php require '../include/header/stp_profile.php'; ?>
        <div class="container">
            <div class="main">
            	<div class="backimg">
				<?php
						if($Backimg != ""){
							echo '<img src="data:image/jpeg;base64,'.base64_encode($Backimg).'"/>';
						}
						else{
							echo '<div class="back">';
							echo 'No background image!!';
							echo '</div>';
						}
				?>
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
                    <div><a href="index.php" style="color:black;">Overview</a></div>
                    <div><a href="Exec.php">Executive summary</a></div>
                    <div><a href="Finance.php">Financials</a></div>
                    <div><a href="Doc.php">Documents</a></div>
                </div>
                <div class="summary">
                    <div class="databox">
                        <h3>Company Summary</h3>
						<?php echo $Summary;
							if($Summary == "Tell the world who you are and what makes your company special."){
								echo '<img src="../img/Capture.png">';
							}
						?>
                    </div>
					<div class="databox">
                        <h3>Elevator Pitch</h3>
						<?php echo $OLP;
						?>
                    </div>
                    <div class="databox" style="padding:10px;">
						<h3>Pitch</h3>

						<?php
							if($PitchName == ""){
		                        echo '<label>Increase the impact of your profile by uploading a short pitch</label>';
		                        echo '<br>';
							}
							else{
								$videos_field=$PitchName;
								$video_show= "../../Uploads/$videos_field";

								echo "<div align=center><video controls><source src='$video_show' type='video/$PitchExt'>Your browser does not support the video tag.</video></div>";
							}
						?>
                    </div>
                    <div class="databox">
                        <!-- <button onclick="teamon()" class="pencil"><i class="fa fa-pencil"></i></button> -->
                        <h4>Team</h4>
						<?php
							$q = "SELECT * FROM st_team where StpID = '$id';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Designation</th>";
								echo "<th>Exp(Yrs)</th>";
								echo "<th>Email</th>";
								echo "<th>LinkedIn</th>";

								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["TFName"].'&nbsp;'.$row["TLName"].'</td>';
									echo '<td>'.$row["TDsgn"].'</td>';
									echo '<td>'.$row['TExp'].'</td>';
									echo '<td>'.$row['TEmail'].'</td>';
									echo '<td>'.$row['TLinkedIn'].'</td>';

									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/prof.png">';
							}
						?>

                    </div>
                    <div class="databox">
                        <h4>Advisors</h4>
						<?php
							$q = "SELECT * FROM st_advisors where StpID = '$id';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Email</th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["CAName"].'</td>';
									echo '<td>'.$row['CAEmail'].'</td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/prof.png">';
							}
						?>
                    </div>
                    <div class="databox">
                        <h4>Previous Investors</h4>
						<?php
							$q = "SELECT * FROM st_previnvestment where StpID = '$id';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Email</th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["PIName"].'</td>';
									echo '<td>'.$row['PIEmail'].'</td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/prof.png">';
							}
						?>
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