<?php 
    require '../../server.php';

    $u = $_SESSION['username'];
    $qu = "SELECT * FROM user_inv WHERE Username='$u'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $Password = $row['Password'];

    if(isset($_POST["changepw"]))
	{
        $curr_pw= mysqli_real_escape_string($db, $_POST['currentpassword']);
        $curr_pwd=sha1($curr_pw);
        $pw_1 = mysqli_real_escape_string($db, $_POST['pw_1']);
        $pw_2 = mysqli_real_escape_string($db, $_POST['pw_2']);

        if ($Password != $curr_pwd) {
            array_push($errors, "Your password is incorrect");
        }
        if (strlen($pw_1) < 8) {
            array_push($errors, "Enter Password Greater than 8 Characters");
           }
        if ($pw_1 != $pw_2) {
            array_push($errors, "The two passwords do not match");
        }
        if (count($errors) == 0){
            $pw=sha1($pw_1);
            $q = "UPDATE user_inv set Password='$pw' where Username='$u';";
			mysqli_query($db, $q);
        }
    }

?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/settings.css" type="text/css">
    <title>Settings</title>
</head>

<body>
  	<?php require '../include/header/inv_db.php'; ?>
    <?php require "../include/nav/nav.php"?>
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

                <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <a href="managecompanies.php" class="five"><span><i class="fa fa-fw fa-user" style="font-size:24px" ></i> Manage Companies</span></a>
                </div>
                </li>

                <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <a href="privacy.php" class="five"><span> <i class="fa fa-fw fa-wrench" style="font-size:24px"></i>Privacy Settings</span></a>
                </div>
                </li>

                <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <a href="email.php" class="five"><span>  <i class="fa fa-fw fa-envelope" style="font-size:24px" ></i> Email Settings</span></a>
                </div>
                </li>
            </UL>
        </nav>
  </div>
  <div class="three">
        <div class="hvr-float-shadow" >
                CHANGE PASSWORD </div>
      <hr>

      <?php include 'errors.php';?>

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
<!-- <script>
        var newPassword = document.getElementById("new_password");
        var confirmPassword = document.getElementById("confirm_password");

        function validatePassword() {
            if (newPassword.value != confirmPassword.value) {
                document.getElementById("confirm_password").setCustomValidity("Passwords do not match!");
            } else {
                //empty string means no validation error
                document.getElementById("confirm_password").setCustomValidity('');
            }
        }
        newPassword.addEventListener("change", validatePassword);
        confirmPassword.addEventListener("change", validatePassword);
      </script> -->
