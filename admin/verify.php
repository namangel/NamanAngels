<?php
    require "../server.php";
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }
    if(isset($_GET['add'])){
        $qu = 'UPDATE userstp SET Verified = 1 where StpID = '.$_GET['add'];
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
                        $sprofile = '/NamanAngels/StartUp/Profile/index.php?searchquery='.$sid ;
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
