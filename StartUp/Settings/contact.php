<?php require('../../server.php') ?>
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
              <a href="changepassword.php" class="five"><span><i class="fa fa-fw fa-lock"style="font-size:24px"></i> Password</span></a>
            </div>
            </li>

            <li class="var_nav">
            <div class="link_bg"></div>
            <div class="link_title">
              <a href="managecompanies.php " class="five"><span><i class="fa fa-fw fa-user" style="font-size:24px" ></i> Manage Companies</span></a>
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
            CONTACT INFORMATION </div>
      <hr>

        <form action="/action_page.php">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

            <label for="country">Country</label>
            <br>
            <select id="country" name="country">
              <option value="australia">Australia</option>
              <option value="canada">Canada</option>
              <option value="usa">USA</option>
            </select>

           <br>
           <br>

            <input type="submit" value="Submit">
          </form>
  </div>
</div>
<?php require "../../include/footer/footer.php" ?>
</body>
</html>
