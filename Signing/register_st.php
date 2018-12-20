<?php require('../server.php') ?>
<html>
<head>
  <title>Register Yourself - NamanAngels</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
<?php require 'include/header/sign.php'; ?>
  <div class="header">
  	<h2>Register - Startup</h2>
    <hr>
  </div>

  <form method="post" action="register_st.php">
      <?php include('errors.php'); ?>
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


        <div class="input-group">
      	  <label>Website</label>
      	  <input type="text" name="website" required>
      	</div>
        <div class="input-group">
          <label>Investment Received Till Date</label>
          <input type="text" name="inv" required>
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
      	  <input type="password" name="password_1"required>
      	</div>
        <div class="input-group">
        </div>
      	<div class="input-group">
      	  <label>Confirm password</label>
      	  <input type="password" name="password_2"required>
      	</div>
    </div>
    <div class="contbot">
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_st" style="background :#7ec5fd;">Register Startup</button>
  	</div>
  	<p  style="font-size:15px">
  		Already a member? <a href="login_st.php">Sign in</a>
  	</p>
</div>
  </form>

<?php require "../include/footer/footer.php"?>
</body>
</html>
