<?php
    require '../../server.php';
    if(!isset($_SESSION['StpID'])){
        header('location: ../pageerror.php');
    }

    $u = $_SESSION['StpID'];

    if(isset($_POST["upload"]))
	{
        $cname = mysqli_real_escape_string($db, $_POST['cname']);
        if($cname != NULL)
		{
			$q = "UPDATE st_details set Stname='$cname' where StpID='$u';";
			mysqli_query($db, $q);
        }
        $check = getimagesize($_FILES["cbpic"]["tmp_name"]);
		if($check != false)
		{
			$file_name = $_FILES['cbpic']['name'];
			$file_size = $_FILES['cbpic']['size'];
			$file_tmp = $_FILES['cblpic']['tmp_name'];
			$file_type = $_FILES['cbpic']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['cbpic']['name'])));

			$extensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$extensions)=== false)
			{
				echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
			}
			else
			{
				if($file_size > 5242880)
				{
					echo "<script>alert('File size must be less than 5 MB')</script>";
				}
				else
				{
					$upload = "/NamanAngels/Uploads/".$file_name;
					move_uploaded_file($file_tmp,$upload);
					$q = "UPDATE st_uploads set Logo='$upload' where StpID='$u';";
					mysqli_query($db, $q);
					echo "<script>alert('Successfully Uploaded')</script>";
				}
			}
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
                MANAGE COMPANIES </div>
      <hr>


                    <form method="post" action="managecompanies.php" enctype="multipart/form-data">
                        Company name:<br>
                        <input type="text" name="cname" placeholder="Enter Company Name.." size=100px>
                             <br>
                         Profile Pic:<br>
                        <input type="file" name="myimage">
                        <br>
                        <br>
                        <br>
                        <input type="submit" name="upload" value="Upload">
                       </form>
  </div>

</div>
<?php require "../../include/footer/footer.php" ?>
</body>
</html>
<!--
<script>
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
