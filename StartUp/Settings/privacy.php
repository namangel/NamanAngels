<?php require('../../server.php') ?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../css/account.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/stroke.css">
    </head>

<body>
  	<?php require '../include/header/stp_db.php'; ?>
    <div class="item2">
        <nav id="mainNav" class="stroke">
        <ul>
            <li><a href="../stp_landing.php">HOME</a></li>
            <li><a href="../DB/Overview.php">COMPANY PROFILE</a></li>
            <li><a href="#">TOOLS & SERVICES</a></li>
        </ul>
        </nav>
    </div>
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
        <article class="content" style="background:white">
            <div class="hvr-float-shadow" >
                CHANGE PASSWORD </div>


                    <hr>
                </h1>
                <div class="prii">
     <p><input type="checkbox" name="vehicle" value="Bike" onclick="changeimage()">Your privacy settings control how people can contact and connect with you on Gust. It's important to note that you are automatically connected to anyone affiliated to your company or organization.
                 People must enter my email address to send a connection request. </p>
             </div>

             </article>



  </div>


</div>
<?php require "../../include/footer/footer.php" ?>
<script>
        var image =  document.getElementById("imageOne");

        function changeimage() {
        if (image.src == "circleRed.png") {
            image.src = "circleBlue.png";
        } else {
            image.src = "circleRed.png";
        }
        }
        </script>
</body>
</html>
