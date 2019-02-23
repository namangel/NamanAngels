<?php require('../server.php') ?>
<html>
<head>
  <title>Investor Membership</title>
  <link rel="stylesheet" type="text/css" href="css/register.css">
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
  <form method="post" name="direct_member" action="direct_member.php" onsubmit="validateForm()">

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
      <label>Phone</label>
      <input type="number" name="phone" required>
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
<?php require "../include/footer/footer.php"?>
</body>
</html>
<style>
 /* body {
  background: white;
  margin: 0px;
  padding: 0px;
}

.header {
  width: 30%;
  margin: 10px auto 0px;
  text-align: center;
  padding: 10px;
}
.content{
  width: 90%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  text-align: center;
}
.input-group{
  position: relative;
  display: inline-block;
  width:48%;
}

.input-group label, .input-group input, .input-group select{
  margin: 10px 0px 10px 0px;
  display: inline-block;
  width: 40%;
  padding: 10px;
  font-size: 16px;
  text-align: left;
}


.input-group .tooltiptext {
  visibility: hidden;
  width: 275px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 60%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
  }

  .input-group .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
  }

  .input-group:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
  }
.contbot{
    display: block;
    text-align: right;
    margin: 50px;
}
.contbot .btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  border: none;
  border-radius: 5px;
}
#individual, #insitution{
  display: none;
}
.type{
    display: inline-block;
    width:40%;
}

.type label, .type input, .type select{
  margin: 0px 0px 10px 0px;
  display: inline-block;
  width: 40%;
  padding: 10px;
  font-size: 16px;
  text-align: left;
}

  </style>