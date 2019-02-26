<?php require('../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: pageerror.php');
    }
    $u = $_SESSION['InvID'];
	  $qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	  $row = mysqli_fetch_assoc($results);
    $cname = $row['CName'];
?>
<html>
<head>
  <title>Demo Request Response| NAMAN</title>
  <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .message{
        font-size: 22px;
        margin: 90px;
        font-weight: light;
        background-color: #F4F5F6;
        padding: 50px;
    }
  </style>
</head>

<body>
    <?php require '../../include/header/sign.php'; ?>
    <div>
    <center><img src="../../img/Logo2.png" height="150px" style="margin-top: 40px;">
    <div class="message">A mail has been sent to Naman Angels and you will recieve a reply from our team shortly.
    <br>Thank you for consulting with Naman Angels!!</div></center>
    </div>
    <?php require "../../include/footer/footer.php"?>
</body>
</html>
