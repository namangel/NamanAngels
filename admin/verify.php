<?php
    require "../server.php";
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }
    if(isset($_GET['add'])){
        $id = $_GET['add'];
        $qu = "UPDATE userstp SET Verified = 1 where StpID = '$id'";
        mysqli_query($db,$qu);
    }
?>
<html>
    <head>
    <title>Verify Startup| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
        <link rel="stylesheet" href="css/transaction.css">
        <style>
            .cont{
                margin-left: 290px;
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
            .tab{
                margin:40px;
            }
            .tab table,form{
                width:100%;
            }
            .tab td{
                padding:15px 0px;
                text-align:center;
            }
            .tab th {
                background-color: #ff8533;
                color: white;
                padding:15px 0px;
                text-align:center;
            }
            .tab tr{
                background-color: white;
            }
            /* tr:nth-child(odd){background-color: #f2f2f2;} */
            .tab form{
                margin:20px 0px;
                background-color:white;
                padding:20px;
            }
            .tab input,select{
                margin:0px 20px;
            }
            .butn{
                background-color: #ff8533;
                border: none;
                color: white;
                cursor: pointer;
                padding:5px 20px;
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
                    <h2>Verify Startups!</h2>
                    <p>Visit startup profiles and verify them.</p>
                </div>
                </div>
            </div>
            </div>
            </div>
            <div class="tab">
                <table>
                    <tr>
                        <th>StartUp ID</th>
                        <th>StartUp Name</th>
                        <th>StartUp Profile</th>
                        <th>Verify</th>
                    </tr>
                    <?php
                    $qu = "SELECT * FROM st_details where StpID IN (SELECT StpID from userstp where Verified = '0')";
                    $results = mysqli_query($db, $qu);
                    while($row = mysqli_fetch_assoc($results))
                    {
                        $sid = $row['StpID'];
                        $sname = $row['Stname'];
                        $sprofile = '../Profile/index.php?s='.$sid ;
                        echo '<tr>';
                            echo '<td>'.$sid.'</td>';
                            echo '<td>'.$sname.'</td>';
                            echo '<td><a href="'.$sprofile.'" target="_blank">Visit Profile</a></td>';
                            echo '<td><form method=post action="?add='.$sid.'"><input type=submit value="Verify me" name="verify"></form></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>


        </div>
    </body>
</html>
