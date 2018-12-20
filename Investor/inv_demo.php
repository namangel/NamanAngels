<?php require('../server.php') ?>
<html>
    <head>
        <title>Demo - NamanAngels</title>
        <link rel="stylesheet" type="text/css" href="css/inv_demo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <?php require "include/header/inv_land.php"?>
        <?php require "include/nav/nav.php"?>

        <div class="main">
            <div class="call">
                <center>
                <h3>Introductory call</h3>
                <div class="image"><img src="../img/call.png"></div>
                <br>
                <i class="fa fa-phone" style="font-size:20px"> +91 9876543211</i><br>
                <i class="fa fa-phone" style="font-size:20px"> +91 9876543211</i>
                <p style="color: gray; font-size:10pt;">Contact us on any of these numbers for an introductory call.</p>
                </center>
            </div>
            <div class="meet">
                <center>
                <h3>Schedule a meeting</h3>
                <div class="image"><img src="../img/meet.png"></div>
                <br>
                <button class="butn">Meet us</button>
                <p style="color: gray; font-size:10pt;">By clicking above, we will be notified of your request to meet.<br>We will contact you shortly.</p>
                </center>
            </div>
        </div>

        <?php require "../include/footer/footer.php"?>
    </body>
</html>