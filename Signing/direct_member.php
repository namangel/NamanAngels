<?php require('../server.php') ?>
<html>
<head>
  <title>Investor Membership</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php require 'include/header/sign.php'; ?>


  <div class="header"><h2>Investor Membership Form</h2><hr></div>
  <div>
  <form method="post" action="direct_member.php" onsubmit="validate()">

    <div class="content">
      <div class="input-group">
        <label>Company name</label>
        <input type="text" name="iname" autofocus required>
      </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="fname" required>
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" required>
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
      <select name="country"required>
        <option value="NULL"></option>
        <option value="AU">Australia</option>
        <option value="BD">Bangladesh</option>
        <option value="BT">Bhutan</option>n>
        <option value="CA">Canada</option>
        <option value="CN">China</option>
        <option value="FR">France</option>
        <option value="DE">Germany</option>
        <option value="HK">Hong Kong</option>
        <option value="IN">India</option>
        <option value="JP">Japan</option>
        <option value="KP">Democratic People's Republic of Korea</option>
        <option value="MY">Malaysia</option>
        <option value="NP">Nepal</option>
        <option value="NZ">New Zealand</option>
        <option value="RU">Russian Federation</option>
        <option value="SG">Singapore</option>
        <option value="LK">Sri Lanka</option>
        <option value="AE">United Arab Emirates</option>
        <option value="GB">United Kingdom</option>
        <option value="US">United States</option>
      </select>
      </div>
    <div class="input-group">
      <label>Phone</label>
      <input type="number" name="phone" required>
    </div>
</div>
<div class="contbot">
      <div class="input-group">
        <button type="submit" class="btn" name="dir_mem" style="background-color: #0e3c58;">Request Membership</button>
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
