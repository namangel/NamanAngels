<?php
    require('../../server.php');
    if(isset($_POST['indsubmit'])){
        $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['indsearchkey']);
        header('location: browse.php?pageno=1');
    }
    else{
        $_SESSION['search'] = "";
    }
?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style media="screen">
      .sbname{
          padding: 40px;
        text-align: center;
        font-size: 50px;
      }
  </style>
  <title>Find Your StartUp - NamanAngels</title>
</head>
<body>

    <?php require "../include/header/inv_db.php"?>
    <?php require "../include/nav/nav.php"?>
    <div class="sbname">
        <a href="browsebyname.php">Search By Name</a>
    </div>

    <div class="sbname">
        <a href="browsebyindustry.php">Search By Industry</a>
    </div>

    <?php require "../../include/footer/footer.php"?>


</body>
</html>
