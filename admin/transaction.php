<?php

    require "../server.php";
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }
    if(isset($_POST["transact"]))
	{
        $inid = mysqli_real_escape_string($db, $_POST['inv']);
        $stupid = mysqli_real_escape_string($db, $_POST['stup']);
        $status = mysqli_real_escape_string($db, $_POST['stat']);
        $amount = mysqli_real_escape_string($db, $_POST['amt']);
        $stakehold = mysqli_real_escape_string($db, $_POST['stake']);
        $ddate = mysqli_real_escape_string($db, $_POST['dealdate']);

        $q = "UPDATE requests SET Date = '$ddate' WHERE St_ID='$stupid' AND Inv_ID='$inid';";
        mysqli_query($db, $q);

        $q = "UPDATE requests SET Stakehold = '$stakehold' WHERE St_ID='$stupid' AND Inv_ID='$inid';";
        mysqli_query($db, $q);

        $q = "UPDATE requests SET Amount = '$amount' WHERE St_ID='$stupid' AND Inv_ID='$inid';";
		mysqli_query($db, $q);

		if ($status == 'done')
		{
            $q = "UPDATE requests SET Deal = 1 WHERE St_ID='$stupid' AND Inv_ID='$inid';";
			mysqli_query($db, $q);
		}

        if ($status == 'interest')
		{
            $q1 = "SELECT * FROM requests WHERE St_ID='$stupid' AND Inv_ID='$inid';";
            $res1 = mysqli_query($db, $q1);
            $row = mysqli_fetch_assoc($res1);
            if ($row['Deal'] == 1)
            {
                echo "<script>alert('Deal Already Done')</script>";
            }
            else{
            $q = "INSERT into requests(Inv_ID,St_ID) values ('$inid','$stupid')";
            mysqli_query($db, $q);
            }
		}

        if ($status == 'cancel')
		{
            $q = "DELETE FROM requests WHERE St_ID='$stupid' AND Inv_ID='$inid'";
			mysqli_query($db, $q);
        }
		header('location: transaction.php');
	}

?>
<html>
    <head>
        <title>Transactions | NAMAN</title>
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
            tr:nth-child(odd){background-color: #f2f2f2;}
            .tab form{
                margin:20px 0px;
                background-color:white;
                padding:20px;
                border-left: 15px solid  #ff8533;
            }
            .tab div{
                width: 48%;
                display: inline-block;
                margin: 5px;
            }
            .tab label{
                width: 50%;
            }
            .tab input[type=text],input[type=number],input[type=date],select{
                width: 50%;
            }
            .butn{
                background-color: #ff8533;
                border: none;
                color: white;
                cursor: pointer;
                padding:10px 20px;
                width: 50%;
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
                    <h2>Transaction Details!</h2>
                    <p>Manage the deals made through Naman Angels and update the transaction details.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
            <div class="tab">
                <center>
                <form method="post" action="transaction.php">
                    <div>
                    <label>Startup Name: </label>
                    <select name="stup">
                        <?php
                            $qu1= "SELECT * FROM st_details;";
                            $res1 = mysqli_query($db, $qu1);
                            while($row1 = mysqli_fetch_assoc($res1)){
                                echo '<option value="'.$row1['StpID'].'">'.$row1['Stname'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <div>
                    <label>Investor Name: </label>
                    <select name="inv">
                        <?php
                            $qu1= "SELECT * FROM inv_details;";
                            $res1 = mysqli_query($db, $qu1);
                            while($row1 = mysqli_fetch_assoc($res1)){
                                echo '<option value="'.$row1['InvID'].'">'.$row1['CName'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <div>
                    <label>Status: </label>
                    <select name="stat">
                        <option value="interest">Investor Interested</option>
                        <option value="done">Deal Complete</option>
                        <option value="cancel">Deal Canceled</option>
                    </select>
                    </div>
                    <div>
                    <label>Amount:</label>
                    <input type="number" name="amt">
                    </div>
                    <div>
                    <label>Stake holding:</label>
                    <input type="number" name="stake">
                    </div>
                    <div>
                    <label>Date:</label>
                    <input type="date" name="dealdate">
                    </div>
                    <br><br>
                    <input type="submit" name="transact" value="Update" class="butn">
                </form>
                <table>
                    <tr>
                        <th>Startup</th>
                        <th>Investor</th>
                        <th>Deal Status</th>
                        <th>Round Status</th>
                        <th>Round</th>
                        <th>Amount</th>
                        <th>Stake holding</th>
                        <th>Investment Date</th>
                    </tr>
                    <?php
                    $qu = "SELECT * FROM requests";
                    $results = mysqli_query($db, $qu);
                    while($row = mysqli_fetch_assoc($results))
                    {
                        $deal = $row['Deal'];
                        $stpid = $row['St_ID'];
                        $invid = $row['Inv_ID'];
                        $r=$row['Round'];

                        $qu1= "SELECT * FROM st_details WHERE StpID = '$stpid'";
                        $res1 = mysqli_query($db, $qu1);
                        $row1 = mysqli_fetch_assoc($res1);

                        $qu2= "SELECT * FROM inv_details WHERE InvID = '$invid'";
                        $res2 = mysqli_query($db, $qu2);
                        $row2 = mysqli_fetch_assoc($res2);

                        $q = "SELECT * FROM round_history WHERE StpID='$stpid' AND Round='$r'";
                        $res3 = mysqli_query($db, $q);
                        $row3 = mysqli_fetch_assoc($res3);

                        echo '<tr>
                        <td>'.$row1['Stname'].'</td>
                        <td>'.$row2['CName'].'</td>'
                        ;

                        if(mysqli_num_rows($res3) == 1){
                            echo '<td>Round closed</td>
                            <td>'.$row3['Round'].'</td>';
                        }
                        else{
                            echo '<td>Round open</td>
                            <td>'.$row['Round'].'</td>';
                        }

                        if($deal == 0)
                        {
                            echo '<td>Investor Interested</td>';
                            echo '<td>--</td>';
                            echo '<td>--</td>';
                            echo '<td>--</td>';
                        }
                        if($deal == 1){
                            echo '<td>Deal Completed</td>';
                            echo '<td>'.$row['Amount'].'</td>';
                            echo '<td>'.$row['Stakehold'].'%</td>';
                            echo '<td>'.$row['Date'].'</td>';
                        }

                        echo '</tr>'
                        ;
                    }
                    ?>
                </table>
                </center>
            </div>
        </div>
    </body>
</html>
