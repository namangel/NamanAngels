<?php
	require '../../server.php';
	if(!isset($_SESSION['StpID'])){
        header('location: ../pageerror.php');
    }

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
	$others = $row['Others']==""? '--':$row['Others'];
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



	if(isset($_POST["cbsave"])){
		$cbname = mysqli_real_escape_string($db, $_POST['cbname']);
		$cbstage = mysqli_real_escape_string($db, $_POST['cbstage']);
		$cbaddress = mysqli_real_escape_string($db, $_POST['cbaddress']);
		$cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
		$cbstate = mysqli_real_escape_string($db, $_POST['cbstate']);
		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
		$cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
		$cbempnum = mysqli_real_escape_string($db, $_POST['cbempnum']);
		$cbinc = mysqli_real_escape_string($db, $_POST['cbinc']);
		$cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);


		if($cbname != "")
		{
			$q = "UPDATE st_details set Stname='$cbname' where StpID='$id';";
			mysqli_query($db, $q);
		}

		if($cbstage != 'Select Stage')
		{
			$q = "UPDATE st_addetails set Stage='$cbstage' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbaddress != "")
		{
			$q = "UPDATE st_details set Address='$cbaddress' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbcity != "")
		{
			$q = "UPDATE st_details set City='$cbcity' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbstate != "")
		{
			$q = "UPDATE st_details set State='$cbstate' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbcountry != "")
		{
			$q = "UPDATE st_details set Country='$cbcountry' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbdate != "")
		{
			$q = "UPDATE st_addetails set DOF='$cbdate' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbempnum != "")
		{
			$q = "UPDATE st_addetails set EmpNum='$cbempnum' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbinc != 'Select Incorporation')
		{
			$q = "UPDATE st_addetails set IncType='$cbinc' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cbweb != "")
		{
			$q = "UPDATE st_details set Website='$cbweb' where StpID='$id';";
			mysqli_query($db, $q);
		}

		$check = getimagesize($_FILES["cblogo"]["tmp_name"]);
	    if($check != false){
			$file_name = $Stname.'_'.$_FILES['cblogo']['name'];
			$file_size = $_FILES['cblogo']['size'];
			$file_tmp = $_FILES['cblogo']['tmp_name'];
			$file_type = $_FILES['cblogo']['type'];
			$file_ext = strtolower(end(explode('.',$_FILES['cblogo']['name'])));

			$extensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$extensions)=== false){
				echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
			}
			else{
				if($file_size > 5242880) {
					echo "<script>alert('File size must be less than 5 MB')</script>";
				}
				else{
					$uploadas = "uploads/startup/".$file_name;
					$upload = "../../uploads/startup/".$file_name;
					if(move_uploaded_file($file_tmp,$upload)){
						$q = "UPDATE st_uploads set Logo='$uploadas' where StpID='$id';";
						mysqli_query($db, $q);
						echo "<script>alert('Successfully Uploaded')</script>";
					}
				}
			}
		}

		header('location:index.php');
	}

	if(isset($_POST["sfsave"])){
		$sftwitter = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$sflinkedin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sffacebook = mysqli_real_escape_string($db, $_POST['sffacebook']);
		$sfinstagram = mysqli_real_escape_string($db, $_POST['sfinstagram']);
		$sfothers = mysqli_real_escape_string($db, $_POST['sfothers']);

		if($sfinstagram != "")
		{
			$q = "UPDATE st_addetails set Instagram='$sfinstagram' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sftwitter != "")
		{
			$q = "UPDATE st_addetails set Twitter='$sftwitter' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sflinkedin != "")
		{
			$q = "UPDATE st_addetails set LinkedIn='$sflinkedin' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sffacebook != "")
		{
			$q = "UPDATE st_addetails set Facebook='$sffacebook' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sfothers != "")
		{
			$q = "UPDATE st_addetails set Others='$sfothers' where StpID='$id';";
			mysqli_query($db, $q);
		}
		header('location:index.php');
	}

	if(isset($_POST["cfsave"])){
		$cfphone = mysqli_real_escape_string($db, $_POST['cfphone']);
		$cfemail = mysqli_real_escape_string($db, $_POST['cfemail']);

		if($cfphone != "")
		{
			$q = "UPDATE st_details set Phone='$cfphone' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($cfemail != "")
		{
			$q = "UPDATE st_details set Email='$cfemail' where StpID='$id';";
			mysqli_query($db, $q);
		}
		header('location:index.php');
	}

	if(isset($_POST['sumsave'])){
		$summaryform = mysqli_real_escape_string($db, $_POST['summaryform']);
		$q = "UPDATE st_description set Summary='$summaryform' where StpID='$id';";
		mysqli_query($db, $q);
		header('location:index.php');
	}

	if(isset($_POST['pitchsub'])){
		$name= $Stname."_pitch_".$_FILES['pitchvid']['name'];
		$tmp_name= $_FILES['pitchvid']['tmp_name'];
		$submitbutton= $_POST['pitchsub'];
		$position= strpos($name, ".");
		$fileextension= substr($name, $position + 1);
		$fileextension= strtolower($fileextension);
		$success= -1;
		if (isset($name)){
			$pathas= 'uploads/startup/'.$name;
			$path= '../../uploads/startup/'.$name;
			if (!empty($name)){
				if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm") && ($fileextension !== "pdf")){
					$success=0;
					echo '<script>alert("The file extension must be .mp4, .ogg, or .webm in order to be uploaded")</script>';
				}
				else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm") || ($fileextension == "pdf")){
					$success=1;
					if (copy($tmp_name, $path)) {
						echo '<script> alert("Uploaded!")</script>';
						$q = "UPDATE st_uploads SET PitchName='$pathas', PitchExt='$fileextension' where StpID='$id';";
						mysqli_query($db, $q);
					}
				}
			}
		}
		header('location:index.php');
	}

	if(isset($_POST['tmsave'])){

		$tmfname = mysqli_real_escape_string($db, $_POST['tmfname']);
		$tmlname = mysqli_real_escape_string($db, $_POST['tmlname']);
		$tmdsgn = mysqli_real_escape_string($db, $_POST['tmdsgn']);
		$tmexp = mysqli_real_escape_string($db, $_POST['tmexp']);
		$tmemail = mysqli_real_escape_string($db, $_POST['tmemail']);
		$tmlinkedin = mysqli_real_escape_string($db, $_POST['tmlinkedin']);

		$q = "INSERT INTO st_team (StpID, FName, LName, Designation, Experience, Email, LinkedIn) VALUES ('$id','$tmfname', '$tmlname', '$tmdsgn', '$tmexp', '$tmemail', '$tmlinkedin')";
		mysqli_query($db, $q);
		header('location:index.php');
	}

	if(isset($_POST['casave'])){
		$caname = mysqli_real_escape_string($db, $_POST['caname']);
		$caemail = mysqli_real_escape_string($db, $_POST['caemail']);

		$q = "INSERT INTO st_advisors (StpID, Name, Email) VALUES ('$id', '$caname', '$caemail');";
		mysqli_query($db, $q);

		header('location:index.php');
	}

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piemail = mysqli_real_escape_string($db, $_POST['piemail']);

		$q = "INSERT INTO st_previnvestment (StpID, Name, Email) VALUES ('$id', '$piname', '$piemail');";
		mysqli_query($db, $q);

		header('location:index.php');
	}

	if(isset($_POST['olpsave'])){
		$olpnew = mysqli_real_escape_string($db, $_POST['olpform']);
		if($olpnew !="")
		{
			$q = "UPDATE st_description set OLP='$olpnew' where StpID='$id';";
			mysqli_query($db, $q);
		}

		header('location:index.php');
    }

    if(isset($_POST['BIsave'])){

		$file_name = $Stname."_backimg_".$_FILES['backimg']['name'];
		$file_size = $_FILES['backimg']['size'];
		$file_tmp = $_FILES['backimg']['tmp_name'];
		$file_type = $_FILES['backimg']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['backimg']['name'])));

		$extensions= array("jpeg","jpg","png");

		if(in_array($file_ext,$extensions)=== false){
			echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
		}
		else{
			if($file_size > 5242880) {
				echo "<script>alert('File size must be less than 5 MB')</script>";
			}
			else{
				$uploadas = "uploads/startup/".$file_name;
				$upload = "../../uploads/startup/".$file_name;
				move_uploaded_file($file_tmp,$upload);
				$q = "UPDATE st_uploads set BackImg='$uploadas' where StpID='$id';";
				mysqli_query($db, $q);
				echo "<script>alert('Successfully Uploaded')</script>";
			}
		}
		header('location:index.php');
	}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
		<title>StartUp Profile - NamanAngels</title>
		<style media="screen">
				.databox div video{
					max-height: 300px;
					max-width: 100%;
				}
				.limit_mem,.limit_adv,.limit_pre{
					color:red;
					display: none;
					font-weight: lighter;
				}
				.member, .advisor, .prev_inv{
					display: none;
				}

				.rem_mem{
					margin-top: 10px;
					border: none;
					background-color: white;
				}

				.rem_adv{
					margin-top: 10px;
					border: none;
					background-color: white;
				}

				.rem_inv{
					margin-top: 15px;
					border: none;
					background-color: white;
				}
				.LinkedIn, .Facebook, .Twitter, .Instagram, .Others{
				display: none;
				margin-bottom: 10px;
				}
		</style>
    </head>
	<script type="text/javascript">
	function social() {
	var x = document.getElementById("soc").value;
	if (x== "Facebook")
	{
		document.getElementById("Facebook").style.display = "block";
	}
	if (x== "LinkedIn")
	{
		document.getElementById("LinkedIn").style.display = "block";
	}
	if (x== "Instagram")
	{
		document.getElementById("Instagram").style.display = "block";
	}
	if (x== "Twitter")
	{
		document.getElementById("Twitter").style.display = "block";
	}
	if (x== "Others")
	{
		document.getElementById("Others").style.display = "block";
	}

}
	<?php
		$q = "SELECT * FROM st_team;";
		$results=mysqli_query($db, $q);
		if (mysqli_num_rows($results) >= 6)
		{
			echo 'function addteamon() {
				document.getElementById("addteam").style.display = "none";
					document.getElementById("limit_mem").style.display = "inline";
			}';
		}
		else{
			echo 'function addteamon() {
				document.getElementById("addteam").style.display = "block";
			}';
		}

		$q = "SELECT * FROM st_advisors;";
		$results=mysqli_query($db, $q);
		if (mysqli_num_rows($results) >= 3)
		{
			echo 'function advon() {
					document.getElementById("adv").style.display = "none";
					document.getElementById("limit_adv").style.display = "inline";
			}';
		}
		else{
			echo 'function advon() {
					document.getElementById("adv").style.display = "block";
			}';
		}

		$q = "SELECT * FROM st_previnvestment;";
		$results=mysqli_query($db, $q);
		if (mysqli_num_rows($results) >= 3)
		{
			echo 'function invon() {
					document.getElementById("inv").style.display = "none";
					document.getElementById("limit_pre").style.display = "inline";
			}';
		}
		else{
			echo 'function invon() {
					document.getElementById("inv").style.display = "block";
				}';
		}


		if(isset($_POST['rem_mem'])){
			$mem_id = mysqli_real_escape_string($db, $_POST['member']);

			$q = "DELETE FROM st_team where ID = $mem_id;";
			mysqli_query($db, $q);

			header('location:index.php');
		}

		if(isset($_POST['rem_adv'])){
			$mem_id = mysqli_real_escape_string($db, $_POST['advisor']);

			$q = "DELETE FROM st_advisors where ID = $mem_id;";
			mysqli_query($db, $q);

			header('location:index.php');
		}

		if(isset($_POST['rem_inv'])){
			$mem_id = mysqli_real_escape_string($db, $_POST['prev_inv']);

			$q = "DELETE FROM st_previnvestment where ID = $mem_id;";
			mysqli_query($db, $q);

			header('location:index.php');
		}
	?>
		function addteamoff() {
				document.getElementById("addteam").style.display = "none";
		}
	</script>
    <body>
		<?php require '../include/header/stp_db.php'; ?>
		<?php require '../include/nav/nav.php'; ?>
        <div class="container">
            <div class="main">
            	<div class="backimg">
					<div>
						<button class="back-button" onclick="backimgon()" >
							<i class="fa fa-camera"></i>
							&nbsp;Upload Background
						</button>
					</div>
					<?php
						if($Backimg != ""){
							echo "<img src='../../".$Backimg."' />";
						}
						else{
							echo '<div class="back">';
							echo 'Upload a background image!!';
							echo '</div>';
						}?>
                </div>
                <div class="sideprof">
					<div class="pen">
						<button class="pencil" onclick="on()">
							<i class="fa fa-pencil"></i>
						</button><br>
					</div>
                    <div class="upload">
                        <div><?= "<img src='../../".$Logo."' />";?></div>
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

				<div class="social sideprof">
                <button class="pencil" onclick="socialon()"><i class="fa fa-pencil"></i></button>
				<h3>Social Presence</h3>
        		<ul class="proflist">
				<?php
					$q = "SELECT * FROM st_addetails WHERE StpID='$id'";
					$results = mysqli_query($db, $q);
					$row = mysqli_fetch_assoc($results);

                    if($row['LinkedIn'] != NULL){

						echo '<li class="item">LinkedIn	 <span class="value">';
						echo $LinkedInLink;
	                    echo '<li style="list-style: none; display: inline"><hr></li>';
				
					}
					if($row['Facebook'] != NULL){

						echo '<li class="item">Facebook	 <span class="value">';
						echo $FBLink;
	                    echo '<li style="list-style: none; display: inline"><hr></li>';
					}
					if($row['Twitter'] != NULL){
		
						echo '<li class="item">Twitter	 <span class="value">';
						echo $TwitterLink;
	                    echo '<li style="list-style: none; display: inline"><hr></li>';
						
					}
					if($row['Instagram'] != NULL){
		
						echo '<li class="item">Instagram	 <span class="value">';
						echo $InstaLink;
						echo '<li style="list-style: none; display: inline"><hr></li>';
						
					}
					if($row['Others'] != NULL){
		
						echo '<li class="item">Others	 <span class="value">';
						echo $others;
	                    echo '<li style="list-style: none; display: inline"><hr></li>';
						
					}
                ?>
            </div>

			    <div id="overlay">
                    <div class="compbasics">
                        <form class="profform" method="post" action='index.php' enctype="multipart/form-data">
                            <button class="close" onclick="off()"><i class="fa fa-close"></i></button>
                            <div class="i1">
                                <h2>Company Basics</h2>
                                <p>Add your company name, elevator pitch, and other basic information about your company.</p>
                                <hr>
                            </div>
                            <div class="i2 tooltip">
                                <label for="cblogo">Company Logo</label><br>
								<input name="cblogo" type="file">
								<span class="tooltiptext">Choose file of type .jpeg, .png, .jpg and size less than 5MB!</span>
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
                                    <option>Early Revenue Stage</option>
                                    <option>Growth Stage</option>
                                </select>
                            </div>
							<div class="i5">
								<label for="cbaddress">Address</label><br>
								<input name="cbaddress" type="text" placeholder="<?= $Address?>">
							</div>
                            <div class="i5">
                                <label for="cbcity">City</label><br>
                                <input name="cbcity" type="text" placeholder="<?= $City?>">
                            </div>
                            <div class="i5">
                                <label for="cbstate">State</label><br>
                                <input name="cbstate" type="text" placeholder="<?= $State?>">
                            </div>
                            <div class="i5">
                                <label for="cbcountry">Country</label><br>
									<select name="cbcountry" required placeholder="<?=$Country?>">
											            <option value="<?= $Country?>"><?= $Country?></option>
											            <option value="Afghanisthan">Afghanisthan</option>
											            <option value="Aland Islands">Aland Islands</option>
											            <option value="Albania">Albania</option>
											            <option value="Algeria">Algeria</option>
											            <option value="American Samoa">American Samoa</option>
											            <option value="Andorra">Andorra</option>
											            <option value="Angola">Angola</option>
											            <option value="Anguilla">Anguilla</option>
											            <option value="Antarctica">Antarctica</option>
											            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
											            <option value="Argentina">Argentina</option>
											            <option value="Armenia">Armenia</option>
											            <option value="Aruba">Aruba</option>
											            <option value="Australia">Australia</option>
											            <option value="Austria">Austria</option>
											            <option value="Azerbaijan">Azerbaijan</option>
											            <option value="Bahamas">Bahamas</option>
											            <option value="Bahrain">Bahrain</option>
											            <option value="Bangladesh">Bangladesh</option>
											            <option value="Barbados">Barbados</option>
											            <option value="Belarus">Belarus</option>
											            <option value="Belgium">Belgium</option>
											            <option value="Belize">Belize</option>
											            <option value="Benin">Benin</option>
											            <option value="Bermuda">Bermuda</option>
											            <option value="Bhutan">Bhutan</option>
											            <option value="Bolivia, Plurinational State">Bolivia, Plurinational State</option>
											            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
											            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
											            <option value="Botswana">Botswana</option>
											            <option value="Bouvet Island">Bouvet Island</option>
											            <option value="Brazil">Brazil</option>
											            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
											            <option value="Brunei Darussalam">Brunei Darussalam</option>
											            <option value="Bulgaria">Bulgaria</option>
											            <option value="Burkina Faso">Burkina Faso</option>
											            <option value="Burundi">Burundi</option>
											            <option value="Cambodia">Cambodia</option>
											            <option value="Cameroon">Cameroon</option>
											            <option value="Canada">Canada</option>
											            <option value="Cape Verde">Cape Verde</option>
											            <option value="Cayman Islands">Cayman Islands</option>
											            <option value="Central African Republic">Central African Republic</option>
											            <option value="Chad">Chad</option>
											            <option value="Chile">Chile</option>
											            <option value="China">China</option>
											            <option value="Christmas Island">Christmas Island</option>
											            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
											            <option value="Colombia">Colombia</option>
											            <option value="Comoros">Comoros</option>
											            <option value="Congo">Congo</option>
											            <option value="Congo, the Democratic Republic">Congo, the Democratic Republic</option>
											            <option value="Cook Islands">Cook Islands</option>
											            <option value="Costa Rica">Costa Rica</option>
											            <option value="C�te d'Ivoire">C�te d'Ivoire</option>
											            <option value="Croatia">Croatia</option>
											            <option value="Cuba">Cuba</option>
											            <option value="Cura�ao">Cura�ao</option>
											            <option value="Cyprus">Cyprus</option>
											            <option value="Czech Republic">Czech Republic</option>
											            <option value="Denmark">Denmark</option>
											            <option value="Djibouti">Djibouti</option>
											            <option value="Dominica">Dominica</option>
											            <option value="Dominican Republic">Dominican Republic</option>
											            <option value="Ecuador">Ecuador</option>
											            <option value="Egypt">Egypt</option>
											            <option value="El Salvador">El Salvador</option>
											            <option value="Equatorial Guinea">Equatorial Guinea</option>
											            <option value="Eritrea">Eritrea</option>
											            <option value="Estonia">Estonia</option>
											            <option value="Ethiopia">Ethiopia</option>
											            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
											            <option value="Faroe Islands">Faroe Islands</option>
											            <option value="Fiji">Fiji</option>
											            <option value="Finland">Finland</option>
											            <option value="France">France</option>
											            <option value="French Guiana">French Guiana</option>
											            <option value="French Polynesia">French Polynesia</option>
											            <option value="French Southern Territories">French Southern Territories</option>
											            <option value="Gabon">Gabon</option>
											            <option value="Gambia">Gambia</option>
											            <option value="Georgia">Georgia</option>
											            <option value="Germany">Germany</option>
											            <option value="Ghana">Ghana</option>
											            <option value="Gibraltar">Gibraltar</option>
											            <option value="Greece">Greece</option>
											            <option value="Greenland">Greenland</option>
											            <option value="Grenada">Grenada</option>
											            <option value="Guadeloupe">Guadeloupe</option>
											            <option value="Guam">Guam</option>
											            <option value="Guatemala">Guatemala</option>
											            <option value="Guernsey">Guernsey</option>
											            <option value="Guinea">Guinea</option>
											            <option value="Guinea-Bissau">Guinea-Bissau</option>
											            <option value="Guyana">Guyana</option>
											            <option value="Haiti">Haiti</option>
											            <option value="eard Island and McDonald Islands">Heard Island and McDonald Islands</option>
											            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
											            <option value="Honduras">Honduras</option>
											            <option value="Hong Kong">Hong Kong</option>
											            <option value="Hungary">Hungary</option>
											            <option value="Iceland">Iceland</option>
											            <option value="India">India</option>
											            <option value="Indonesia">Indonesia</option>
											            <option value="Iran, Islamic Republic">Iran, Islamic Republic</option>
											            <option value="Iraq">Iraq</option>
											            <option value="Ireland">Ireland</option>
											            <option value="Isle of Man">Isle of Man</option>
											            <option value="Israel">Israel</option>
											            <option value="Italy">Italy</option>
											            <option value="Jamaica">Jamaica</option>
											            <option value="Japan">Japan</option>
											            <option value="Jersey">Jersey</option>
											            <option value="Jordan">Jordan</option>
											            <option value="Kazakhstan">Kazakhstan</option>
											            <option value="Kenya">Kenya</option>
											            <option value="Kiribati">Kiribati</option>
											            <option value="Korea, Democratic People's Republic">Korea, Democratic People's Republic</option>
											            <option value="Korea, Republic">Korea, Republic</option>
											            <option value="Kuwait">Kuwait</option>
											            <option value="Kyrgyzstan">Kyrgyzstan</option>
											            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
											            <option value="Latvia">Latvia</option>
											            <option value="Lebanon">Lebanon</option>
											            <option value="Lesotho">Lesotho</option>
											            <option value="Liberia">Liberia</option>
											            <option value="Libya">Libya</option>
											            <option value="Liechtenstein">Liechtenstein</option>
											            <option value="Lithuania">Lithuania</option>
											            <option value="Luxembourg">Luxembourg</option>
											            <option value="Macao">Macao</option>
											            <option value="Macedonia, the former Yugoslav Republic">Macedonia, the former Yugoslav Republic</option>
											            <option value="Madagascar">Madagascar</option>
											            <option value="Malawi">Malawi</option>
											            <option value="Malaysia">Malaysia</option>
											            <option value="Maldives">Maldives</option>
											            <option value="Mali">Mali</option>
											            <option value="Malta">Malta</option>
											            <option value="Marshall Islands">Marshall Islands</option>
											            <option value="Martinique">Martinique</option>
											            <option value="Mauritania">Mauritania</option>
											            <option value="Mauritius">Mauritius</option>
											            <option value="Mayotte">Mayotte</option>
											            <option value="Mexico">Mexico</option>
											            <option value="Micronesia, Federated States">Micronesia, Federated States</option>
											            <option value="Moldova, Republic">Moldova, Republic</option>
											            <option value="Monaco">Monaco</option>
											            <option value="Mongolia">Mongolia</option>
											            <option value="Montenegro">Montenegro</option>
											            <option value="Montserrat">Montserrat</option>
											            <option value="Morocco">Morocco</option>
											            <option value="Mozambique">Mozambique</option>
											            <option value="Myanmar">Myanmar</option>
											            <option value="Namibia">Namibia</option>
											            <option value="Nauru">Nauru</option>
											            <option value="Nepal">Nepal</option>
											            <option value="Netherlands">Netherlands</option>
											            <option value="New Caledonia">New Caledonia</option>
											            <option value="New Zealand">New Zealand</option>
											            <option value="Nicaragua">Nicaragua</option>
											            <option value="Niger">Niger</option>
											            <option value="Nigeria">Nigeria</option>
											            <option value="Niue">Niue</option>
											            <option value="Norfolk Island">Norfolk Island</option>
											            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
											            <option value="Norway">Norway</option>
											            <option value="Oman">Oman</option>
											            <option value="Pakistan">Pakistan</option>
											            <option value="Palau">Palau</option>
											            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
											            <option value="Panama">Panama</option>
											            <option value="Papua New Guinea">Papua New Guinea</option>
											            <option value="Paraguay">Paraguay</option>
											            <option value="Peru">Peru</option>
											            <option value="Philippines">Philippines</option>
											            <option value="Pitcairn">Pitcairn</option>
											            <option value="Poland">Poland</option>
											            <option value="Portugal">Portugal</option>
											            <option value="Puerto Rico">Puerto Rico</option>
											            <option value="Qatar">Qatar</option>
											            <option value="Reunion">Reunion</option>
											            <option value="Romania">Romania</option>
											            <option value="Russian Federation">Russian Federation</option>
											            <option value="Rwanda">Rwanda</option>
											            <option value="Saint Barth�lemy">Saint Barth�lemy</option>
											            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
											            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
											            <option value="Saint Lucia">Saint Lucia</option>
											            <option value="Saint Martin (French part)">Saint Martin (French part)</option>
											            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
											            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
											            <option value="Samoa">Samoa</option>
											            <option value="San Marino">San Marino</option>
											            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
											            <option value="Saudi Arabia">Saudi Arabia</option>
											            <option value="Senegal">Senegal</option>
											            <option value="Serbia">Serbia</option>
											            <option value="Seychelles">Seychelles</option>
											            <option value="Sierra Leone">Sierra Leone</option>
											            <option value="Singapore">Singapore</option>
											            <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
											            <option value="Slovakia">Slovakia</option>
											            <option value="Slovenia">Slovenia</option>
											            <option value="Solomon Islands">Solomon Islands</option>
											            <option value="Somalia">Somalia</option>
											            <option value="South Africa">South Africa</option>
											            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
											            <option value="South Sudan">South Sudan</option>
											            <option value="Spain">Spain</option>
											            <option value="Sri Lanka">Sri Lanka</option>
											            <option value="Sudan">Sudan</option>
											            <option value="Suriname">Suriname</option>
											            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
											            <option value="Swaziland">Swaziland</option>
											            <option value="Sweden">Sweden</option>
											            <option value="Switzerland">Switzerland</option>
											            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
											            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
											            <option value="Tajikistan">Tajikistan</option>
											            <option value="Tanzania">Tanzania</option>
											            <option value="Thailand">Thailand</option>
											            <option value="Timor-Leste">Timor-Leste</option>
											            <option value="Togo">Togo</option>
											            <option value="Tokelau">Tokelau</option>
											            <option value="Tonga">Tonga</option>
											            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
											            <option value="Tunisia">Tunisia</option>
											            <option value="Turkey">Turkey</option>
											            <option value="Turkmenistan">Turkmenistan</option>
											            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
											            <option value="Tuvalu">Tuvalu</option>
											            <option value="Uganda">Uganda</option>
											            <option value="Ukraine">Ukraine</option>
											            <option value="United Arab Emirates">United Arab Emirates</option>
											            <option value="United Kingdom">United Kingdom</option>
											            <option value="United States">United States</option>
											            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
											            <option value="Uruguay">Uruguay</option>
											            <option value="Uzbekistan">Uzbekistan</option>
											            <option value="Vanuatu">Vanuatu</option>
											            <option value="Venezuela, Bolivarian Republic">Venezuela, Bolivarian Republic</option>
											            <option value="Viet Nam">Viet Nam</option>
											            <option value="Virgin Islands, British">Virgin Islands, British</option>
											            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
											            <option value="Wallis and Futuna">Wallis and Futuna</option>
											            <option value="Western Sahara">Western Sahara</option>
											            <option value="Yemen">Yemen</option>
											            <option value="Zambia">Zambia</option>
											            <option value="Zimbabwe">Zimbabwe</option>
											          </select>
                            </div>
                            <div class="i7">
                                <label for="cbdate">Founding Date</label><br>
                                <input name="cbdate" type="date" placeholder="<?= $DOF?>">
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
                                    <option>Proprietorship</option>
                                    <option>Partnership</option>
                                    <option>LLP</option>
                                    <option>Pvt Ltd</option>
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
                    <div><a href="index.php" style="color:black;">Overview</a></div>
                    <div><a href="Exec.php">Executive summary</a></div>
                    <div><a href="Finance.php">Financials</a></div>
                    <div><a href="Doc.php">Documents</a></div>
					<div><a href="Consult.php" target="_blank">Consultancy</a></div>
                </div>
                <div class="summary">
                    <div class="databox">
                        <button onclick="summon()" class="pencil"><i class="fa fa-pencil"></i></button>
                        <h3>Company Summary</h3>
						<?php echo $Summary;
							if($Summary == "Tell the world who you are and what makes your company special."){
								echo '<img src="../img/Paragraph.png">';
							}
						?>
                    </div>
					<div class="databox">
                        <button onclick="olpon()" class="pencil"><i class="fa fa-pencil"></i></button>
                        <h3>Elevator Pitch</h3>
						<?php echo $OLP;
						?>
                    </div>
                    <div class="databox" style="padding:10px;">
						<h3>Pitch</h3>
						<div style="float:right">
							<a href="Consult.php" target="_blank">
								<i class="fa fa-question-circle-o"></i>
								&nbsp;Need help
							</a>
						</div>
						<?php
							if($PitchName == ""){
		                        echo '<label>Increase the impact of your profile by uploading a short pitch</label>';
		                        echo '<br>';
								echo '<form class="pitch" action="index.php" method="post" enctype="multipart/form-data">';
									echo '<input type="file" name="pitchvid">';
									echo '<input type="submit" name="pitchsub" value="Upload">';
									// echo '<div float=right><a href="#"><i class="fa fa-question-circle-o"></i>&nbsp;Need help</a></div>';
								echo '</form>';
							}
							else{
								echo '<form class="pitch" action="index.php" method="post" enctype="multipart/form-data">';
									echo '<input type="file" name="pitchvid">';
									echo '<input type="submit" name="pitchsub" value="Upload">';
									// echo '<div float=right align=right><a href="#"><i class="fa fa-question-circle-o"></i>&nbsp;Need help</a></div>';
								echo '</form>';
								echo "<div align=center><video controls><source src='../../$PitchName' type='video/$PitchExt'>Your browser does not support the video tag.</video></div>";
							}
						?>
                    </div>
                    <div class="databox">
                        <button onclick="addteamon()" class="add"><i class="fa fa-plus"></i></button>
                        <h4>Team	<div class="limit_mem" id="limit_mem">(maximum 6 members can be added!)</div>
						</h4>
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
								echo "<th></th>";

								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["FName"].'&nbsp;'.$row["LName"].'</td>';
									echo '<td>'.$row["Designation"].'</td>';
									echo '<td>'.$row['Experience'].'</td>';
									echo '<td>'.$row['Email'].'</td>';
									echo '<td>'.$row['LinkedIn'].'</td>';
									echo '<td><center><form method="post" action="index.php">
									<input class="member" type="number" name="member" value="'.$row['ID'].'">
									<button name="rem_mem" value="rem_mem" type="submit" class="rem_mem" id="'.$row['ID'].'" onclick="remove_team(this.id)" ><i class="fa fa-minus-circle"></i></button>
									</form></center>
									</td>';
									// echo '<td>
									//  <a name="rem_mem" class="remove" id="'.$row['ID'].'" onclick="remove_team(this.id)" ><i class="fa fa-minus-circle"></i></a>
									//  </td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/Contact.png">';
							}
						?>

                    </div>
                    <div class="databox">
                        <button onclick="advon()" class="add"><i class="fa fa-plus"></i></button>
                        <h4>Advisors <div class="limit_adv" id="limit_adv">(maximum 3 advisors can be added!)</div></h4>
						<?php
							$q = "SELECT * FROM st_advisors where StpID = '$id';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Email</th>";
								echo "<th></th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["Name"].'</td>';
									echo '<td>'.$row['Email'].'</td>';
									echo '<td><center><form method="post" action="index.php">
									<input class="advisor" type="number" name="advisor" value="'.$row['ID'].'">
									<button name="rem_adv" value="rem_adv" type="submit" class="rem_adv"><i class="fa fa-minus-circle"></i></button>
									</form></center>
									</td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/Contact.png">';
							}
						?>
                    </div>
					<div class="databox">
						<button onclick="invon()" class="add"><i class="fa fa-plus"></i></button>
						<h4>Previous Investors <div class="limit_pre" id="limit_pre">(maximum 3 previous investors can be added!)</div></h4>
						<?php
							$q = "SELECT * FROM st_previnvestment where StpID = '$id';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Email</th>";
								echo "<th></th>";
								echo "</th>";
								while($row = mysqli_fetch_assoc($results)) {
									echo '<tr>';
									echo '<td>'.$row["Name"].'</td>';
									echo '<td>'.$row['Email'].'</td>';
									echo '<td><center><form method="post" action="index.php">
									<input class="prev_inv" type="number" name="prev_inv" value="'.$row['ID'].'">
									<button name="rem_inv" value="rem_inv" type="submit" class="rem_inv" ><i class="fa fa-minus-circle"></i></button>
									</form></center>
									</td>';
									echo "</tr>";
								}
								echo '</table>';
							} else {
								echo '<img src="../img/Contact.png">';
							}
						?>
					</div>
					<div class="databox">
                <h4>Investors from NamanAngels</h4>
    			<?php
    				$q = "SELECT * FROM requests where Inv_ID='$id';";
					$results=mysqli_query($db, $q);
	    			if (mysqli_num_rows($results) > 0) {
					echo '<table class="tables">';
					echo "<tr>";
    				echo "<th>Investor Name</th>";
					echo "<th>Status</th>
						<th>Amount</th>
                        <th>Stake holding</th>
                        <th>Investment Date</th>";
					echo "</th>";
				    while($row = mysqli_fetch_assoc($results)) {

						$invid=$row['Inv_ID'];
						$qu = "SELECT CName,FName,LName FROM inv_details where InvID='$invid';";
						$result = mysqli_query($db, $qu);
						$row1= mysqli_fetch_assoc($result);
						echo '<tr>';
						if($row1['CName'] == NULL){
							echo '<td>'.$row1['FName'].'&nbsp'.$row1['LName'].'</td>';
						}
						else{
							echo '<td>'.$row1['CName'].'</td>';
						}
						if($row['Deal'] == 0){
							echo '<td>Interested</td>';
							echo '<td>--</td>';
                            echo '<td>--</td>';
							echo '<td>--</td>';
						}
						if($row['Deal'] == 1){
							echo '<td>Invested</td>';
							echo '<td>'.$row['Amount'].'</td>';
                            echo '<td>'.$row['Stakehold'].'%</td>';
                            echo '<td>'.$row['Date'].'</td>';
						}
						echo "</tr>";
				    }
					echo '</table>';
					}
					else{
						echo '<div style="float:right;"><a href="Consult.php" target="_blank"><i class="fa fa-question-circle-o"></i>&nbsp;Need help</a></div>';
						echo '<p>Ramp up your profile</p>';
					}
				?>
            </div>
                </div>
                <div id="backimg">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="backimgoff()" class="close"><i class="fa fa-close"></i></button>
							<h3>Background Image</h3>
                        </div>
                        <div class="formtext">
                            <form method="post" action='index.php' enctype="multipart/form-data">
                                <div class="formtext"><input type="file" name="backimg"><br><br>Choose file of type .jpeg, .png, .jpg and size less than 5MB!</div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="backimgoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="BIsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="sumformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="summoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Company Summary</h3>
                            <p>Add an overview to help investors evaluate your startup. You might like to include your business model, structure and products/services. (upto 500 words)</p>
								<a href="Consult.php" target="_blank"><i class="fa fa-question-circle-o"></i>&nbsp;Need help</a>
                        </div>
                        <div class="formtext">
                            <form method="post">
								<div class="formtext"><textarea rows="10" cols="150" name="summaryform" id="summ" required><?= $Summary?></textarea></div>
								<script>
									function check_words(e) {
										var BACKSPACE   = 8;
										var DELETE      = 127;
										var MAX_WORDS   = 500;
										var valid_keys  = [BACKSPACE, DELETE];
										var words       = this.value.split(' ');

										if (words.length >= 500 && valid_keys.indexOf(e.keyCode) == -1) {
											e.preventDefault();
											words.length = 500;
											this.value = words.join(' ');
										}
									}
									var textarea = document.getElementById('summ');
									textarea.addEventListener('keydown', check_words);
									textarea.addEventListener('keyup', check_words);
								</script>
								<div class="formtext submits">
	                                <input type="submit" onclick="summoff()"value="Cancel" name="cancel" class="cancel">
	                                <input type="submit" value="Save" name="sumsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				<div id="olpformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="olpoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Elevator Pitch</h3>
                            <p>Add A Short Pitch For Your Company In One Line (upto 50 words)</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext"><textarea rows="10" cols="150" name="olpform" id="pitch" required><?= $OLP?></textarea></div>
									<script>
											function check_words(e) {
											var BACKSPACE   = 8;
											var DELETE      = 127;
											var MAX_WORDS   = 50;
											var valid_keys  = [BACKSPACE, DELETE];
											var words       = this.value.split(' ');

											if (words.length >= 50 && valid_keys.indexOf(e.keyCode) == -1) {
													e.preventDefault();
													words.length = 50;
													this.value = words.join(' ');
											}
										}
										var textarea = document.getElementById('pitch');
										textarea.addEventListener('keydown', check_words);
										textarea.addEventListener('keyup', check_words);
									</script>
                                <div class="formtext submits">
                                    <input type="submit" onclick="olpoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="olpsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="socialformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="socialoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Social Presence</h3>
                            <p>Add your company's social media links.</p>
                        </div>
						<div class="formtext">
						<form method="post" action="index.php">
						<label>Social Media</label><br>
							<select name="sfsocialmedia" id="soc" required onchange="social()">
								<option>Select Social media</option>
								<option value="LinkedIn">LinkedIn</option>
								<option value="Facebook">Facebook</option>
								<option value="Instagram">Instagram</option>
								<option value="Twitter">Twitter</option>
								<option value="Others">Others</option>
							</select><br><br>
							<div id="LinkedIn" class="LinkedIn">
							<i class="fa fa-linkedin">&nbsp;&nbsp;<input type="text" name="sflinkedin" size="30" placeholder="<?=$LinkedInLink?>"></i><br>
							</div>
							<div id="Facebook" class="Facebook">
							<i class="fa fa-facebook">&nbsp;&nbsp;<input type="text" name="sffacebook" size="30" placeholder="<?=$FBLink?>"></i><br>							
							</div>
							<div id="Instagram" class="Instagram">
							<i class="fa fa-instagram">&nbsp;&nbsp;<input type="text" name="sfinstagram" size="30" placeholder="<?=$InstaLink?>"></i><br>
							</div>
							<div id="Twitter" class="Twitter">
							<i class="fa fa-twitter">&nbsp;&nbsp;<input type="text" name="sftwitter" size="30" placeholder="<?=$TwitterLink?>"></i><br>
							</div>
							<div id="Others" class="Others">
							<i class="fa fa-globe">&nbsp;&nbsp;<input type="text" name="sfothers" size="30" placeholder="<?=$others?>"></i><br>
							</div>
		
                                <div class="formtext submits">
                                        <input type="submit" onclick="socialoff()" value="Cancel" name="cancel" class="cancel">
                                        <input type="submit" value="Save" name="sfsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="contactform">
                    <form class="form" method="post">
                        <div class="formhead">
                            <button onclick="contactoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Contact Information</h3>
                            <p>Provide contact information for your company.</p>
                        </div>
                        <div class="formtext">
                                <label for="phone">Phone Number</label>
                                <br>
                                <input type="text" name="cfphone" placeholder="<?= $Phone?>" size="40">
                                <br>
                                <label for="email">Email</label>
                                <br>
                                <input type="email" name="cfemail" placeholder="<?= $Email?>" size="40">
                                <br><br>
                            <div class="formtext submits">
                                <input type="submit" onclick="contactoff()" value="Cancel" name="cancel" class="cancel">
                                <input type="submit" value="Save" name="cfsave" class="save">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="profteam">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="teamoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Team</h3>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                    <label for="owner">Name (Profile Owner) </label>
                                    <br>
                                    <input type="text" name="owner">
                                    <br>
                                    <label for="pos">Position </label>
                                    <br>
                                    <input type="text" name="pos">
                                    <br>
                                    <label for="exp">Experience and Expertise </label>
                                    <br>
                                    <textarea name="pos" rows="10" cols="3"></textarea>
                            </form>
                            <div class="formtext submits">
                                    <input type="submit" onclick="teamoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="save" class="save">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="addteam">
					<div class="form">
						<div class="formhead">
							<button onclick="addteamoff()" class="close"><i class="fa fa-close"></i></button>
							<h3>Add a Team Member (max. 6)</h3>
							<p>Your team is one of the most influential factors driving investor interest. If your team’s information is incomplete, you could be limiting your investment potential.</p>
							<p class="icsize">Remember to split equity before applying for funding. Divide ownership fairly and easily with our free Co-founder Equity Split tool.</p>
						</div>
						<div class="formtext">
							<form method="post">
								<div class="formtext">
									<label>First Name</label><br>
									<input type="text" name="tmfname" size="50" required><br><br>
									<label>Last Name</label><br>
									<input type="text" name="tmlname" size="50" required><br><br>
									<label>Designation</label><br>
									<input type="text" name="tmdsgn" size="50" required><br><br>
									<label>Experience and Expertise(in yrs)</label><br>
									<input type="number" name="tmexp" size="50" required><br><br>
									<label>Email</label><br>
									<input type="email" name="tmemail" size="50" required><br><br>
									<label>LinkedIn</label><br>
									<input type="text" name="tmlinkedin" size="50" required><br><br>
									</div>
								<div class="formtext submits">
									<input type="submit" onclick="addteamoff()"value="Cancel" name="cancel" class="cancel">
									<input type="submit" value="Save" name="tmsave" class="save">
								</div>
							</form>
						</div>
					</div>
                </div>
				<div id="adv">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="advoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Add a Company Advisor (max. 3)</h3>
                            <p class="icsize">Please provide the name and email address of your company advisor. Once they have confirmed their role, they'll gain access to your private profile. View our privacy policy</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext">
                                    <label>Name</label><br>
                                    <input type="text" name="caname" size="50" required><br><br>
                                    <label>Email</label><br>
                                    <input type="email" name="caemail" size="50" required><br><br>
                                </div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="advoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="casave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
				<div id="inv">
					<div class="form">
						<div class="formhead">
							<button onclick="invoff()" class="close"><i class="fa fa-close"></i></button>
							<h3>Add a Previous Investor(max. 3)</h3>
							<p class="icsize">Please provide the name and email address of a previous investor. Once they have confirmed their role, they'll gain access to your private profile. View our privacy policy</p>
						</div>
						<div class="formtext">
							<form method="post">
								<div class="formtext">
									<label>Name</label><br>
									<input type="text" size="50" name="piname" required><br><br>
									<label>Email</label><br>
									<input type="email" size="50" name="piemail" required><br><br>
								</div>
								<div class="formtext submits">
									<input type="submit" onclick="invoff()" value="Cancel" name="cancel" class="cancel">
									<input type="submit" value="Save" name="pisave" class="save">
								</div>
							</form>
						</div>
					</div>
                </div>
			<?php require "../../include/footer/footer.php" ?>
        </div>
		<script src="js/profform.js"></script>
    </body>
</html>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
