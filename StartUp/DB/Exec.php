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
	$OLP = $row['OLP']==""? '--':$row['OLP'];
	$Logo = $row['Logo'];


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

		header('location: Exec.php');
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
		header('location: Exec.php');
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
		header('location: Exec.php');
	}

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
				<title>StartUp Profile - NamanAngels</title>
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
					<div><a href="Exec.php">Overview</a></div>
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
									<i class="fa fa-linkedin"></i><input size="30" type="text" placeholder="<?= $LinkedInLink?>" name="sflinkedin">
								</div>
								<div class="socialic">
									<i class="fa fa-twitter"></i><input size="30" type="text" placeholder="<?= $TwitterLink?>" name="sftwitter">
								</div>
								<div class="socialic">
									<i class="fa fa-facebook"></i><input size="30" type="text" placeholder="<?= $FBLink?>" name="sffacebook">
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
							<input name="cfphone" size="40" type="text" placeholder="<?= $Phone?>"><br>
							<label for="cfemail">Email</label><br>
							<input name="cfemail" size="40" type="email" placeholder="<?= $Email?>"><br>
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
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
