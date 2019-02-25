<?php
  require "../server.php" ;
  if(!isset($_SESSION['adminID'])){
      header('location: index.php');
  }

  $id = $_SESSION['adminID'];
	$qu = "SELECT * FROM admin WHERE adminID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
  $AdminName = $row['AdminName'];

  $q = "SELECT * FROM userstp;";
	$results=mysqli_query($db, $q);
  $startup=mysqli_num_rows($results);

  $q1 = "SELECT * FROM userinv;";
	$results=mysqli_query($db, $q1);
  $investor=mysqli_num_rows($results);

  $q1 = "SELECT * FROM requests WHERE Deal=1;";
  $results=mysqli_query($db, $q1);
  $transactions=mysqli_num_rows($results);

  $q = "SELECT * FROM siteinfo where ID = '1'";
  $results=mysqli_query($db, $q);
  $row = mysqli_fetch_array($results);
  $pagehit = $row['Counter'];

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?=$AdminName?>'s Dashboard | NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Droid Sans', sans-serif;
        outline: none;
      }
      .cont{
        margin-left: 290px;
        z-index: -100;
      }
      ::-webkit-scrollbar {
        background: transparent;
        width: 5px;
        height: 5px;
      }
      ::-webkit-scrollbar-thumb {
        background-color: #888;
      }
      ::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.3);
      }
      body {background-color: #2a2b3d}
      #contents {
        position: relative;
        transition: .3s;
        margin-left: 290px;
        background-color: #2a2b3d;
      }
      .margin {
        margin-left: 0 !important;
      }
      .welcome {
        color: #CCC;
      }
      .welcome .content {
        background-color: #313348;
        padding: 15px;
        margin-top: 25px;
      }
      .welcome h2 {
        font-family: Calibri;
        font-weight: 100;
        margin-top: 0
      }
      .welcome p {
        color: #999;
      }

      /* Start users */

      .admins {
        margin-top: 25px;
      }
      .admins .box {

      }
      .admins .box > h3 {
        color: #ccc;
        font-family: Calibri;
        font-weight: 300;
        margin-top: 0;
      }
      .admins .box .admin {
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #313348;
        padding: 10px;
      }
      .admins .box .admin .img {
        width: 25%;
        margin-right: 5%;
        float: left;
      }
      .admins .box .admin .img img {
        border-radius: 50%;
      }
      .admins .box .info {
        width: 70%;
        color: #EEE;
        float: left;
      }
      .name{
        font-size: 22px;
        color:#ffc107;
      }
      .admins h3{
        color: white;
      }
      .admins .box .info h3 {font-size: 19px}
      .admins .box .info p {color: #BBB}

      /* End users */
      /* Start statis */

      .statis {
        color: #EEE;
        margin-top: 15px;
      }
      .statis .box {
        position: relative;
        padding: 15px;
        overflow: hidden;
        border-radius: 3px;
        margin-bottom: 25px;
      }
      .statis .box h3:after {
        content: "";
        height: 2px;
        width: 70%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.12);
        display: block;
        margin-top: 10px;
      }
      .statis .box i {
        position: absolute;
        height: 70px;
        width: 70px;
        font-size: 22px;
        padding: 15px;
        top: -25px;
        left: -25px;
        background-color: rgba(255, 255, 255, 0.15);
        line-height: 60px;
        text-align: right;
        border-radius: 50%;
      }

      .main-color {
        color: #ffc107
      }
      .warning {background-color: #f0ad4e}
      .danger {background-color: #d9534f}
      .success {background-color: #5cb85c}
      .inf {background-color: #5bc0de}


      /* Start media query */

      @media (max-width: 767px) {
        #contents {
          margin: 0 !important
        }
        .statistics .box {
          margin-bottom: 25px !important;
        }
        .navbar-default .navbar-nav .open .dropdown-menu>li>a {
          color: #CCC !important
        }
        .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
          color: #FFF !important
        }
        .navbar-default .navbar-toggle{
          border:none !important;
          color: #EEE !important;
          font-size: 18px !important;
        }
        .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {background-color: transparent !important}
      }
    </style>
  </head>
  <body>
  <?php require "sidebar.php" ?>
  <div class="cont">
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2>Welcome <?php echo $AdminName;?>!</h2>
                <p>Manage your website through the dashboard and view the progress.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class='statis text-center'>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="box bg-primary">
                <i class="fa fa-eye"></i>
                <h3><?= $pagehit?></h3>
                <p class="lead">Page views</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box danger">
                <i class="fa fa-rocket"></i>
                <h3><?php echo $startup ;?></h3>
                <p class="lead">Startups registered</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box warning">
                <i class="fa fa-money"></i>
                <h3><?php echo $investor ;?></h3>
                <p class="lead">Investors registered</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box success">
                <i class="fa fa-handshake-o"></i>
                <h3><?php echo $transactions ;?></h3>
                <p class="lead">Transactions</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
            $qu = "SELECT * FROM admin";
            $results = mysqli_query($db, $qu);
            echo '
                  <section class="admins">
                    <div class="container-fluid">
                    <div class="row">

                     <h3>  &nbsp;&nbsp;&nbsp;Admins:</h3>

            ';

            while($row = mysqli_fetch_assoc($results))
            {
                    echo '
                      <div class="col-md-6">
                      <div class="box">
                            <div class="admin">
                              <div class="img">
                              <img class="img-responsive" src="../'.$row['ProfilePic'].'" style="border-radius:50%;"/>
                              </div>
                              <div class="info"><br><br>
                              <font class="name">'.$row['AdminName'].'</font><br><br>
                              <p class="designation">'.$row['AdminDesgn'].'</p></center>
                              </div>
                            </div>
                            </div>
                            </div>';
            }
            echo '
            </div>
            </div>
            </section>
            ';
            ?>

      </section>
      </div>
      <!-- <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
      <script src='js/dashboard.js'></script> -->
      </body>
    </html>
