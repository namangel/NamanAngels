<?php
if(!isset($_SESSION['adminID'])){
    header('location: index.php');
}
  $id = $_SESSION['adminID'];
	$qu = "SELECT * FROM admin WHERE adminID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$AdminName = $row['AdminName'];
  $AdminDesgn = $row['AdminDesgn'];
  $ProfilePic = $row['ProfilePic'];
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
    <style>
      * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Droid Sans', sans-serif;
      outline: none;
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
      body {background-color: #2a2b3d;}
      #contents {
        position: relative;
        transition: .3s;
        margin-left: 290px;
        background-color:#5c98f2;
      }

      /* Start side navigation bar  */

      .side-nav {
        float: left;
        height: 100%;
        width: 290px;
        background-color: #252636;
        color: #CCC;
        -webkit-transform: translateX(0);
        transform: translateX(0);
        transition: .3s;
        position: fixed;
        top: 0;
        left: 0;
        overflow: auto;
        z-index: 9999999
      }
      .side-nav .close-aside {
        position: absolute;
        top: 7px;
        right: 7px;
        cursor: pointer;
        color: #EEE;
      }
      .side-nav .heading {
        background-color: #252636;
        padding: 15px 15px 15px 30px;
        overflow: hidden;
        border-bottom: 1px solid #2a2b3c
      }
      .side-nav .heading > img {
        border-radius: 50%;
        float: left;
        width: 28%;
      }
      .side-nav .info {
        float: left;
        width: 69%;
        margin-left: 3%;
      }
      .side-nav .heading .info > h3 {margin: 0 0 5px}
      .side-nav .heading .info > h3 > a {
        color: #EEE;
        font-weight: 100;
        margin-top: 4px;
        display: block;
        text-decoration: none;
        font-size: 18px;
      }
      .side-nav .heading .info > h3 > a:hover {
        color: #FFF;
      }
      .side-nav .heading .info > p {
        color: #BBB;
        font-size: 13px;
      }
      /* End heading */
      /* Start search */
      .side-nav .search {
        text-align: center;
        padding: 15px 30px;
        margin: 15px 0;
        position: relative;
      }
      .side-nav .search > input {
        width: 100%;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #23262d;
        padding: 7px 0 7px;
        color: #DDD
      }
      .side-nav .search > input ~ i {
        position: absolute;
        top: 22px;
        right: 40px;
        display: block;
        color: #2b2f3a;
        font-size: 19px;
      }
      /* End search */

      .side-nav .categories > li {
        padding: 17px 40px 17px 30px;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02);
        cursor: pointer;
      }
      .side-nav .categories > li > a {
        color: #AAA;
        text-decoration: none;
      }
      /* Start num: there are three options primary, danger and success like Bootstrap */
      .side-nav .categories > li > a > .num {
        line-height: 0;
        border-radius: 3px;
        font-size: 14px;
        color: #FFF;
        padding: 0px 5px
      }
      .succ {background-color: #5cb85c}
      /* End num */
      .side-nav .categories > li > a:hover {
        color: #FFF
      }
      .side-nav .categories > li > i {
        font-size: 18px;
        margin-right: 5px
      }
      .side-nav .categories > li > a:after {
        content: "\f053";
        font-family: fontAwesome;
        font-size: 11px;
        line-height: 1.8;
        float: right;
        color: #AAA;
        transition: all .8s ease-in-out;
      }
      .side-nav .categories .opend > a:after {
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
      }
      /* End categories */
      /* Start dropdown menu */
      .side-nav .categories .side-nav-dropdown {
        padding-top: 10px;
        padding-left: 30px;
        list-style: none;
        display: none;
      }
      .side-nav .categories .side-nav-dropdown > li > a {
        color: #AAA;
        text-decoration: none;
        padding: 7px 0;
        display: block;
      }
      .side-nav .categories p {
        margin-left: 30px;
        color: #535465;
        margin-top: 10px;
      }

      /* End dropdown menu */

      .show-side-nav {
        -webkit-transform: translateX(-290px);
        transform: translateX(-290px);
      }


      /* Start media query */
      @media (max-width: 767px) {
        .side-nav .categories > li {
          padding-top: 12px;
          padding-bottom: 12px;
        }
        .side-nav .search {
          padding: 10px 0 10px 30px
        }
      }

      /* End side navigation bar  */

      .main-color {
              color: #ffc107;
            }
      /* Start bootstrap */
      .navbar-right .dropdown-menu {
        right: auto !important;
        left: 0 !important;
      }
      .navbar-default {
        background-color: #6f6486 !important;
        border: none !important;
        border-radius: 0 !important;
        margin: 0 !important
      }
      .navbar-default .navbar-nav>li>a {
        color: #EEE !important;
        line-height: 55px !important;
        padding: 0 10px !important;
      }
      .navbar-default .navbar-brand {color:#FFF !important}
      .navbar-default .navbar-nav>li>a:focus,
      .navbar-default .navbar-nav>li>a:hover {color: #EEE !important}

      .navbar-default .navbar-nav>.open>a,
      .navbar-default .navbar-nav>.open>a:focus,
      .navbar-default .navbar-nav>.open>a:hover {background-color: transparent !important; color: #FFF !important}

      .navbar-default .navbar-brand {line-height: 55px !important; padding: 0 !important}
      .navbar-default .navbar-brand:focus,
      .navbar-default .navbar-brand:hover {color: #FFF !important}
      .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {margin: 0 !important}
      @media (max-width: 767px) {
        .navbar>.container-fluid .navbar-brand {
          margin-left: 15px !important;
        }
        .navbar-default .navbar-nav>li>a {
          padding-left: 0 !important;
        }
        .navbar-nav {
          margin: 0 !important;
        }
        .navbar-default .navbar-collapse,
        .navbar-default .navbar-form {
          border: none !important;
        }

      }

      .navbar-default .navbar-nav>li>a {
        float: left !important;
      }
      .navbar-default .navbar-nav>li>a>span:not(.caret) {
        background-color: #e74c3c !important;
        border-radius: 50% !important;
        height: 25px !important;
        width: 25px !important;
        padding: 2px !important;
        font-size: 11px !important;
        position: relative !important;
        top: -10px !important;
        right: 5px !important
      }
      .dropdown-menu>li>a {
        padding-top: 5px !important;
        padding-right: 5px !important;
      }
      .navbar-default .navbar-nav>li>a>i {
        font-size: 18px !important;
      }

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
    <aside class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <h2>Naman Angels</h2><br>
        <?= "<img src='../".$ProfilePic."' style='border-radius:50%;'/>";?>
        <div class="info">
          <h3><a href="profile.php"><?php echo $AdminName;?></a></h3>
          <p><?php echo $AdminDesgn; ?></p>
        </div>
      </div>
      <!-- <div class="search">
        <input type="text" placeholder="Type here"><i class="fa fa-search"></i>
      </div> -->
      <ul class="categories">
      <li><i class="fa fa-dashboard fa-fw"></i><a href="dashboard.php">&nbsp;Dashboard</span></a>
        </li>
        <li><i class="fa fa-address-book-o fa-fw"></i><a href="#">&nbsp;View profiles</a>
          <ul class="side-nav-dropdown">
            <li><a href="viewstartup.php">Startups</a></li>
            <li><a href="admin_browseinv.php">Investors</a></li>

          </ul>
        </li>
        <li><i class="fa fa-handshake-o fa-fw"></i><a href="transaction.php">&nbsp;Deals </a></li>
        <li><i class="fa fa-check-circle"></i><a href="verify.php">&nbsp;Verify StartUps</a></li>

        <li><i class="fa fa-money"></i><a href="#">&nbsp;Investor Membership</a>
          <ul class="side-nav-dropdown">
            <li><a href="estmem.php">Existing Investors</a></li>
            <li><a href="newmem.php">New Investors</a></li>
          </ul>
        </li>
        <!-- <li><i class="fa fa-bar-chart-o"></i><a href="analytics.php">Analysis</a></li> -->
        <li><i class="fa fa-users fa-fw"></i><a href="#">&nbsp;Our team</a>
          <ul class="side-nav-dropdown">
            <li><a href="team.php">View team</a></li>
            <li><a href="manage_team.php">Manage team</a></li>
          </ul>
        </li>

        <li><i class="fa fa-cogs fa-fw"></i><a href="#">&nbsp;Tools</a>
          <ul class="side-nav-dropdown">
            <li><a href="admin_tools.php">View Tools</a></li>
            <li><a href="admin_addtools.php">Manage Tools</a></li>
          </ul>
        </li>
        <li><i class="fa fa-user" aria-hidden="true"></i><a href="add_admin.php">&nbsp;Admins</a></li>
        <!-- <li><i class="fa fa-envelope-open-o fa-fw"></i><a href="#"> Inbox <span class="num dang">56</span></a></li> -->
        <!-- <li><i class="fa fa-wrench fa-fw"></i><a href="#"> Settings </span></a>
        </li> -->
    </aside>
    <section id="contents">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <i class="fa fa-align-right"></i>
            </button>
            <a class="navbar-brand" href="#">my<span class="main-color">Dashboard</span></a>
          </div>
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="profile.php"><i class="fa fa-user fw"></i> My account</a></li>
                  <li><a href="changepassword.php"><i class="fa fa-lock fw"></i> Password</a></li>
                  <!-- <li><a href="#"><i class="fa fa-question-circle-o fw"></i> Help</a></li> -->
                  <li role="separator" class="divider"></li>
                  <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
              </li>
           <!--   <li><a href="#"><i class="fa fa-comments"></i><span>23</span></a></li>
              <li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li>
              <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li>-->
            </ul>
          </div>
        </div>
      </nav>
      </section>
      <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
      <script src='js/sidebar.js'></script>
    </body>
</html>
