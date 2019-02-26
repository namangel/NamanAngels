<?php require('../server.php');

if(isset($_SESSION['InvID'])){
	header('location: ../Investor/index.php');
}
// $_SESSION["type"]
?>
<html>
<head>
  <title>Register Membership | NAMAN</title>
  <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  .content{
    width: 80%;
  }
  </style>
</head>

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
  function validateForm() {
  var fname = document.forms["register_mem"]["fname"].value;
  var lname = document.forms["register_mem"]["lname"].value;
  var phone = document.forms["register_mem"]["phone"].value;
  var iname = document.forms["register_mem"]["iname"].value;



  if (fname.length < 3) {
    alert("Please fill correct first name");
    return false;
  }

  if (lname.length < 3) {
    alert("Please fill correct last name");
    return false;
  }

  if (iname.length < 3) {
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
<div style="min-height:500px;">
  <div class="header"><h2>Register - Membership</h2><hr></div>
          <center>
              <div class="type">
                <form method="POST" name="register_mem_select" >
                  <label>Type of investor</label>
                  <select name="type" onchange="show()" id="selecttype" required>
                    <option value="NULL">--select--</option>
                    <option value="Individual">Individual</option>
                    <option value="Institution">Institution</option>
                  </select>
                </form>
              </div>
            </center>

          <div class="content" id="individual" style="display:none">
            <form method="POST" name="register_mem" action="register_mem.php">
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
                  <input type="email" name="email"required>
                </div>
                <div class="input-group">
                  <label>Phone</label>
                  <input type="number" name="phone" required>
                </div>
                <br><br><br><br><hr style="width:50%, height:10%;"><br><br>
                <div class="input-group">
                  <label>Member ID</label>
                  <input type="text" name="username" required>
                </div>
                  <div class="contbot" id="contbot">
                      <div class="input-group">
                        <button type="submit" class="btn" name="reginv_mem" onclick="validateForm()" style="background-color: #0e3c58;">Register Member</button>
                      </div>
                  </div>
                </form>
              </div>


            <div class="content" id="institution"style="display:none">
              <form method="POST" name="register_mem" action="register_mem.php">
                <div class="input-group">
                  <label>Company Name</label>
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
                <div class="input-group">
                </div>
                <br><br><hr style="width:50%, height:10%;"><br><br>
                <div class="input-group">
                  <label>Membership ID</label>
                  <input type="text" name="username" required>
                </div>
                <div class="contbot" id="contbot">
                  <div class="input-group">
                    <button type="submit" class="btn" name="reginv_inst" onclick="validateForm()" style="background-color: #0e3c58;">Register Member</button>
                  </div>
                </div>
              </form>
          </div>
</div>

<?php require "../include/footer/footersmall.php"?>
</body>
</html>
