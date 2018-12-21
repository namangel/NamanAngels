<?php
	require '../../server.php';
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$u = "";
	if (isset($_GET['searchquery'])) {
		$u = $_GET['searchquery'];
	}

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
	$PitchName = $row['PitchName'];
	$PitchExt = $row['PitchExt'];
	$OLP = $row['OLP']==""? '--':$row['OLP'];
	$Logo = $row['Logo'];

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <script src="js\profform.js"></script>
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
                        <h3>Company Summary</h3>
						<?php echo $Summary;
							if($Summary == "Tell the world who you are and what makes your company special."){
								echo '<img src="../img/Capture.png">';
							}
						?>
                    </div>
                    <div class="databox" style="padding:10px;">
						<h3>Pitch</h3>
						<?php
							if($PitchName == ""){
		                        echo 'The StartUp Has Not Uploaded Any Pitch';
							}
							else{
								$videos_field=$PitchName;
								$video_show= "../../Uploads/$videos_field";

								echo "<div align=center><video max-height='500px' controls><source src='$video_show' type='video/$PitchExt'>Your browser does not support the video tag.</video></div>";
							}
						?>
                    </div>
                    <div class="databox">
                        <h4>Team</h4>
						<?php
							$q = "SELECT * FROM st_teams where Username='$u';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Phone</th>";
								echo "<th>Experience</th>";
								echo "<th>Email</th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["TName"].'</td>';
									echo '<td>'.$row['TPhone'].'</td>';
									echo '<td>'.$row['TExp'].'</td>';
									echo '<td>'.$row['TEmail'].'</td>';
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
							$q = "SELECT * FROM st_advisors where Username='$u';";
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
							$q = "SELECT * FROM st_previnvestment where Username='$u';";
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
