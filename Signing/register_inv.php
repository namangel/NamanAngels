<?php require('../server.php')
// $_SESSION["type"]
?>
<html>
<head>
  <title>Register Investor</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
function show(){
  var type = document.getElementById("selecttype").value;
  if(type == "NULL"){
    document.getElementById("institution").style.display = "NONE";
    document.getElementById("individual").style.display = "NONE";
    document.getElementById("contbot").style.display = "NONE";
  }
  else if(type == "Institution"){
    document.getElementById("individual").style.display = "NONE";
    document.getElementById("institution").style.display = "block";
    document.getElementById("contbot").style.display = "block";
  }
  else if(type == "Individual"){
    document.getElementById("institution").style.display = "NONE";
    document.getElementById("individual").style.display = "block";
    document.getElementById("contbot").style.display = "block";
  }
}
</script>
</head>

<body>
<?php require 'include/header/sign.php'; ?>

  <div class="header"><h2>Register - Invester</h2><hr></div>
  <div>
  <form method="post" action="register_inv.php" onsubmit="validate()">
    <center>

<div class="type">
  <form method="POST">
    <label>Type of investor</label>
    <select name="type" onchange="show()" id="selecttype" required>
      <option value="NULL">--select--</option>
      <option value="Individual">Individual</option>
      <option value="Institution">Institution</option>
    </select>
  </form>
    <!-- <?php
    $_SESSION["type"]=$_POST['type'];
    ?> -->
</div>
</center>
<div class="content" id="individual" style="display:none">
  <div class="input-group">
    <label>First Name</label>
    <input type="text" name="fname" value="<?php echo $fname; ?>" required>
  </div>
  <div class="input-group">
    <label>Last Name</label>
    <input type="text" name="lname" value="<?php echo $lname; ?>"required>
  </div>
<div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>"required>
  </div>

<div class="input-group">
  <label>City</label>
  <input type="text" name="city" value="<?php echo $city; ?>" required>
</div>
<div class="input-group">
  <label>State</label>
  <input type="text" name="state" value="<?php echo $state; ?>"required>
</div>
<div class="input-group">
    <label>Country</label>
  <select name="country"required>
    <option value="NULL"></option>
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
<div class="input-group">
  <label>Average No. Of Invested Companies Per Year</label>
  <input type="text" name="average" value="<?php echo $average; ?>"required>
</div>
<!-- <div class="input-group">
    <label>Website</label>
    <input type="text" name="website" value="<?php echo $website; ?>"required>
</div> -->
<div class="input-group">
  <label>Phone</label>
  <input type="number" name="phone" value="" required>
</div>

<br><br><hr style="width:50%">
<div class="input-group">
  <label>Username</label>
  <input type="text" name="username" value=""required>
</div>

  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1">
  </div>
<div class="input-group">
</div>
  <div class="input-group">
    <label>Confirm password</label>
    <input type="password" name="password_2">
  </div>
</div>
    <div class="content" id="institution"style="display:none">
      <div class="input-group">
        <label>Company Name</label>
        <input type="text" name="iname" value="<?php echo $iname;?>" autofocus required>
      </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>"required>
      </div>
    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="fname" value="<?php echo $fname; ?>" required>
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" value="<?php echo $lname; ?>"required>
    </div>
    <div class="input-group">
      <label>City</label>
      <input type="text" name="city" value="<?php echo $city; ?>" required>
    </div>
    <div class="input-group">
      <label>State</label>
      <input type="text" name="state" value="<?php echo $state; ?>"required>
    </div>
    <div class="input-group">
        <label>Country</label>
      <select name="country"required>
        <option value="NULL"></option>
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
    <div class="input-group">
      <label>Average No. Of Invested Companies Per Year</label>
      <input type="text" name="average" value="<?php echo $average; ?>"required>
    </div>
    <div class="input-group">
        <label>Website</label>
        <input type="text" name="website" value="<?php echo $website; ?>"required>
      </div>
    <div class="input-group">
      <label>Phone</label>
      <input type="number" name="phone" value="" required>
    </div>

    <br><br><hr style="width:50%">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value=""required>
    </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
      </div>
    <div class="input-group">
    </div>
      <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
      </div>
</div>
<div class="contbot" id="contbot" style="display: none;">
      <div class="input-group">
        <button type="submit" class="btn" name="reg_inv" style="background-color: #0e3c58;">Register Invester</button>
      </div>
      <p style="font-size:15px">
          Already a member? <a href="login_inv.php">Sign in</a>
      </p>
</div>
  </form>
</div>
<?php require "../include/footer/footer.php"?>
</body>
</html>
