<?php require('../server.php') ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\stp_landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>StartUp Profile - NamanAngels</title>
</head>
<body>
      <?php require 'include/header/stp_land.php'; ?>
      <?php require 'include/nav/nav.php'; ?>
  <div class="outer-grid">

         <div class="item3">
            <h1><b>Hello!</b></h1>
          </div>

            <div class="eval">
                    <div class="eval-info">
                        <center><br><br>
                        <big><b>Evaluate your startup.</b></big><br><br>
                        <font>Find out what investors think of your<br>
                        startup. Our automated fundraising coach<br>
                        will help you understan and maximize<br>
                        you project's chaneces of raising money.</font><br><br>
                        <a href="#" class="button"><b>EVALUATE</b></a>
                        </center>
                    </div>
                    <div class="eval-img">
                        <center>
                            <img src="../img/Launch.png" height="300px">
                        </center>
                    </div>
            </div>

        <div class="item4">
                <br><br><br>
                <big><center><b style="color: #003866;">APPROACH INVESTORS</b></big></center>
                <br><br><br>
        </div>

        <div class="item5">
            <big><b>Steps to get funded</b></big><br><br>
            <a href="#" class="button1"><i class="fa fa-check-circle-o">Find Relevant Investors</i></a><br>
            <a href="#" class="button1"><i class="fa fa-check-circle-o">Communicate your venture</i></a><br>
            <a href="#" class="button1"><i class="fa fa-check-circle-o">Get discovered</i></a><br>
            <a href="#" class="button1"><i class="fa fa-check-circle-o">Get funding from Investors</i></a>
            <br><br><br>
        </div>
        <div class="item6">
            <big><b>Find Relevant Investors.</b></big><br><br><br>
                Most investor Groups focus on industries with which they're familiar.<br>
                Selecting your industry will help us put you in front of the right investors.<br><br>
                <br>
                <button type="button" onclick="window.location.href='DB/Overview.php'" style="width:30%; height:40px; background:#B2DCFF;">Continue Building Your Company Profile</button>
                <br>
        </div>
      </div>
      <?php require '../include/footer/footer.php'; ?>
</html>
