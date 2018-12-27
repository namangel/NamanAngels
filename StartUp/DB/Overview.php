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
	$Address = $row['Address'];
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
	$OLP = $row['OLP']==""? 'Write A Short Pitch For Your Company In One Line':$row['OLP'];
    $Logo = $row['Logo'];
    $Backimg = $row['BackImage'];



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
			$q = "UPDATE user_st set Stname='$cbname' where Username='$u';";
			mysqli_query($db, $q);
		}

		if($cbstage != 'Select Stage')
		{
			$q = "UPDATE st_overview set Stage='$cbstage' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbaddress != "")
		{
			$q = "UPDATE user_st set Address='$cbaddress' where Username='$u';";
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

	if(isset($_POST['sumsave'])){
		$summaryform = mysqli_real_escape_string($db, $_POST['summaryform']);
		$q = "UPDATE st_overview set Summary='$summaryform' where Username='$u';";
		mysqli_query($db, $q);

		header('location: Overview.php');
	}

	if(isset($_POST['pitchsub'])){
		$name= $_FILES['pitchvid']['name'];
		$tmp_name= $_FILES['pitchvid']['tmp_name'];
		$submitbutton= $_POST['pitchsub'];
		$position= strpos($name, ".");
		$fileextension= substr($name, $position + 1);
		$fileextension= strtolower($fileextension);
		$success= -1;
		if (isset($name)){
			$path= '../../Uploads/';
			if (!empty($name)){
				if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm")){
					$success=0;
					echo '<script>alert("The file extension must be .mp4, .ogg, or .webm in order to be uploaded")</script>';
				}
				else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm")){
					$success=1;
					if (copy($tmp_name, $path.basename($_FILES['pitchvid']['name']))) {
						echo '<script> alert("Uploaded!")</script>';
						$q = "UPDATE st_overview SET PitchName='$name', PitchExt='$fileextension' where Username='$u';";
						mysqli_query($db, $q);
					}
				}
			}
		}
		header('location: Overview.php');
	}

	if(isset($_POST['tmsave'])){

		$tmfname = mysqli_real_escape_string($db, $_POST['tmfname']);
		$tmlname = mysqli_real_escape_string($db, $_POST['tmlname']);
		$tmdsgn = mysqli_real_escape_string($db, $_POST['tmdsgn']);
		$tmexp = mysqli_real_escape_string($db, $_POST['tmexp']);
		$tmemail = mysqli_real_escape_string($db, $_POST['tmemail']);
		$tmlinkedin = mysqli_real_escape_string($db, $_POST['tmlinkedin']);

		$q = "INSERT INTO st_teams (Username, TFName, TLName, TDsgn, TExp, TEmail, TLinkedIn) VALUES ('$u','$tmfname', '$tmlname', '$tmdsgn', '$tmexp', '$tmemail', '$tmlinkedin')";
		mysqli_query($db, $q);
		header('location: Overview.php');

	}

	if(isset($_POST['casave'])){
		$caname = mysqli_real_escape_string($db, $_POST['caname']);
		$caemail = mysqli_real_escape_string($db, $_POST['caemail']);

		$q = "INSERT INTO st_advisors (Username, CAName, CAEmail) VALUES ('$u', '$caname', '$caemail');";
		mysqli_query($db, $q);

		header('location: Overview.php');
	}

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piemail = mysqli_real_escape_string($db, $_POST['piemail']);

		$q = "INSERT INTO st_previnvestment (Username, PIName, PIEmail) VALUES ('$u', '$piname', '$piemail');";
		mysqli_query($db, $q);

		header('location: Overview.php');
	}

	if(isset($_POST['olpsave'])){
		$olpnew = mysqli_real_escape_string($db, $_POST['olpform']);
		if($olpnew !="")
		{
			$q = "UPDATE st_overview set OLP='$olpnew' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: Overview.php');
    }

    if(isset($_POST['BIsave'])){
        $check = getimagesize($_FILES["backimg"]["tmp_name"]);
	    if($check !== false){
			$image = $_FILES['backimg']['tmp_name'];
	        $imgContent = addslashes(file_get_contents($image));

			$q = "UPDATE st_overview set BackImage ='$imgContent' where Username='$u';";
			mysqli_query($db, $q);
		}
        header('location: Overview.php');
    }


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
			<?php require '../include/header/stp_db.php'; ?>
			<?php require '../include/nav/nav.php'; ?>
        <div class="container">
            <div class="main">
            	<div class="backimg">
                    <button class="pencil" onclick="backimgon()"><i class="fa fa-pencil"></i></button>
                    <div style="height:100px;"><?= '<img src="data:image/jpeg;base64,'.base64_encode($Backimg).'"/>';?></div>

                        <!-- <font style="font-size:30px;"><?= $Stname?></font> -->
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
												<li class="item">Address <span class="value"><?= $Address?></span></li>
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
                <div id="overlay">
                    <div class="compbasics">
                        <form class="profform" method="post" action='Overview.php' enctype="multipart/form-data">
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
																<select name="cbcountry" required placeholder="<?= $Country?>">
											            <option value=""><?= $Country?></option>
											            <option value="AF">Afghanisthan</option>
											            <option value="AX">Aland Islands</option>
											            <option value="AL">Albania</option>
											            <option value="DZ">Algeria</option>
											            <option value="AS">American Samoa</option>
											            <option value="AD">Andorra</option>
											            <option value="AO">Angola</option>
											            <option value="AI">Anguilla</option>
											            <option value="AQ">Antarctica</option>
											            <option value="AG">Antigua and Barbuda</option>
											            <option value="AR">Argentina</option>
											            <option value="AM">Armenia</option>
											            <option value="AW">Aruba</option>
											            <option value="AU">Australia</option>
											            <option value="AT">Austria</option>
											            <option value="AZ">Azerbaijan</option>
											            <option value="BS">Bahamas</option>
											            <option value="BH">Bahrain</option>
											            <option value="BD">Bangladesh</option>
											            <option value="BB">Barbados</option>
											            <option value="BY">Belarus</option>
											            <option value="BE">Belgium</option>
											            <option value="BZ">Belize</option>
											            <option value="BJ">Benin</option>
											            <option value="BM">Bermuda</option>
											            <option value="BT">Bhutan</option>
											            <option value="BO">Bolivia, Plurinational State of</option>
											            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
											            <option value="BA">Bosnia and Herzegovina</option>
											            <option value="BW">Botswana</option>
											            <option value="BV">Bouvet Island</option>
											            <option value="BR">Brazil</option>
											            <option value="IO">British Indian Ocean Territory</option>
											            <option value="BN">Brunei Darussalam</option>
											            <option value="BG">Bulgaria</option>
											            <option value="BF">Burkina Faso</option>
											            <option value="BI">Burundi</option>
											            <option value="KH">Cambodia</option>
											            <option value="CM">Cameroon</option>
											            <option value="CA">Canada</option>
											            <option value="CV">Cape Verde</option>
											            <option value="KY">Cayman Islands</option>
											            <option value="CF">Central African Republic</option>
											            <option value="TD">Chad</option>
											            <option value="CL">Chile</option>
											            <option value="CN">China</option>
											            <option value="CX">Christmas Island</option>
											            <option value="CC">Cocos (Keeling) Islands</option>
											            <option value="CO">Colombia</option>
											            <option value="KM">Comoros</option>
											            <option value="CG">Congo</option>
											            <option value="CD">Congo, the Democratic Republic of the</option>
											            <option value="CK">Cook Islands</option>
											            <option value="CR">Costa Rica</option>
											            <option value="CI">C�te d'Ivoire</option>
											            <option value="HR">Croatia</option>
											            <option value="CU">Cuba</option>
											            <option value="CW">Cura�ao</option>
											            <option value="CY">Cyprus</option>
											            <option value="CZ">Czech Republic</option>
											            <option value="DK">Denmark</option>
											            <option value="DJ">Djibouti</option>
											            <option value="DM">Dominica</option>
											            <option value="DO">Dominican Republic</option>
											            <option value="EC">Ecuador</option>
											            <option value="EG">Egypt</option>
											            <option value="SV">El Salvador</option>
											            <option value="GQ">Equatorial Guinea</option>
											            <option value="ER">Eritrea</option>
											            <option value="EE">Estonia</option>
											            <option value="ET">Ethiopia</option>
											            <option value="FK">Falkland Islands (Malvinas)</option>
											            <option value="FO">Faroe Islands</option>
											            <option value="FJ">Fiji</option>
											            <option value="FI">Finland</option>
											            <option value="FR">France</option>
											            <option value="GF">French Guiana</option>
											            <option value="PF">French Polynesia</option>
											            <option value="TF">French Southern Territories</option>
											            <option value="GA">Gabon</option>
											            <option value="GM">Gambia</option>
											            <option value="GE">Georgia</option>
											            <option value="DE">Germany</option>
											            <option value="GH">Ghana</option>
											            <option value="GI">Gibraltar</option>
											            <option value="GR">Greece</option>
											            <option value="GL">Greenland</option>
											            <option value="GD">Grenada</option>
											            <option value="GP">Guadeloupe</option>
											            <option value="GU">Guam</option>
											            <option value="GT">Guatemala</option>
											            <option value="GG">Guernsey</option>
											            <option value="GN">Guinea</option>
											            <option value="GW">Guinea-Bissau</option>
											            <option value="GY">Guyana</option>
											            <option value="HT">Haiti</option>
											            <option value="HM">Heard Island and McDonald Islands</option>
											            <option value="VA">Holy See (Vatican City State)</option>
											            <option value="HN">Honduras</option>
											            <option value="HK">Hong Kong</option>
											            <option value="HU">Hungary</option>
											            <option value="IS">Iceland</option>
											            <option value="IN">India</option>
											            <option value="ID">Indonesia</option>
											            <option value="IR">Iran, Islamic Republic of</option>
											            <option value="IQ">Iraq</option>
											            <option value="IE">Ireland</option>
											            <option value="IM">Isle of Man</option>
											            <option value="IL">Israel</option>
											            <option value="IT">Italy</option>
											            <option value="JM">Jamaica</option>
											            <option value="JP">Japan</option>
											            <option value="JE">Jersey</option>
											            <option value="JO">Jordan</option>
											            <option value="KZ">Kazakhstan</option>
											            <option value="KE">Kenya</option>
											            <option value="KI">Kiribati</option>
											            <option value="KP">Korea, Democratic People's Republic of</option>
											            <option value="KR">Korea, Republic of</option>
											            <option value="KW">Kuwait</option>
											            <option value="KG">Kyrgyzstan</option>
											            <option value="LA">Lao People's Democratic Republic</option>
											            <option value="LV">Latvia</option>
											            <option value="LB">Lebanon</option>
											            <option value="LS">Lesotho</option>
											            <option value="LR">Liberia</option>
											            <option value="LY">Libya</option>
											            <option value="LI">Liechtenstein</option>
											            <option value="LT">Lithuania</option>
											            <option value="LU">Luxembourg</option>
											            <option value="MO">Macao</option>
											            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
											            <option value="MG">Madagascar</option>
											            <option value="MW">Malawi</option>
											            <option value="MY">Malaysia</option>
											            <option value="MV">Maldives</option>
											            <option value="ML">Mali</option>
											            <option value="MT">Malta</option>
											            <option value="MH">Marshall Islands</option>
											            <option value="MQ">Martinique</option>
											            <option value="MR">Mauritania</option>
											            <option value="MU">Mauritius</option>
											            <option value="YT">Mayotte</option>
											            <option value="MX">Mexico</option>
											            <option value="FM">Micronesia, Federated States of</option>
											            <option value="MD">Moldova, Republic of</option>
											            <option value="MC">Monaco</option>
											            <option value="MN">Mongolia</option>
											            <option value="ME">Montenegro</option>
											            <option value="MS">Montserrat</option>
											            <option value="MA">Morocco</option>
											            <option value="MZ">Mozambique</option>
											            <option value="MM">Myanmar</option>
											            <option value="NA">Namibia</option>
											            <option value="NR">Nauru</option>
											            <option value="NP">Nepal</option>
											            <option value="NL">Netherlands</option>
											            <option value="NC">New Caledonia</option>
											            <option value="NZ">New Zealand</option>
											            <option value="NI">Nicaragua</option>
											            <option value="NE">Niger</option>
											            <option value="NG">Nigeria</option>
											            <option value="NU">Niue</option>
											            <option value="NF">Norfolk Island</option>
											            <option value="MP">Northern Mariana Islands</option>
											            <option value="NO">Norway</option>
											            <option value="OM">Oman</option>
											            <option value="PK">Pakistan</option>
											            <option value="PW">Palau</option>
											            <option value="PS">Palestinian Territory, Occupied</option>
											            <option value="PA">Panama</option>
											            <option value="PG">Papua New Guinea</option>
											            <option value="PY">Paraguay</option>
											            <option value="PE">Peru</option>
											            <option value="PH">Philippines</option>
											            <option value="PN">Pitcairn</option>
											            <option value="PL">Poland</option>
											            <option value="PT">Portugal</option>
											            <option value="PR">Puerto Rico</option>
											            <option value="QA">Qatar</option>
											            <option value="RE">R�union</option>
											            <option value="RO">Romania</option>
											            <option value="RU">Russian Federation</option>
											            <option value="RW">Rwanda</option>
											            <option value="BL">Saint Barth�lemy</option>
											            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
											            <option value="KN">Saint Kitts and Nevis</option>
											            <option value="LC">Saint Lucia</option>
											            <option value="MF">Saint Martin (French part)</option>
											            <option value="PM">Saint Pierre and Miquelon</option>
											            <option value="VC">Saint Vincent and the Grenadines</option>
											            <option value="WS">Samoa</option>
											            <option value="SM">San Marino</option>
											            <option value="ST">Sao Tome and Principe</option>
											            <option value="SA">Saudi Arabia</option>
											            <option value="SN">Senegal</option>
											            <option value="RS">Serbia</option>
											            <option value="SC">Seychelles</option>
											            <option value="SL">Sierra Leone</option>
											            <option value="SG">Singapore</option>
											            <option value="SX">Sint Maarten (Dutch part)</option>
											            <option value="SK">Slovakia</option>
											            <option value="SI">Slovenia</option>
											            <option value="SB">Solomon Islands</option>
											            <option value="SO">Somalia</option>
											            <option value="ZA">South Africa</option>
											            <option value="GS">South Georgia and the South Sandwich Islands</option>
											            <option value="SS">South Sudan</option>
											            <option value="ES">Spain</option>
											            <option value="LK">Sri Lanka</option>
											            <option value="SD">Sudan</option>
											            <option value="SR">Suriname</option>
											            <option value="SJ">Svalbard and Jan Mayen</option>
											            <option value="SZ">Swaziland</option>
											            <option value="SE">Sweden</option>
											            <option value="CH">Switzerland</option>
											            <option value="SY">Syrian Arab Republic</option>
											            <option value="TW">Taiwan, Province of China</option>
											            <option value="TJ">Tajikistan</option>
											            <option value="TZ">Tanzania, United Republic of</option>
											            <option value="TH">Thailand</option>
											            <option value="TL">Timor-Leste</option>
											            <option value="TG">Togo</option>
											            <option value="TK">Tokelau</option>
											            <option value="TO">Tonga</option>
											            <option value="TT">Trinidad and Tobago</option>
											            <option value="TN">Tunisia</option>
											            <option value="TR">Turkey</option>
											            <option value="TM">Turkmenistan</option>
											            <option value="TC">Turks and Caicos Islands</option>
											            <option value="TV">Tuvalu</option>
											            <option value="UG">Uganda</option>
											            <option value="UA">Ukraine</option>
											            <option value="AE">United Arab Emirates</option>
											            <option value="GB">United Kingdom</option>
											            <option value="US">United States</option>
											            <option value="UM">United States Minor Outlying Islands</option>
											            <option value="UY">Uruguay</option>
											            <option value="UZ">Uzbekistan</option>
											            <option value="VU">Vanuatu</option>
											            <option value="VE">Venezuela, Bolivarian Republic of</option>
											            <option value="VN">Viet Nam</option>
											            <option value="VG">Virgin Islands, British</option>
											            <option value="VI">Virgin Islands, U.S.</option>
											            <option value="WF">Wallis and Futuna</option>
											            <option value="EH">Western Sahara</option>
											            <option value="YE">Yemen</option>
											            <option value="ZM">Zambia</option>
											            <option value="ZW">Zimbabwe</option>
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
                    <div><a href="Overview.php" style="color:black;">Overview</a></div>
                    <div><a href="Exec.php">Executive summary</a></div>
                    <div><a href="Finance.php">Financials</a></div>
                    <div><a href="Doc.php">Documents</a></div>
                </div>
                <div class="summary">
                    <div class="databox">
                        <button onclick="summon()" class="pencil"><i class="fa fa-pencil"></i></button>
                        <h3>Company Summary</h3>
						<?php echo $Summary;
							if($Summary == "Tell the world who you are and what makes your company special."){
								echo '<img src="../img/Capture.png">';
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
						<?php
							if($PitchName == ""){
		                        echo '<label>Increase the impact of your profile by uploading a short pitch</label>';
		                        echo '<br>';
								echo '<form class="pitch" action="Overview.php" method="post" enctype="multipart/form-data">';
									echo '<input type="file" name="pitchvid">';
									echo '<input type="submit" name="pitchsub" value="Upload">';
								echo '</form>';
							}
							else{
								$videos_field=$PitchName;
								$video_show= "../../Uploads/$videos_field";

								echo '<form class="pitch" action="Overview.php" method="post" enctype="multipart/form-data">';
									echo '<input type="file" name="pitchvid">';
									echo '<input type="submit" name="pitchsub" value="Upload">';
								echo '</form>';
								echo "<div align=center><video controls><source src='$video_show' type='video/$PitchExt'>Your browser does not support the video tag.</video></div>";
							}
						?>
                    </div>
                    <div class="databox">
                        <!-- <button onclick="teamon()" class="pencil"><i class="fa fa-pencil"></i></button> -->
                        <button onclick="addteamon()" class="add"><i class="fa fa-plus"></i></button>
                        <h4>Team</h4>
						<?php
							$q = "SELECT * FROM st_teams where Username='$u';";
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
                        <button onclick="advon()" class="add"><i class="fa fa-plus"></i></button>
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
                        <button onclick="invon()" class="add"><i class="fa fa-plus"></i></button>
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
                <div id="backimg">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="summoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Background Image</h3>
                        </div>
                        <div class="formtext">
                            <form method="post" action='Overview.php'>
                                <div class="formtext"><input type="file" name="backimg"><br></div>
                                <div class="formtext submits">
                                    <input type="submit" value="Cancel" name="cancel" class="cancel">
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
                            <p>Add an overview to help investors evaluate your startup. You might like to include your business model, structure and products/services. (upto 2000 chars.)</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext"><textarea rows="10" cols="150" name="summaryform" maxlength="2000" required><?= $Summary?></textarea></div>
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
                            <p>Add A Short Pitch For Your Company In One Line</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext"><textarea rows="10" cols="150" name="olpform" required><?= $OLP?></textarea></div>
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
                            <form method="post">
                                <div class="socialic"><i class="fa fa-linkedin"><input type="text" name="sflinkedin"  placeholder="<?= $LinkedInLink?>" size="30"></i></div>
                                <div class="socialic"><i class="fa fa-twitter"><input type="text" name="sftwitter" placeholder="<?= $TwitterLink?>" size="30"></i></div>
                                <div class="socialic"><i class="fa fa-facebook"> <input type="text" name="sffacebook" placeholder="<?= $FBLink?>" size="30"></i></div>
                                <br>
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
                                <input type="text" name="cfemail" placeholder="<?= $Email?>" size="40">
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
                                        <input type="checkbox">Can manage my Company Profile <br><br>
                                        <p class="icsize">Allow this team member to edit the Company Profile. Note: only the Account Owner can apply to investor groups.</p>
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
                                    <input type="text" name="caemail" size="50" required><br><br>
                                </div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="advoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="casave" class="save">
                                </div>
                            </form>
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
                                        <input type="text" size="50" name="piemail" required><br><br>
                                    </div>
                                    <div class="formtext submits">
                                        <input type="submit" onclick="invoff()" value="Cancel" name="cancel" class="cancel">
                                        <input type="submit" value="Save" name="pisave" class="save">
                                    </div>
                                </form>
                            </div>
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
