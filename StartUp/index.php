<?php require('../server.php');

    if(!isset($_SESSION['StpID'])){
        header('location: pageerror.php');
    }

    $id = $_SESSION['StpID'];
    $qu = "SELECT * FROM st_details WHERE StpID = '$id'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $Stname = $row['Stname'];

    $qu = "SELECT * FROM userstp WHERE StpID = '$id'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);

    if($row['Verified'] == 0){
        $verify = "RED";
        $acctype = "Verify Yourself";
        $message = 'Your Account is not yet verified By Naman Angels. Please continue to complete your profile and have an early verification.';
    }
    else{
        $verify = "Green";
        $acctype = "Verified Account";
        $message = 'Verified';
    }



 ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\stp_landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $Stname?>-Home | NAMAN</title>
  	<link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>
<body>
      <?php require 'include/header/stp_land.php'; ?>
      <?php require 'include/nav/nav.php'; ?>
  <div class="outer-grid">
         <div class="item3">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true" style="color:<?= $verify?>" title="<?= $acctype?>"></i>&nbsp;&nbsp;<b>Hello <?= $Stname?>!!</b><p style="color:gray; font-size:10px"><?=$message?></p></h2>

          </div>

            <div class="eval">
                    <div class="eval-info">
                        <center><br><br>
                        <big><b>Evaluate your startup.</b></big><br><br>
                        <font>Find out what investors think of your<br>
                        startup. Our automated fundraising coach<br>
                        will help you understan and maximize<br>
                        you project's chaneces of raising money.</font><br><br>
                        <a href="DB/evaluate.php" class="button" target="blank"><b>EVALUATE</b></a>
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
            <i class="fa fa-check-circle-o button1">&nbsp;Build Your Profile</i><br>
            <i class="fa fa-check-circle-o button1">&nbsp;Verify Yourself</i></a><br>
            <i class="fa fa-check-circle-o button1">&nbsp;Get Discovered</i></a><br>
            <i class="fa fa-check-circle-o button1">&nbsp;Get Funding</i></a>
            <br><br><br>
        </div>
        <div class="item6">
            <big><b>Find Relevant Investors.</b></big><br><br><br>
                <p>Most investor Groups focus on industries with which they're familiar.<br>
                Selecting your industry will help us put you in front of the right investors.<br><br></p>
                <br>
                <button type="button" onclick="window.location.href='DB/index.php'" class="button" style="width:30%"><b>Build Your Profile</b></button>
                <br>
        </div>
      </div>
      <?php require '../include/footer/footer.php'; ?>
</html>
