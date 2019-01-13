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
			$file_name = $_FILES['cblogo']['name'];
			$file_size = $_FILES['cblogo']['size'];
			$file_tmp = $_FILES['cblogo']['tmp_name'];
			$file_type = $_FILES['cblogo']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['cblogo']['name'])));

			$extensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$extensions)=== false){
				echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
			}
			else{
				if($file_size > 5242880) {
					echo "<script>alert('File size must be less than 5 MB')</script>";
				}
				else{
					$upload = "/NamanAngels/Uploads/".$file_name;
					move_uploaded_file($file_tmp,$upload);
					$q = "UPDATE st_uploads set Logo='$upload' where StpID='$id';";
					mysqli_query($db, $q);
					echo "<script>alert('Successfully Uploaded')</script>";
				}
			}
		}

		header('location: Finance.php');
	}

	if(isset($_POST["sfsave"])){
		$sftwitter = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$sflinkedin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sffacebook = mysqli_real_escape_string($db, $_POST['sffacebook']);

		if($sftwitter != "")
		{
			$q = "UPDATE st_addetails set TwitterLink='$sftwitter' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sflinkedin != "")
		{
			$q = "UPDATE st_addetails set LinkedInLink='$sflinkedin' where StpID='$id';";
			mysqli_query($db, $q);
		}
		if($sffacebook != "")
		{
			$q = "UPDATE st_addetails set FBLink='$sffacebook' where StpID='$id';";
			mysqli_query($db, $q);
		}
		header('location: Finance.php');
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
		header('location: Finance.php');
	}

	if(isset($_POST['BIsave'])){

		$file_name = $_FILES['backimg']['name'];
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
				$upload = "/NamanAngels/Uploads/".$file_name;
				move_uploaded_file($file_tmp,$upload);
				$q = "UPDATE st_uploads set BackImg='$upload' where StpID='$id';";
				mysqli_query($db, $q);
				echo "<script>alert('Successfully Uploaded')</script>";
			}
		}
		header('location:Finance.php');
	}


?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <link rel="stylesheet" href="../css/financial.css" type="text/css">
        <script src="js/profform.js"></script>
				<title>StartUp Profile - NamanAngels</title>

    </head>
    <body>
		<?php require '../include/header/stp_db.php'; ?>
		<?php require '../include/nav/nav.php'; ?>
        <div class="container">
            <div class="main">
			<div class="backimg">
				<div><button class="back-button" onclick="backimgon()" ><i class="fa fa-camera"></i>&nbsp;Upload Background</button></div>
				<?php
						if($Backimg != ""){
							echo "<img src=".$Backimg." />";
						}
						else{
							echo '<div class="back">';
							echo 'Upload a background image!!';
							echo '</div>';
						}
				?>
			</div>
                <div class="sideprof">
					<div class="pen">
						<button class="pencil" onclick="on()"><i class="fa fa-pencil"></i></button>
						<br>
					</div>
                    <div class="upload">
						<div><?= "<img src=".$Logo." />";?></div>
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
                        <form class="profform" method="post" action='Finance.php' enctype="multipart/form-data">
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
                                <input name="cbdate" type="text" placeholder="<?= $DOF?>" onfocus="(this.type='date')">
                            </div>
                            <div class="i8">
                                <label for="cbempnum">Number of Employees</label><br>
                                <input name="cbempnum" type="text" placeholder="<?= $EmpNum?>">
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
									<div><a href="index.php">Overview</a></div>
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
															<i class="fa fa-linkedin"></i><input size="55" type="text" name="sflinkedin" placeholder="<?= $LinkedInLink?>">
														</div>
														<div class="socialic">
															<i class="fa fa-twitter"></i><input size="55" type="text" name="sftwitter" placeholder="<?= $TwitterLink?>">
														</div>
														<div class="socialic">
															<i class="fa fa-facebook"></i><input size="55" type="text" name="sffacebook" placeholder="<?= $FBLink?>">
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
								<div id="backimg">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="backimgoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Background Image</h3>
                        </div>
                        <div class="formtext">
                            <form method="post" action='Finance.php' enctype="multipart/form-data">
                                <div class="formtext"><input type="file" name="backimg"><br></div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="backimgoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="BIsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
								<div class="summary">
									<center><i class="fa fa-lock icsize">Only NamanAngels users who have been granted access can view this content.</i></center>
									<div class="databox">
										<div style="float:right;margin-top:20px;"><a href="#" onclick="consulton()"><i class="fa fa-question-circle-o"></i>&nbsp;Need help</a></div>
										<h3>Current Funding Round (USD)</h3>

										  Detail your stage of funding, the capital you're seeking and your pre-money valuation.<br><br>
										  <button class="btnfund" onclick="roundon()">Open Funding Round</button>
									</div>
									<div class="databox">
										<button class="pencil"><i class="fa fa-pencil "></i></button>
										<h3>Funding History (USD)</h3><br>
										  Please add any previous funding rounds.
									</div>
									<div class="databox">
										<button class="pencil" onclick="annualon()"><i class="fa fa-pencil"></i></button>
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
									<div class="databox">
										<button onClick="consulton()" class="pencil"><i class="fa fa-pencil"></i></button>
										<h3>Consultancy</h3>
										<p>Need help??..contact our consultancy</p>

									</div>
				</div>

				<div id="openround">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="roundoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Start Fundraising</h3>

                            <p>Open a new round by filling out the following information.</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext">
									<label>Round</label>
									<br>
									<select name="round">
                                    <option>Select Round</option>
                                    <option>Founder</option>
                                    <option>Friends and Family</option>
                                    <option>Angel</option>
                                    <option>Preseries A</option>
                                    <option>Series A</option>
									</select>
									<br><br>
									<label>Seeking</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="seeking" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Security type</label>
									<br>
									<select name="security" id="sec" onchange="valfunc()">
                                    <option value="a">Select Security Type</option>
                                    <option value="b">Preferred Equity</option>
                                    <option value="c">Common Equity</option>
                                    <option value="d">Convertible Notes</option>
									</select>
									<br><br>
									<span id="equity">
										<hr>
										<label>Pre-Money Valuation</label>
										<br>
										<i class="fa fa-dollar"><input type="text" name="preval" placeholder="Numbers Only" size="54"></i>
										<br><br>
									</span>
									<span id="notes">
										<hr>
										<label>Valuation Cap</label>
										<br>
										<i class="fa fa-dollar"><input type="text" name="valcap" placeholder="Numbers Only" size="54"></i>
										<br><br>
										<label>Conversion Discount</label>
										<br>
										<i class="fa fa-percent"><input type="text" name="discount" placeholder="Numbers Only" size="53"></i>
										<br><br>
										<label>Interest Rate</label>
										<br>
										<i class="fa fa-percent"><input type="text" name="interest" placeholder="Numbers Only" size="53"></i>
										<br><br>
										<label>Term Length</label>
										<br>
										<input type="text" name="term" placeholder="Months" size="55">
										<br><br>
									</span>
								</div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="roundoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="roundsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

				<div id="annualfin">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="annualoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Annual Financials</h3>
                            <p>Enter your financials for this year and last year, as well as projections for the following three years. Investors like to compare and evaluate financial performance over this timeframe, so do your best to complete it.</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext">
									<label>Annual Revenue Run Rate</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Monthly Burn Rate</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Financial Annotation</label>
									<br>
									<input type="text" name="finannotation" size="54">
									<br><br>
									<label>Revenue Driver</label>
									<br>
									<input type="text" name="revdriver" size="54">
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y")-2; ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y")-1; ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y"); ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y")+1; ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y")+2; ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br><hr>
								</div>
								<div class="formtext">
									<?php echo date("Y")+3; ?>
									<br>
									<label>Revenue Driver</label>
									<br>
									<input type="number" name="revdriver" size="54">
									<br><br>
									<label>Revenue</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="runrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
									<label>Expenditure</label>
									<br>
									<i class="fa fa-dollar"><input type="text" name="burnrate" placeholder="Numbers Only" size="54"></i>
									<br><br>
								</div>
                                <div class="formtext submits">
                                    <input type="submit" onclick="annualoff()" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="roundsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
								<div id="consult">
										<div class="form">
												<div class="formhead">
														<button onclick="consultoff()" class="close"><i class="fa fa-close"></i></button>
														<h3>Consult </h3>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia</p>
												</div>
												<div class="formtext">
														<form method="post">
															<label>Subject</label>
															<div class="formtext"><textarea rows="2" cols="150" name="consult_sub" id="consult_sub" maxlength="250" required></textarea></div>
															<br><label>Query</label>
																<div class="formtext"><textarea rows="10" cols="150" name="consult_query" id="consult_query" required></textarea></div>
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
																	var textarea = document.getElementById('consult_query');
																	textarea.addEventListener('keydown', check_words);
																	textarea.addEventListener('keyup', check_words);
																</script>
																<div class="formtext submits">
																		<input type="submit" onclick="consultoff()"value="Cancel" name="cancel" class="cancel">
																		<input type="submit" value="Save" name="sumsave" class="save">
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
