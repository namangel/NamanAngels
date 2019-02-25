<?php

  require '../../server.php';
  if(!isset($_SESSION['StpID'])){
      header('location: ../pageerror.php');
  }

  $u = $_SESSION['StpID'];
  $qu = "SELECT * FROM st_details WHERE StpID='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$ID = $row['StpID'];
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
	$Sfname = $row['Sfname'];
  $Email = $row['Email'];

  $qu = "SELECT * FROM userstp WHERE StpID='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$Password = $row['Password'];

  if(isset($_POST["contactset"]))
	{
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
		if($fname != NULL)
		{
			$q = "UPDATE st_details set Ffname='$fname' where StpID='$u';";
			mysqli_query($db, $q);
    }
    if($lname != NULL)
		{
			$q = "UPDATE st_details set Sfname='$lname' where StpID='$u';";
			mysqli_query($db, $q);
    }
    if($email != NULL)
		{
			$q = "UPDATE st_details set Email='$email' where StpID='$u';";
			mysqli_query($db, $q);
    }
    if($phone != NULL)
		{
			$q = "UPDATE st_details set Phone='$phone' where Username='$u';";
			mysqli_query($db, $q);
		}
		header('location: contact.php');
  }

?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../css/settings.css" type="text/css">
<title>Account- Contact | NAMAN</title>
<link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>

<body>
  	<?php require '../include/header/stp_db.php'; ?>
    <?php require '../include/nav/nav.php'; ?>
<div class="wrapper">
  <div class="two">
      <div class=hvr-float-shadow >ACCOUNT SETTINGS</div>
      <hr>
      <nav class="nav1">
          <UL>
            <li class="var_nav">
            <div class="link_bg"></div>
            <div class="link_title">
              <a href="contact.php" class="five"><span> <i class="fa fa-fw fa-home" style="font-size:24px"></i>Contact Information</span></a>
           </div>
           </li>

            <li class="var_nav">
            <div class="link_bg"></div>
            <div class="link_title">
              <a href="changepassword.php" class="five"><span><i class="fa fa-fw fa-lock"style="font-size:24px"></i> Password</span></a>
            </div>
            </li>
        </UL>
    </nav>
  </div>
  <div class="three">
    <div class="hvr-float-shadow" >
            CONTACT INFORMATION </div>
      <hr>

        <form  method="post" action="contact.php">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="Enter your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Enter your last name..">

            <label for="email">Email</label>
            <br>
            <input type="email" id="email" name="email" placeholder="Enter your email.."
            style="border: 1px solid rgb(133, 166, 194); width:100%; padding: 12px; border-radius: 4px;
                  box-sizing: border-box;
                  margin-top: 6px;
                  margin-bottom: 16px;
                  resize: vertical;">

            <label for="email">Phone Number</label>
            <br>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number.."
            style="border: 1px solid rgb(133, 166, 194); width:60%; padding: 12px; border-radius: 4px;
                  box-sizing: border-box;
                  margin-top: 6px;
                  margin-bottom: 16px;
                  resize: vertical;">

           <br>
           <br>

            <input type="submit" value="Submit" name="contactset">
          </form>
  </div>
</div>
<?php require "../../include/footer/footer.php" ?>
</body>
</html>
