<?php?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link rel="stylesheet" href="admin.css"> 

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
        width: 20%;
        margin-right: 5%;
        float: left;
      }
      .admins .box .admin .img img {
        border-radius: 50%;
      }
      .admins .box .info {
        width: 75%;
        color: #EEE;
        float: left;
      }
      .admins .box .info h3 {font-size: 19px}
      .admins .box .info p {color: #BBB}

      /* End users */
      /* Start statis (views and registered number box css)*/

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
  <?php require "sidebar.php" ?>
  <div class="cont">
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2>Welcome to Dashboard</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
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
                <h3>5,154</h3>
                <p class="lead">Page views</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box danger">
                <i class="fa fa-rocket"></i>
                <h3>245</h3>
                <p class="lead">Startups registered</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box warning">
                <i class="fa fa-money"></i>
                <h3>5,154</h3>
                <p class="lead">Investors registered</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box success">
                <i class="fa fa-handshake-o"></i>
                <h3>5,154</h3>
                <p class="lead">Downloads</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="admins">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <h3>Admins:</h3>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148906966/small/1501685402/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907137/small/1501685404/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907019/small/1501685403/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <h3>Team Members:</h3>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907114/small/1501685404/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907086/small/1501685404/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
                <div class="admin">
                  <div class="img">
                    <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="admin">
                  </div>
                  <div class="info">
                    <h3>Joge Lucky</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section>
      </section>
      </div>
      <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
      <script src='admin.js'></script>
      <script src='sidebar.js'></script>
      </body>
    </html>