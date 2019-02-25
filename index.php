<?php require("server.php");
    $_SESSION['binvlink'] = "investor/binv";
if(isset($_SESSION['StpID']) || isset($_SESSION['InvID'])){
    $_SESSION['binvlink'] = '#';
}

$q = "UPDATE siteinfo SET Counter = Counter + 1 WHERE ID = 1";
mysqli_query($db, $q);


?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Home | NAMAN</title>
        <link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="16x16">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="css\home.css">
    </head>

    <body>

        <?php
        if(isset($_SESSION['StpID']) || isset($_SESSION['InvID'])){
            require "include/header/mainheaderlogin.php";
        }
        else{
            require "include/header/mainheader.php" ;
        }
        ?>
        <div class="grid-container">

            <div class="item2">
                <center>
                    <img src="img/Logo.png" style="height: 280px; ">
                    <p style="font-size:2vw;"><font style="color:#7f8c8d;">Naman connects startups with the largest collection of investors across India.</font></p>
                </center>
            </div>

            <div class="dummy1"></div>

            <div class="item3 container">
                <center>
                    <b><p class="cs2" >FOR STARTUPS</p></b>
                    <img src="img/Idea-man.png" height="120" width="120"><br>
                    <div class="overlay">
                        <div class="text"><br><br>Build a profile and share it with investors to get funding.<br><button onclick="location.href='static_st.php'" class="learn_more_bt">Learn More</button></div>
                    </div>
                </center>
            </div>
            <div class="item4 container">
                <center>
                    <b><p class="cs2" >FOR INVESTORS</p></b>
                    <img src="img/Investor-man.png" height="120" width="120"><br>
                	<div class="overlay">
                	       <div class="text"><br><br>Access powerful deal flow on a secure platform.<br><button onclick="location.href='static_inv.php'" class="learn_more_bt">Learn More</button></div>
                    </div>
                </center>
            </div>

            <div class="dummy2"></div>

            <div class="item6">
                <center>
                    <br><br>
                    <font style="font-size:4vw;font-family:Arial;">GET STARTED</font>
                    <p style="font-size:2vw;color:#7f8c8d;">Our services have helped numerous founders start, grow and fund their companies.</p>
                </center>
            </div>

            <div class="item7">
                <div class="sub sub1" style="text-overflow:ellipsis;">
                    <br><br>
                    <b>Incorporate and grow your company</b>
                    <p style="font-size:1.5vw;color:#7f8c8d;">Start and run your company with startup legal, accounting and financial tools, and services all in one place.</p>
                </div>

                <div class="sub sub2">
                    <br><br>
                    <b>Keep track of company ownership</b>
                    <p style="font-size:1.5vw;color:#7f8c8d;">Easily manage your cap table, issue stock, model fundraising scenarios, simplify investor due diligence and stay tax complaint.</p>
                </div>
                <br><br><br><br><br><br><br>
                <center><div class="sub">
                    <br><br>
                    <b>Raise capital from angel investors</b>
                    <p style="font-size:1.5vw;color:#7f8c8d;">We provide access to hundreds of angel groups across the world and will help you apply to the right ones for you.</p>
                </div>
                <br><br>
                </center>
            </div>

            <div class="item8">
                <center>
                <br>
                <font style="font-family:Arial;">BROWSE THROUGH INDUSTRIES</font>
                <div class="wrapper-child2">
                  <a href='<?= $_SESSION['binvlink'] ?>' class="nolink">
                    <div>
                        <div class="polaroid" style="margin-left:20px;margin-top:70px;">
                            <img src="img/Internet.png" alt="Web Services" style="width:60% ; margin-top:20px;">
                            <div class="container2">
                                <p><b style="font-size:1.5vw;">Internet/Web Services</b></p>
                            </div>
                        </div>
                    </div>
                  </a>
                  <a href='<?= $_SESSION['binvlink'] ?>' class="nolink">
                    <div>
                        <div class="polaroid" style="margin-left:20px;margin-top:70px;">
                            <img src="img/Food.png" alt="Food and Drink" style="width:67% ; margin-top:20px;">
                            <div class="container2">
                                <p><b style="font-size:1.5vw;">Food and Drink</b></p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href='<?= $_SESSION['binvlink'] ?>' class="nolink">
                    <div>
                        <div class="polaroid" style="margin-left:20px;margin-top:70px;">
                            <img src="img/Media.png" alt="Chennai" style="width:65% ; margin-top:20px;">
                            <div class="container2">
                                <p><b style="font-size:1.5vw;">Media and Entertainment</b></p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href='<?= $_SESSION['binvlink'] ?>' class="nolink">
                    <div>
                        <div class="polaroid" style="margin-left:20px;margin-top:70px;">
                            <img src="img/Education.png" alt="Education" style="width:65% ; margin-top:20px;">
                            <div class="container2">
                                <p><b style="font-size:1.5vw;">Education</b></p>
                            </div>
                        </div>
                    </div>
                  </a>
                  <a href='<?= $_SESSION['binvlink'] ?>' class="nolink">
                    <div>
                        <div class="polaroid" style="margin-left:20px;margin-top:70px;">
                            <img src="img/Software.png" alt="Software" style="width:65% ; margin-top:20px;">
                            <div class="container2">
                                <p><b style="font-size:1.5vw;">Software</b></p>
                            </div>
                        </div>
                    </div>
                  </a>

                </div>

                <br>

                <div class="item11">
                    <div class="wrapper-child3" style="margin-left:120px;">
                        <div>
                            <center>
                                <img src="img/Protection.png" height="90" width="90"><br>
                                <font style="font-size:30px;font-family:Arial;">The Trusted Network</font>
                                <p style="font-size:1.2vw;">Tens of thousands of accredited investors worldwide use Naman.
                                to connect and collaborate with startup companies.</p>
                            </center>
                        </div>

                        <div>
                            <center>
                                <img src="img/Padlock.png" height="90" width="90"><br>
                                <font style="font-size:30px;font-family:Arial;">Robust Privacy Controls</font>
                                <p style="font-size:1.2vw;">Naman. enables you to control your privacy settings, profile visibility and who has access to your information.
                                What's private stays private.</p>
                            </center>
                        </div>

                        <div>
                            <center>
                                <img src="img/Network.png" height="90" width="90"><br>
                                <font style="font-size:30px;font-family:Arial;">The Industry Standards</font>
                                <p style="font-size:1.2vw;">With more than 1,500 investment groups across 150+ countries,
                                Naman. is the global industry standard for early stage investing.</p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="item10">
                    <br><br><br>
                    <center>
                    Leverage the power of the India's largest startup network<br><br>
                    <?php
                    if(!(isset($_SESSION['StpID']) || isset($_SESSION['InvID']))){
                        echo '<button class="button1" onclick="location.href=\'Signing/register.php\'">GET STARTED FOR FREE</button>';
                  }
                     ?>
                    <br><br><br>
                    </center>
                </div>
            </div>
        </div>
        <?php
            include "include/footer/footer.php";
        ?>

</body>
</html>
