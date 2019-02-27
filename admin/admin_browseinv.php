<?php
    require('../server.php');
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }

    if(isset($_POST['submit'])){
        $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['searchkey']);
        header('location: admin_browseinv.php?pageno=1');
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Browse Investors| NAMAN</title>
        <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/dashboard.css">  -->
        <style>
          * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Droid Sans', sans-serif;
            outline: none;
          }
          p{
              color:white;
          }
            .searchform select, .searchform input[type="text"]{
            width: 80%;
            height: 50px;
            font-size: 20px;
            border: none;
            border-radius: 20px;
            padding: 10px;
            margin-top:10px;
            }
            .searchform input[type=submit] {
            background-color: #FF8C00;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size:16px;
            font-weight: bold;
            padding: 10px;
            width: 180px
            }
            .viewprofile{
            display:block;
            text-decoration:none;
            color: #FF8C00;
            margin-left: auto;
            margin-right: auto;
            text-align: center;


            }
            img{
            display: block;
            margin-left: auto;
            margin-right: auto;
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
            width:50%;
            height: 500px;

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
            width: 50%;
            color: white;
            float: left;
            }
            .name{
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
        <form class="searchform" action="admin_browseinv.php" method="post">
                <input type="text" name="searchkey" placeholder="Enter Keyword">
                <input type="submit" name="submit" value="Search">
            </form>
        <?php
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        }
        else {
            $pageno = 1;
        }

        $cpname="";

        $no_of_records_per_page = 3;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        if(isset($_SESSION['search'])){
            $cpname = $_SESSION['search'];
        }

        $total_pages_sql = "SELECT COUNT(*) FROM CProfile where CName LIKE '%{$cpname}%' OR FName LIKE '%{$cpname}%'";
        $result = mysqli_query($db,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_rows = $total_rows < 1? 1:$total_rows;
        $total_pages = ceil($total_rows/$no_of_records_per_page);
        $sql = "SELECT * FROM CProfile where CName Like '%{$cpname}%' OR FName LIKE '%{$cpname}%' LIMIT $offset, $no_of_records_per_page";
             $res_data = mysqli_query($db,$sql);
            echo '
            <section class="admins">
                <div class="container-fluid">
                    <div class="row">
                    <center>
                        <h3 style="text-align:center;font-size:bold">  &nbsp;&nbsp;&nbsp;BROWSE INVESTOR</h3>
            ';
            while($row = mysqli_fetch_array($res_data))
            {
                echo '
                    <div class="col-md-6">
                        <div class="box">
                            <div class="admin">
                                <img src="../'.$row['CImg'].'" alt="Investor Image" style="width:30%; align:middle; border-radius:50%">
                                <center>';

                            if(!empty($row['CName'])){
                                 echo '<h1 style="color:#FF8C00;text-align:center">'.$row['CName'].'</h1>';
                            }
                            else{
                                echo '<h1 style="color:#FF8C00;text-align:center">Individual</h1>';
                            }

                            echo '

                                <p><i class="fa fa-star"></i> &nbsp;&nbsp;'.$row['InvID'].'</p>
                                <p><i class="fa fa-user"></i> &nbsp;&nbsp;'.$row['FName'].'&nbsp;'.$row['LName'].'</p>
                                <p><i class="fa fa-bar-chart"></i> &nbsp;&nbsp;'.$row['AvgInv'].'</p>
                                <p><i class="fa fa-envelope-o"></i> &nbsp;&nbsp;'.$row['Email'].'</p>
                                <p><i class="fa fa-phone-square"></i> &nbsp;&nbsp;'.$row['Phone'].'</p>
                                </center>
                            </div>
                        </div>
                    </div>';
        }
            echo '
                    </center>
                    </div>
                </div>
                </section>
            ';
            ?>



            <?php
            echo "<center>";
            echo '<div class="pages">';
            echo '<ul class="pagination">';
                echo '<li><a href="?pageno=1">First</a></li>';
                echo '<li class=';
                    if($pageno <= 1){ echo 'disabled'; };
                        echo '>';
                    echo '<a href=';
                    if($pageno <= 1){ echo "#"; } else { echo "?pageno=".($pageno - 1); };
                    echo '>Prev</a>';
                echo '</li>';
                echo '<li class=';
                    if($pageno >= $total_pages){ echo 'disabled'; };
                    echo '>';
                    echo '<a href=';
                    if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); };
                    echo '>Next</a>';
                echo '</li>';
                echo "<li><a href='?pageno=$total_pages'>Last</a></li>";
            echo '</ul>';
        echo '</div>';
        echo "</center>"
        ?>
        </div>
    </body>
</html>
