<?php require('../server.php');
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }

    if (isset($_POST["addmem"])){
        $FName = mysqli_real_escape_string($db, $_POST['f_name']);
        $LName = mysqli_real_escape_string($db, $_POST['l_name']);
        $CName = mysqli_real_escape_string($db, $_POST['c_name']);
        $Email = mysqli_real_escape_string($db, $_POST['email']);
        $Phno = mysqli_real_escape_string($db, $_POST['phone']);
        $Std = mysqli_real_escape_string($db, $_POST['stdate']);
        $End = mysqli_real_escape_string($db, $_POST['endate']);


        $user_check_query = "SELECT * FROM userbinv WHERE Entry = (SELECT max(Entry) from userbinv)";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        $newid = (int)(substr($user['BinvID'], 6,6)) + 1;
        $userid = 'NAMBIN'.str_pad($newid, 6, '0', STR_PAD_LEFT);

        $memid = strtoupper('MEM'.substr(sha1($userid, FALSE), 0, 8));

        $q = "INSERT INTO userbinv (BinvID,Fname,Lname,Email,Phone,MemID) VALUES ('$userid','$FName','$LName','$Email','$Phno','$memid')";
        mysqli_query($db, $q);

        if(isset($_POST['c_name'])){
          $q = "UPDATE userbinv SET Cname = '$CName' WHERE BinvID = '$userid'";
          mysqli_query($db, $q);
        }

        $q2 = "INSERT INTO membership (InvID, MemID, StDate, ExpDate) VALUES ('$userid','$memid','$Std','$End');";
        mysqli_query($db, $q2);

        echo '<script>alert("Investor '.$userid.' added as Member '.$memid.'")</script>';
    }


?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>New Investors| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/manage_team.css">  -->

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

      .outer{
        width: 50%;
        float: left;
        visibility: hidden;
        }
        .teamform{
        background-color: #ccc4d4;
        float: center;
        border: 2px solid black;
        margin-top: 10px;
        padding: 20px;
        width: 60%;
        }

        input[type=text],select{
            width: 100%;
            padding: 5px;
        }
        input[type=submit]{
            background-color:  #ff8533;
            border: none;
            color: white;
            padding: 10px;
        }

      .butn{
        float:left;
        width: 50%;
      }
      .butn button{
        background-color: #ff8533;
        width: 60%;
        border: none;
        color: white;
        cursor: pointer;
        margin: 50px 0px;
        padding: 20px;
        font-size: 18px;
      }
      .cross{
        float: right;
        cursor: pointer;
    }
    </style>
  </head>
  <body>
<?php include "sidebar.php"; ?>
  <div class="cont">
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2>Add a New Member to Naman Network</h2>
                <p>Addition of Members wihout Profiles.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="butn">
            <center>
            <button onclick="f1on()">NEW MEMBERSHIP</button>
            </center>
        </div>

        <div class="outer" id="f1">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f1off()"></i><br>
                    <form method="POST" action="newmem.php">
                        <label>Company Name (Optional):</label><br>
                        <input type="text" name="c_name"><br><br>
                        <label>First Name:</label><br>
                        <input type="text" name="f_name" required><br><br>
                        <label>Last Name:</label><br>
                        <input type="text" name="l_name" required><br><br>
                        <label>Email:</label><br>
                        <input type="text" name="email" required><br><br>
                        <label>Phone No.:</label><br>
                        <input type="text" name="phone" required><br><br>
                        <label>Start Date:</label><br>
                        <input type="date" name="stdate" placeholder="yyyy-mm-dd" required><br><br>
                        <label>End Date:</label><br>
                        <input type="date" name="endate" placeholder="yyyy-mm-dd" required><br><br>
                        <input type="submit" name="addmem" value="SUBMIT">
                    </form>
            </div>
            </center>
        </div>
        <!-- <div class="outer" id="f2">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f2off()"></i><br>
                    <form method="POST" action="admin_addtools.php">
                        <label>Tool Name:</label><br>
                            <?php
                                // echo '<select name="tool">';
                                // $qu1= "SELECT * FROM tools;";
                                // $res1 = mysqli_query($db, $qu1);
                                // while($row1 = mysqli_fetch_assoc($res1)){
                                //     echo '<option value="'.$row1['tool_id'].'">'.$row1['tl_name'].'</option>';
                                // }
                                // echo '</select>
                                // <br><br>';
                            ?>
                        <input type="submit" name="deltool">
                    </form>
            </div>
            </center>
        </div> -->
    </div>

      <script>
          function f1on(){
            document.getElementById("f1").style.visibility = "visible";
        }
        function f1off(){
            document.getElementById("f1").style.visibility = "hidden";
        }

      </script>
      </body>
    </html>

    <script>
    	if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
    	}
    </script>
