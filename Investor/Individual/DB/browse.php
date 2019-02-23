<?php
    require('../../../server.php');
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
    <link rel="stylesheet" href="../css/browseby.css" type="text/css">
  <style media="screen">
      .sbname{
        text-align: center;
        font-size: 50px;
      }
  </style>
  <title>Find Your StartUp - NamanAngels</title>
</head>
<body>

    <?php require "../include/header/inv_db.php"?>
    <?php require "../include/nav/nav.php"?>
  <div class="main">
      <div class="name">

          <div class="image">
            <a href="browsebyname.php" title="Browse by name"><img src="../img/Name.png"></a>
          </div>
            <h3>BROWSE BY STARTUP NAME</h3>
          <br>
      </div>
      <div class="ind">

          <div class="image">
            <a href="browsebyindustry.php" title="Browse by industry"><img src="../img/IndCluster.png"></a>
          </div>
          <h3>BROWSE BY INDUSTRY TYPE</h3>
          <br>
      </div>
  </div>

    <?php require "../../../include/footer/footer.php"?>


</body>
</html>