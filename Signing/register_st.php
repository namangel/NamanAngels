<?php require('../server.php');

if(isset($_SESSION['StpID'])){
	header('location: ../StartUp/index.php');
}
 ?>
<html>
<head>
	<title>Register Startup | NAMAN</title>
  <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<script>
function validateForm() {
var stname = document.forms["register_st"]["stname"].value;
var email = document.forms["register_st"]["email"].value;
var ffname = document.forms["register_st"]["ffname"].value;
var type = document.forms["register_st"]["type"].value;
var address = document.forms["register_st"]["address"].value;
var city = document.forms["register_st"]["city"].value;
var state = document.forms["register_st"]["state"].value;
var country = document.forms["register_st"]["city"].value;
var website = document.forms["register_st"]["website"].value;
var inv = document.forms["register_st"]["inv"].value;
var phone = document.forms["register_st"]["phone"].value;
var username = document.forms["register_st"]["username"].value;
var password_1 = document.forms["register_st"]["password_1"].value;
var password_2 = document.forms["register_st"]["password_2"].value;

if (stname.length < 3) {
  alert("Please fill correct Startup firm name");
  return false;
}

if (ffname.length < 3) {
  alert("Please fill correct first founder name");
  return false;
}

if (sfname.length < 3) {
  alert("Please fill correct second founder name");
  return false;
}

if (phone.length != 10) {
  alert("Please fill correct phone number");
  return false;
}
}
</script>
<body>
<?php require 'include/header/sign.php'; ?>
  <div class="header">
  	<h2>Register - Startup</h2>
    <hr>
  </div>

  <form method="post" action="register_st.php" name="register_st">
    <div class="content">
      	<div class="input-group">
      	  <label>Startup Firm Name</label>
      	  <input type="text" name="stname" autofocus required>
      	</div>
        <div class="input-group">
      	  <label>Email Address</label>
      	  <input type="email" name="email" required>
      	</div>
        <div class="input-group">
          <label>First Founder Name</label>
          <input type="text" name="ffname" required>
        </div>
        <div class="input-group">
          <label>Second Founder Name</label>
          <input type="text" name="sfname" required>
        </div>
        <div class="input-group">
          <label>Choose Industry</label>
          <select  name="type" required>
              <option value=""></option>
              <option value="Advertising">Advertising</option>
              <option value="Agriculture">Agriculture</option>
              <option value="Analytics">Analytics</option>
              <option value="Android">Android</option>
              <option value="Apps">Apps</option>
              <option value="Art">Art</option>
              <option value="Automotive">Automotive</option>
              <option value="B2B">B2B</option>
              <option value="Big Data">Big Data</option>
              <option value="Big Data Analytics">Big Data Analytics</option>
              <option value="Brand Marketing">Brand Marketing</option>
              <option value="Business Development">Business Development</option>
              <option value="Business Services">Business Services</option>
              <option value="Clean Energy">Clean Energy</option>
              <option value="Clean Technology">Clean Technology</option>
              <option value="Cloud Computing">Cloud Computing</option>
              <option value="Commercial Real Estate">Commercial Real Estate</option>
              <option value="Consulting">Consulting</option>
              <option value="Consumer Electronics">Consumer Electronics</option>
              <option value="Consumer Goods">Consumer Goods</option>
              <option value="Consumer Internet">Consumer Internet</option>
              <option value="Consumers">Consumers</option>
              <option value="Crowdfunding">Crowdfunding</option>
              <option value="Design">Design</option>
              <option value="Digital Marketing">Digital Marketing</option>
              <option value="Digital Media">Digital Media</option>
              <option value="E-Commerce">E-Commerce</option>
              <option value="E-Commerce Platforms">E-Commerce Platforms</option>
              <option value="Education">Education</option>
              <option value="Enterprise Software">Enterprise Software</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Events">Events</option>
              <option value="Fashion">Fashion</option>
              <option value="Finance">Finance</option>
              <option value="Fitness">Fitness</option>
              <option value="Food and Beverages">Food and Beverages</option>
              <option value="Games">Games</option>
              <option value="Hardware">Hardware</option>
              <option value="Health and Wellness">Health and Wellness</option>
              <option value="Hospitality">Hospitality</option>
              <option value="Human Resources">Human Resources</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Internet">Internet</option>
              <option value="iOS">iOS</option>
              <option value="Location Based Services">Location Based Services</option>
              <option value="Manufacturing">Manufacturing</option>
              <option value="Marketing">Marketing</option>
              <option value="Marketplaces">Marketplaces</option>
              <option value="Media">Media</option>
              <option value="Medical Devices">Medical Devices</option>
              <option value="Mobile">Mobile</option>
              <option value="Mobile Advertising">Mobile Advertising</option>
              <option value="Mobile Application">Mobile Application</option>
              <option value="Mobile Commerce">Mobile Commerce</option>
              <option value="Mobile Games">Mobile Games</option>
              <option value="Mobile Health">Mobile Health</option>
              <option value="Mobile Payments">Mobile Payments</option>
              <option value="Music">Music</option>
              <option value="Nonprofits">Nonprofits</option>
              <option value="Online Travel">Online Travel</option>
              <option value="Payments">Payments</option>
              <option value="Personal Health">Personal Health</option>
              <option value="Publishing">Publishing</option>
              <option value="Real Estate">Real Estate</option>
              <option value="Recruiting">Recruiting</option>
              <option value="Restaurants">Restaurants</option>
              <option value="Retail">Retail</option>
              <option value="Retail Technology">Retail Technology</option>
              <option value="SaaS">SaaS</option>
              <option value="Sales and Marketing">Sales and Marketing</option>
              <option value="Security">Security</option>
              <option value="Small and Medium Businesses">Small and Medium Businesses</option>
              <option value="Social Commerce">Social Commerce</option>
              <option value="Social Games">Social Games</option>
              <option value="Social Media">Social Media</option>
              <option value="Social Media Marketing">Social Media Marketing</option>
              <option value="Software">Software</option>
              <option value="Sports">Sports</option>
              <option value="Technology">Technology</option>
              <option value="Telecommunications">Telecommunications</option>
              <option value="Transportation">Transportation</option>
              <option value="Travel">Travel</option>
              <option value="User Experience Design">User Experience Design</option>
              <option value="Venture Capital">Venture Capital</option>
              <option value="Video">Video</option>
              <option value="Video Games">Video Games</option>
              <option value="Web Design">Web Design</option>
              <option value="Web Development">Web Development</option>

            </select>
        </div>
        <div class="input-group">
          <label>Address</label>
          <input type="text" name="address" required>
        </div>
        <div class="input-group">
          <label>City</label>
          <input type="text" name="city" required>
        </div>
        <div class="input-group">
          <label>State</label>
          <input type="text" name="state" required>
        </div>
        <div class="input-group">
      	  <label>Country</label>
          <select name="country" required>
            <option value=""></option>
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
      	  <label>Website</label>
      	  <input type="text" name="website" required>
      	</div>
        <div class="input-group">
          <label>Investment Received Till Date</label>
          <input type="number" name="inv" required>
        </div>
        <div class="input-group">
          <label>Phone</label>
          <input type="number" name="phone"required>
        </div>
        <div class="input-group">
        </div>
        <br><br><hr style="width:50%">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" required>
        </div>

      	<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required>
			<span class="tooltiptext">Use a password that has at least 8 characters, at least one number,
                one uppercase letter, one lowercase letter and one special symbol.</span>
      	</div>
        <div class="input-group">
        </div>
      	<div class="input-group">
      	  <label>Confirm password</label>
      	  <input type="password" name="password_2" placeholder="Re-enter password" required>
      	</div>
    </div>
    <div class="contbot">
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_st" onclick="validateForm()" style="background :#0e3c58;">Register Startup</button>
  	</div>
  	<p  style="font-size:15px">
  		Already a member? <a href="login_st.php">Sign in</a>
  	</p>
</div>
  </form>

<?php require "../include/footer/footersmall.php"?>
</body>
</html>
