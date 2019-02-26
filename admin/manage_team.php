<?php
  require "../server.php";
  if(!isset($_SESSION['adminID'])){
      header('location: index.php');
  }

if (isset($_POST["addmem"]))
{
    $MemName = mysqli_real_escape_string($db, $_POST['mem_name']);
    $MemDesc = mysqli_real_escape_string($db, $_POST['mem_desc']);
    $MemLink = mysqli_real_escape_string($db, $_POST['mem_link']);

    $member_check_query = "SELECT * FROM namanteam WHERE Name='$MemName' AND Description='$MemDesc';";
    $result = mysqli_query($db, $member_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<script>alert('Member already exists')</script>";
        // header('location:manage_team.php');
    }
    else
    {
        $q = "INSERT INTO namanteam (Link, Name, Description) VALUES ('$MemLink','$MemName','$MemDesc');";
        mysqli_query($db, $q);

        // $check = getimagesize($_FILES["mem_img"]["tmp_name"]);
        if(@getimagesize($_FILES["mem_img"]["tmp_name"]))
        {
            $file_name = $_FILES['mem_img']['name'];
            $file_size = $_FILES['mem_img']['size'];
            $file_tmp = $_FILES['mem_img']['tmp_name'];
            $file_type = $_FILES['mem_img']['type'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
            }
            else{
                if($file_size > 5242880){
                    echo "<script>alert('File size must be less than 5 MB')</script>";
                }
                else{
                    $uploadas = "uploads/team/".$file_name;
                    $upload = "../uploads/team/".$file_name;
                    if(move_uploaded_file($file_tmp,$upload)){
                        $q = "UPDATE namanteam SET Image = '$uploadas' WHERE Name='$MemName' AND Description='$MemDesc';";
                        mysqli_query($db, $q);
                    }
                }
            }

        }

        echo "<script>alert('Member added successfully!')</script>";
        // header('location: manage_team.php');
    }
 }

  if (isset($_POST["delmem"])){
    $MemName = mysqli_real_escape_string($db, $_POST['mem_name']);
    $MemDesc = mysqli_real_escape_string($db, $_POST['mem_desc']);

    $member_check_query = "SELECT * FROM namanteam WHERE Name='$MemName' AND Description='$MemDesc';";
    $result = mysqli_query($db, $member_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      $q = "DELETE FROM namanteam WHERE Name='$MemName' AND Description='$MemDesc';";
      mysqli_query($db, $q);
      echo "<script>alert('Member deleted successfully!')</script>";
      // header('location:manage_team.php');
    }

    else{
      echo "<script>alert('Member does not exists!')</script>";
      // header('location:manage_team.php');
    }
  }

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Manage Naman Team| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
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

        input[type=text]{
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
  <?php require "sidebar.php" ?>
  <div class="cont">
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2>Manage your team!</h2>
                <p>Add a new team member or remove a member.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="butn">
            <center>
            <button onclick="f1on()">ADD A TEAM MEMBER</button>
            </center>
        </div>
        <div class="butn">
            <center>
                <button onclick="f2on()">REMOVE A TEAM MEMBER</button>
            </center>
        </div>
        <div class="outer" id="f1">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f1off()"></i><br>
                    <form method="POST" action="manage_team.php" enctype="multipart/form-data">
                        <label>Member Name:</label><br>
                        <input type="text" name="mem_name" required><br><br>
                        <label>Member Designation/Description:</label><br>
                        <input type="text" name="mem_desc" required><br><br>
                        <label>Member's LinkedIn:</label><br>
                        <input type="text" name="mem_link" required><br><br>
                        <label>Member Image:</label><br>
                        <input type="file" name="mem_img"><br><br>
                        <input type="submit" name="addmem" value="addmem">
                    </form>
            </div>
            </center>
        </div>
        <div class="outer" id="f2">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f2off()"></i><br>
                    <form method="POST" action="manage_team.php">
                        <label>Member Name:</label><br>
                        <input type="text" name="mem_name" required><br><br>
                        <label>Member Designation/Description:</label><br>
                        <input type="text" name="mem_desc" required><br><br>
                        <input type="submit" name="delmem">
                    </form>
            </div>
            </center>
        </div>
    </div>
      <!-- <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script> -->
      <!-- <script src='js/dashboard.js'></script> -->
      <script>
          function f1on(){
            document.getElementById("f1").style.visibility = "visible";
        }
        function f1off(){
            document.getElementById("f1").style.visibility = "hidden";
        }
        function f2on(){
            // if(document.getElementById("f1").style.display === 'none')
            // {
            //     document.getElementById("f1").removeAttribute("style","display:none;");
            //     document.getElementById("f1").setAttribute("style","visibility:hidden;");
            // }
            document.getElementById("f2").style.visibility = "visible";
        }
        function f2off(){
            document.getElementById("f2").style.visibility = "hidden";
        }
      </script>
      </body>
    </html>



    <script>
    	if ( window.history.replaceState ) {
    		window.history.replaceState( null, null, window.location.href );
    	}
    </script>
