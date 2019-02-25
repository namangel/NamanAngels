<?php
	require '../../../server.php';
	if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
	$u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['FName'];
    $lname = $row['LName'];
    $cname = $row['CName'];
    $web = $row['Website'];
    $city = $row['City'];
    $state = $row['State'];
	$country = $row['Country'];
	$phone = $row['Phone'];
    $email = $row['Email'];
	$website = $row['Website'];

    $qu = "SELECT * FROM inv_addetails WHERE InvID='$u'";
    $results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$indOfInt=$row['IOI']==""? '--':$row['IOI'];
	$facebook=$row['Facebook']==""? '--':$row['Facebook'];
	$twitter=$row['Twitter']==""? '--':$row['Twitter'];
	$linkedin=$row['LinkedIn']==""? '--':$row['LinkedIn'];
	$instagram=$row['Instagram']==""? '--':$row['Instagram'];
	$others = $row['Others']==""? '--':$row['Others'];
	$role = $row['Role']==""? '--':$row['Role'];
	$partner = $row['Partner']==""? '--':$row['Partner'];
	$invrange = $row['InvRange']==""? '--':$row['InvRange'];
    $summary=$row['Summary']==""? 'Describe yourself and the value of your investment.':$row['Summary'];

	$q = "SELECT * FROM inv_uploads WHERE InvID='$u'";
    $results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$img = $row['ProfilePic']==""? '/NamanAngels/Uploads/default.png':$row['ProfilePic'];

	if(isset($_POST["cbsave"])){
        $cbfname = mysqli_real_escape_string($db, $_POST['cbfname']);
        $cblname = mysqli_real_escape_string($db, $_POST['cblname']);
		$cbcomp = mysqli_real_escape_string($db, $_POST['cbcomp']);
		$cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
		$cbrole = mysqli_real_escape_string($db, $_POST['cbrole']);
		$cbpartner = mysqli_real_escape_string($db, $_POST['cbpartner']);
		$cbioi = mysqli_real_escape_string($db, $_POST['cbioi']);
		$cbrange = mysqli_real_escape_string($db, $_POST['cbrange']);
		$cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);


		if($cbfname != "")
		{
			$q = "UPDATE inv_details set FName ='$cbfname' where InvID='$u';";
			mysqli_query($db, $q);
        }

        if($cblname != "")
		{
			$q = "UPDATE inv_details set LName ='$cbfname' where InvID='$u';";
			mysqli_query($db, $q);
		}

		if($cbcity != "")
		{
			$q = "UPDATE inv_details set City='$cbcity' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbstate != "")
		{
			$q = "UPDATE inv_details set State='$cbstate' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbcountry != "")
		{
			$q = "UPDATE inv_details set Country='$cbcountry' where InvID='$u';";
			mysqli_query($db, $q);
		}
        if($cbioi != "")
		{
			$q = "UPDATE inv_addetails set IOI ='$cbioi' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbrange != 'Select Investment')
		{
			$q = "UPDATE inv_addetails set InvRange='$cbrange' where InvID='$u';";
			mysqli_query($db, $q);
        }
		if($cbweb != "")
		{
			$q = "UPDATE inv_details set Website='$cbweb' where InvID='$u';";
			mysqli_query($db, $q);
		}

		$check = getimagesize($_FILES["cbpic"]["tmp_name"]);
		if($check != false)
		{
			$file_name = $fname."_".$lname."_".$_FILES['cbpic']['name'];
			$file_size = $_FILES['cbpic']['size'];
			$file_tmp = $_FILES['cbpic']['tmp_name'];
			$file_type = $_FILES['cbpic']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['cbpic']['name'])));

			$extensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$extensions)=== false)
			{
				echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
			}
			else
			{
				if($file_size > 5242880)
				{
					echo "<script>alert('File size must be less than 5 MB')</script>";
				}
				else
				{
					$uploadas = "uploads/investor/".$file_name;
					$upload = "../../../uploads/investor/".$file_name;
					if(move_uploaded_file($file_tmp, $upload)){
						$q = "UPDATE inv_uploads set ProfilePic='$uploadas' where InvID='$u';";
						mysqli_query($db, $q);
						echo "<script>alert('Successfully Uploaded')</script>";
					}
				}
			}
		}
		header('location: index.php');
	}


    if(isset($_POST["sfsave"])){
		$sllinkin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sltwit = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$slfb = mysqli_real_escape_string($db, $_POST['sffacebook']);
		$slinst = mysqli_real_escape_string($db, $_POST['sfinstagram']);
		$slots = mysqli_real_escape_string($db, $_POST['sfothers']);

		if($sllinkin != NULL)
		{
			$q = "UPDATE inv_addetails set LinkedIn='$sllinkin' where InvID='$u'";
			mysqli_query($db, $q);
        }
		if($sltwit != NULL)
		{
			$q = "UPDATE inv_addetails set Twitter='$sltwit' where InvID='$u'";
			mysqli_query($db, $q);
        }
		if($slfb != NULL)
		{
			$q = "UPDATE inv_addetails set Facebook='$slfb' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($slinst != NULL)
		{
			$q = "UPDATE inv_addetails set Instagram='$slinst' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($slots != NULL)
		{
			$q = "UPDATE inv_addetails set Others='$slots' where InvID='$u'";
			mysqli_query($db, $q);
        }
		header('location: index.php');
    }

    if(isset($_POST["cfsave"]))
	{
		$cfemail = mysqli_real_escape_string($db, $_POST['cfemail']);
		$cfphone = mysqli_real_escape_string($db, $_POST['cfphone']);

		if($cfemail != NULL)
		{
			$q = "UPDATE inv_details set Email='$cfemail' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($updphone != NULL)
		{
			$q = "UPDATE inv_details set Phone='$cfphone' where InvID='$u'";
			mysqli_query($db, $q);
		}

		header('location: index.php');
    }

    if(isset($_POST["sumsave"]))
	{
        $summ = mysqli_real_escape_string($db, $_POST['summaryform']);
			$q = "UPDATE inv_addetails set Summary='$summ' where InvID='$u'";
			mysqli_query($db, $q);
		header('location: index.php');
    }

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piyear = mysqli_real_escape_string($db, $_POST['piyear']);
		$piamount = mysqli_real_escape_string($db, $_POST['piamount']);
		$pistage = mysqli_real_escape_string($db, $_POST['pistage']);
		$pistake = mysqli_real_escape_string($db, $_POST['pistake']);
		$piweb = mysqli_real_escape_string($db, $_POST['piweb']);
		$q = "INSERT INTO inv_previnvestment (InvID, Name, Year,Amount, Stage, Stake, Website) VALUES ('$u', '$piname', '$piyear', '$piamount','$pistage','$pistake','$piweb');";
		mysqli_query($db, $q);

		header('location: index.php');
	}

	if(isset($_POST['rem_inv'])){
		$mem_id = mysqli_real_escape_string($db, $_POST['prev_inv']);

		$q = "DELETE FROM inv_previnvestment where ID = $mem_id;";
		mysqli_query($db, $q);

		header('location:index.php');
	}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/invprof.css" type="text/css">
        <script src="js/invprofform.js"></script>
		<title><?= $fname ?> <?= $lname ?>'s Profile | NAMAN</title>
  		<link rel="icon" href="../../../img/favicon.jpg" type="image/jpg" sizes="16x16">

<style media="screen">
.limit_inv{
	color:red;
	display: none;
	font-weight: lighter;
}

.prev_inv{
	display: none;
}

.rem_inv{
	margin-top: 10px;
	border: none;
	background-color: white;
}
.LinkedIn, .Facebook, .Twitter, .Instagram, .Others{
	display: none;
	margin-bottom: 10px;
}
.mainright{
    display: grid;
    grid-template-rows: 1fr 2fr;
    grid-column: 2;
    margin-left: 40px;
    margin-right: 80px;
    margin-top: 10px;
    height: 550px;
}
.contact{
    grid-column: 2;
    grid-row: 1;
    margin-left: 1em;
    margin-right: 80px;
    align-content: center;
    background-color: white;
    line-height: 2;
}

.social{
    grid-column: 2;
    grid-row: 2;
    margin-left: 1em;
    margin-right: 80px;
    align-content: center;
    background-color: white;
    line-height: 2;
}
</style>


</head>
<script type="text/javascript">
<?php

	$q = "SELECT * FROM inv_previnvestment;";
	$results=mysqli_query($db, $q);
	if (mysqli_num_rows($results) >= 3)
	{
		echo 'function addpion() {
				document.getElementById("inv").style.display = "none";
				document.getElementById("limit_inv").style.display = "inline";
		}';
	}
	else{
		echo 'function addpion() {
				document.getElementById("inv").style.display = "block";
		}';
	}
?>
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

</script>

    <body>
    <?php require '../include/header/inv_db.php'; ?>
    <?php require '../include/nav/nav.php'; ?><br>
    <div class="container">

    <div class="main">

        <div class="sideprof">
			<div class="pen">
				<button class="pencil" onclick="on()"><i class="fa fa-pencil"></i></button>
				<br>
			</div>
            <div class="upload">
				<div>
					<?= "<img style='border-radius:50%' src='../../../".$img."'  />";?></div><br><br>
                <b><?= $fname ?>&nbsp;<?= $lname ?></b><br><br>
			  	<b> Location: </b><?= $city ?>,<br><?= $state ?>,&nbsp;<?= $country ?><br><br>
			  	<b> Investment range: </b><?= $invrange ?>
            </div>
        </div>

        <div id="overlay">
			<div class="compbasics">
				<form class="profform" method="post" action='index.php' enctype="multipart/form-data">
					<button class="close" onclick="off()"><i class="fa fa-close"></i></button>
					<div class="i1">
						<h2>Investor Basics</h2>
						<p>Add or edit required basic information about yourself or firm.</p>
						<hr>
					</div>
						<div class="i2 tooltip">
						<label for="cbpic">Profile Image</label><br>
						<input name="cbpic" type="file"><span class="tooltiptext">Choose file of type .jpeg, .png, .jpg of size less than 5MB!</span>
					</div>
					<div class="i2">
						<label for="cbfname">First Name</label><br>
						<input name="cbfname" type="text" placeholder="<?=$fname?>">
					</div>
					<div class="i2">
						<label for="cblname">Last Name</label><br>
						<input name="cblname" type="text" placeholder="<?=$lname?>">
					</div>
					<div class="i5">
						<label for="cbcity">City</label><br>
						<input name="cbcity" type="text"placeholder="<?=$city?>">
					</div>
					<div class="i5">
						<label for="cbstate">State</label><br>
						<input name="cbstate" type="text"placeholder="<?=$state?>">
					</div>
					<div class="i5">
						<label for="cbcountry">Country</label><br>
										<select name="cbcountry" required placeholder="<?=$country?>">
												<option value="<?= $country?>"><?= $country?></option>
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
					<div class="i3">
						<label for="cbrange">Investment Range</label><br>
						<select name="cbrange" placeholder=">">
							<option>Select Investment</option>
							<option>0 - 1,00,000</option>
							<option>1,00,000 - 10,00,000</option>
							<option>10,00,000 - 50,00,000</option>
							<option>50,00,000 - 1,00,00,000</option>
							<option>More than 1,00,00,000</option>
						</select>
					</div>

					<div class="butn">
						<button class="cancel" onclick="off()">Cancel</button> <button class="save" name="cbsave">Save</button>
					</div>
				</form>
			</div>
		</div>

        <div class="mainright">
            <div class="social">
                <button class="pencil" onclick="socialon()"><i class="fa fa-pencil"></i></button>
				<h3>Social Presence</h3>
        		<ul class="proflist">
				<?php
					$q = "SELECT * FROM inv_addetails WHERE InvID='$u'";
					$results = mysqli_query($db, $q);
					$row = mysqli_fetch_assoc($results);

                    if($row['LinkedIn'] != NULL){

                        echo '<li class="item li" id="li"><i class="fa fa-linkedin" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;';
                        echo $linkedin;
                        echo '</span></li><li style="list-style: none; display: inline"></li>';
				
					}
					if($row['Facebook'] != NULL){

						echo '<li class="item li" id="li"><i class="fa fa-facebook" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;';
						echo $facebook;
						echo '</span></li><li style="list-style: none; display: inline"></li>';
						
					}
					if($row['Twitter'] != NULL){
		
						echo '<li class="item li" id="li"><i class="fa fa-twitter" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;';
						echo $twitter;
						echo '</span></li><li style="list-style: none; display: inline"></li>';
						
					}
					if($row['Instagram'] != NULL){
		
						echo '<li class="item li" id="li"><i class="fa fa-instagram" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;';
						echo $instagram;
						echo '</span></li><li style="list-style: none; display: inline"></li>';
						
					}
					if($row['Others'] != NULL){
		
						echo '<li class="item li" id="li"><i class="fa fa-globe" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;';
						echo $others;
						echo '</span></li><li style="list-style: none; display: inline"></li>';
						
					}
                ?>
            </div>
            <div id="socialformov">
				<div class="form">
					<div class="formhead">
						<button onclick="socialoff()" class="close"><i class="fa fa-close"></i></button>
						<h3>Social Presence</h3>
						<p>Add your social media links.</p>
					</div>
					<div class="formtext">
						<form method="post">
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
							<i class="fa fa-linkedin">&nbsp;&nbsp;<input type="text" name="sflinkedin" size="30" placeholder="<?=$linkedin?>"></i><br>
							</div>
							<div id="Facebook" class="Facebook">
							<i class="fa fa-facebook">&nbsp;&nbsp;<input type="text" name="sffacebook" size="30" placeholder="<?=$facebook?>"></i><br>							
							</div>
							<div id="Instagram" class="Instagram">
							<i class="fa fa-instagram">&nbsp;&nbsp;<input type="text" name="sfinstagram" size="30" placeholder="<?=$instagram?>"></i><br>
							</div>
							<div id="Twitter" class="Twitter">
							<i class="fa fa-twitter">&nbsp;&nbsp;<input type="text" name="sftwitter" size="30" placeholder="<?=$twitter?>"></i><br>
							</div>
							<div id="Others" class="Others">
							<i class="fa fa-globe">&nbsp;&nbsp;<input type="text" name="sfothers" size="30" placeholder="<?=$others?>"></i><br>
							</div>
		
							<div class="formtext submits">
								<input type="submit" value="Cancel" name="cancel" class="cancel">
								<input type="submit" value="Save" name="sfsave" class="save">
							</div>
						</form>
					</div>
				</div>
			</div>
            <div class="contact">
				<h3>Contact Details</h3>
                <button class="pencil" onclick="contacton()"><i class="fa fa-pencil"></i></button>
        		<ul class="proflist">
				<li class="item"><i class="fa fa-phone" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;<?=$phone?></span></li>
                <li style="list-style: none; display: inline">
                </li>
                <li class="item"><i class="fa fa-envelope-o" style="color: #36a6fc"></i><span class="value">&nbsp;&nbsp;<?= $email?></span></li>
                <li style="list-style: none; display: inline">
                </li>
                </ul>
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
                        <input type="text" name="cfphone"  size="40" placeholder="<?=$phone?>">
                        <br>
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="cfemail" size="40" placeholder="<?= $email?>">
                        <br><br>
                        <div class="formtext submits">
                        <input type="submit" value="Cancel" name="cancel" class="cancel">
                        <input type="submit" value="Save" name="cfsave" class="save">
                    </div>
                </div>
                </form>
            </div>
        </div>

        </div>

        <div class="summary">
        <h3> Investor Overview</h3>
            <div class="databox">
                <button onclick="summon()" class="pencil"><i class="fa fa-pencil"></i></button>
                <h3>Investor Description</h3>
    			<?php echo $summary;
				if($summary == "Describe yourself and the value of your investment."){
				echo '<br><img src="../img/Paragraph.png" height="150px" width="950px">';
				}
				?>
            </div>

			<div class="databox">
			<button onclick="addpion()" class="add"><i class="fa fa-plus"></i></button>
                <h4>Previous Investment <div class="limit_inv" id="limit_inv">(maximum 3 previous investors can be added!)</div></h4>
    			<?php
    				$q = "SELECT * FROM inv_previnvestment where InvID='$u';";
					$results=mysqli_query($db, $q);
	    			if (mysqli_num_rows($results) > 0) {
					echo '<table class="tables">';
					echo "<tr>";
    			echo "<th>StartUp Name</th>";
					echo "<th>Year of Investment</th>";
					echo "<th>Amount</th>";
					echo "<th>Stage</th>";
					echo "<th>Stake holding (%)</th>";
					echo "<th>Website</th>";
					echo "<th></th>";
					echo "</th>";
				    while($row = mysqli_fetch_assoc($results)) {
				        echo '<tr>';
						echo '<td>'.$row["Name"].'</td>';
						echo '<td>'.$row['Year'].'</td>';
						echo '<td>'.$row['Amount'].'</td>';
						echo '<td>'.$row["Stage"].'</td>';
						echo '<td>'.$row['Stake'].'</td>';
						echo '<td>'.$row['Website'].'</td>';
						echo '<td><center><form method="post" action="index.php">
						<input class="member" type="number" name="prev_inv" value="'.$row['ID'].'">
						<button name="rem_inv" value="rem_inv" type="submit" class="rem_inv" id="'.$row['ID'].'" ><i class="fa fa-minus-circle"></i></button>
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
                <h4>Investments through NamanAngels</h4>
    			<?php
    				$q = "SELECT * FROM requests where Inv_ID='$u';";
					$results=mysqli_query($db, $q);
	    			if (mysqli_num_rows($results) > 0) {
					echo '<table class="tables">';
					echo "<tr>";
    				echo "<th>Startup Name</th>";
					echo "<th>Status</th>
						<th>Amount</th>
                        <th>Stake holding</th>
                        <th>Investment Date</th>";
					echo "</th>";
				    while($row = mysqli_fetch_assoc($results)) {

						$stid=$row['St_ID'];
						$qu = "SELECT Stname FROM st_details where StpID='$stid';";
						$result = mysqli_query($db, $qu);
						$row1= mysqli_fetch_assoc($result);
				        echo '<tr>';
						echo '<td>'.$row1['Stname'].'</td>';
						if($row['Deal'] == 0){
							echo '<td>Transaction in progress</td>';
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
						echo '<a href="browse.php" style="text-decoration: none;">Start investing</a>';
					}
				?>
            </div>
		</div>

		<div id="sumformov">
            <div class="form">
                <div class="formhead">
                    <button onclick="summoff()" class="close"><i class="fa fa-close"></i></button>
                    <h3>Investor Description</h3>
                    <p>Add an overview to describe yourself, your motives and sight for the startups.</p>
                </div>
                <div class="formtext">
                    <form method="post">
                    <div class="formtext"><textarea rows="10" cols="150" name="summaryform"><?=$summary?></textarea></div>
                    <div class="formtext submits">
                        <input type="submit" value="Cancel" name="cancel" class="cancel">
                        <input type="submit" value="Save" name="sumsave" class="save">
                    </div>
                    </form>
                </div>
            </div>
        </div>


    	<div id="inv">
            <div class="form">
                <div class="formhead">
                    <button onclick="addpioff()" class="close"><i class="fa fa-close"></i></button>
                    <h3>Add a Previous Investment</h3>
                    <p class="icsize">Please provide the name and details of previous investment(s).</p>
                </div>
                <div class="formtext">
                    <form method="post">
                        <div class="formtext">
                            <label>StartUp Name</label><br>
                            <input type="text" size="50" name="piname" required><br><br>
                            <label>Year of Investment</label><br>
                            <input type="number" min="2000" max="2099" step="1" size="50" name="piyear" required /><br><br>
								<label>Amount of Investment</label><br>
								<input type="number" size="10" name="piamount" required><br><br>
    							<label>Stage</label><br>
	    							<select name="pistage" name="pistage" required>
										<option>Select Stage</option>
										<option>Concept Only</option>
										<option>Product in Development</option>
										<option>Prototype ready</option>
										<option>Full Product Ready</option>
										<option>Early Revenue Stage</option>
										<option>Growth Stage</option>
									</select><br><br>
								<label>Stake holding(%)</label><br>
								<input type="number" size="3" name="pistake" required><br><br>
								<label>Website of startup</label><br>
								<input type="text" size="50" name="piweb" required><br><br>
						</div>
                        <div class="formtext submits">
                            <input type="submit" onclick="addpioff()" value="Cancel" name="cancel" class="cancel">
                            <input type="submit" value="Save" name="pisave" class="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<?php require "../../../include/footer/footer.php" ?>
</body>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
</html>
