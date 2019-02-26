<?php
    require '../../server.php';
    if(!isset($_SESSION['StpID'])){
        header('location: ../pageerror.php');
    }

    $u = $_SESSION['StpID'];
    
    $qu = "SELECT * FROM st_details WHERE StpID='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $Stname = $row['Stname'];
    
    $qu = "SELECT * FROM userstp WHERE StpID='$u'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $Password = $row['Password'];

	if(isset($_POST["changepw"]))
	{
        $curr_pw= mysqli_real_escape_string($db, $_POST['currentpassword']);
        $curr_pwd=sha1($curr_pw);
        $pw_1 = mysqli_real_escape_string($db, $_POST['pw_1']);
        $pw_2 = mysqli_real_escape_string($db, $_POST['pw_2']);
        $error=0;

        if ($Password != $curr_pwd) {
            echo "<script>alert('Your Password is incorrect')</script>";
            $error=$error+1;
        }
        if (strlen($pw_1) < 8) {
            echo "<script>alert('Enter Password Greater than 8 Characters')</script>";
            $error=$error+1;
           }
        if ($pw_1 != $pw_2) {
            echo "<script>alert('The two passwords do not match')</script>";
            $error=$error+1;
        }
        if ($error == 0){
            $pw=sha1($pw_1);
            $q = "UPDATE userstp set Password='$pw' where StpID='$u';";
			mysqli_query($db, $q);
            echo "<script>alert('Password Changed Successfully')</script>";
        }
    }

?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/settings.css" type="text/css">
    <title>Account- Change Password | NAMAN</title>
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
                    <a href="changepassword.php" class="five" ><span><i class="fa fa-fw fa-lock"style="font-size:24px"></i> Password</span></a>
                </div>
                </li>
            </UL>
        </nav>
  </div>
  <div class="three">
        <div class="hvr-float-shadow" >
                CHANGE PASSWORD </div>
      <hr>
        <form method="post" action="changepassword.php">
            <label for="current-password">Current Password*</label>
            <br>
            <input autocomplete="current-password" type="password" id="current-password" name="currentpassword" placeholder="Your current password..">
        <br>
            <label for="new-password">Password*</label>
            <br>
            <input autocomplete="new-password" type="password" id="new-password" name="pw_1" placeholder="Your  new password..">
        <br>
            <label for="confirm-password">Confirm Password*</label>
            <br>
            <input autocomplete="confirm-password" type="password" id="confirm-password" name="pw_2" placeholder="Confirm new password..">
        <br>
        <input type="submit" value="Change Password" name="changepw">
          </form>

  </div>

</div>
<?php require "../../include/footer/footer.php" ?>
</body>
</html>

