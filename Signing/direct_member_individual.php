<?php require('../server.php') ?>
<html>
<head>
  <title>Individual Investor Membership | NAMAN</title>
  <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="css/membership.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
function validateForm() {
var fname = document.forms["direct_member"]["fname"].value;
var lname = document.forms["direct_member"]["lname"].value;
var phone = document.forms["direct_member"]["phone"].value;
var iname = document.forms["direct_member"]["iname"].value;


if (iname.length < 3) {
  alert("Please fill correct company name");
  return false;
}

if (fname.length < 3) {
  alert("Please fill correct first name");
  return false;
}

if (lname.length < 3) {
  alert("Please fill correct last name");
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


  <div class="header"><h2>Investor Membership Form</h2><hr></div>
  <div>
  <form method="post" name="direct_member" action="direct_member_institution.php" onsubmit="validateForm()">

    <div class="content">
    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="fname" required>
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" required>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
   
    <div class="input-group">
      <label>Phone</label>
      <input type="number" name="phone" required>
    </div>
    <div class="input-group">
      <textarea rows="10" name="query" placeholder="Enter queries about membership here.."></textarea>
    </div>  
  
    <div class="contbot">
          <div class="input-group">
            <button type="submit" onclick="validateForm()"class="btn" name="dir_mem" style="background-color: #0e3c58;">Request Membership</button>
          </div>
          <p style="font-size:15px">
              Already a member? <a href="login_inv.php">Sign in</a>
          </p>
    </div>
  </form>
</div>
<?php require "../include/footer/footersmall.php"?>
</body>
</html>
