<?php require('../server.php') ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\stp_landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
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
                        <center>
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
                <big><center><b>Approach investors</b></big></center>
                <br>
                <br>
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
            <big><b>Find Relevant Investors.</b></big><br><br>
                Most investor Groups focus on industries with which they're familiar.<br>
                      Selecting your industry will help us put you in front of the right investors.<br><br>
                <label><big><b>
                  Select your industry
                    <input list="industry" name="industry" size="50">
                  </b></big><label><br>
                    <datalist id="industry" size="50">
                        <option value="Aerospace">
                        <option value="Agricultre">
                        <option value="Biotechnology">
                        <option value="Bussiness Products">
                        <option value="Bussiness Services">
                        <option value="Chemicals and Chemical Products">
                        <option value="Clean Technology">
                        <option value="Computers and Peripherals">
                        <option value="Construction">
                        <option value="Consulting">
                        <option value="Consumer Products">
                        <option value="Consumer services">
                        <option value="Digital Marketing">
                        <option value="Education">
                        <option value="Electronics/Instrumentation">
                        <option value="Fashion">
                        <option value="Financial Services">
                        <option value="Fintech">
                        <option value="Food and Beverage">
                        <option value="Gaming">
                        <option value="Healthcre Services">
                        <option value="Industrial/Energy">
                        <option value="Inetrnet/ Web Services">
                        <option value="IT Services">
                        <option value="Legal">
                        <option value="Lifestyle">
                        <option value="Marine">
                        <option value="Maritime/Shipping">
                        <option value="Marketing/Advertising">
                        <option value="Media and Entertainment">
                        <option value="Medical Devices and Equipments">
                        <option value="Mining">
                        <option value="Mobile">
                        <option value="Nanotechnology">
                        <option value="Networking and Equipment">
                        <option value="Oils and Gases">
                        <option value="Other">
                        <option value="Real Estate">
                        <option value="Retailing/Distribution">
                        <option value="Robotics">
                        <option value="Security">
                        <option value="Semiconductors">
                        <option value="Software">
                        <option value="Sports">
                        <option value="Telecommunications">
                        <option value="Transportation">
                        <option value="Travel">
                    </datalist><br>
                <a href="#" class="button"><b>FIND INVESTOR</b></a>
                <br>
                <br>
        </div>
        <div class="item7">
            <a href="#" class="button2"><b>DOWNLOAD ONE PAGER</b></a>
            <a href="#" class="button2"><b>SHARE YOUR PROFILE</b></a>
            <a href="#" class="button2"><b>APPLY FOR FUNDING</b></a>
            <br><br><br>
        </div>
      </div>
      <?php require '../include/footer/footer.php'; ?>
</html>
