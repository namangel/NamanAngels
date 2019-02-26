<?php
    require "../server.php";
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }

    $id = $_SESSION['adminID'];

    $prq = "SELECT * FROM admin WHERE adminID='$id';";
    $result = mysqli_query($db, $prq);
    $row = mysqli_fetch_assoc($result);

    $priv = $row['privilege'];
    ?>
   <?php
    if (isset($_POST["addadmin"]))
    {
    $AdminName = mysqli_real_escape_string($db, $_POST['Adminname']);
    $AdminDesgn = mysqli_real_escape_string($db, $_POST['Admindesgn']);
    $Username = mysqli_real_escape_string($db, $_POST['Adminuser']);
    $Password = mysqli_real_escape_string($db, $_POST['pw_1']);
    $Privs = mysqli_real_escape_string($db, $_POST['priv']);
    // $ProfilePic = mysqli_real_escape_string($db, $_POST['Profile']);
    $AdminPriv = (int)$Privs;


    $member_check_query = "SELECT * FROM admin WHERE AdminName='$AdminName' AND AdminDesgn='$AdminDesgn';";
    $result = mysqli_query($db, $member_check_query);
    $user = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) > 0)
    {
        echo "<script>alert('Admin already exists')</script>";
        // header('location:manage_team.php');
    }
    else
    {
      if($priv == 1){

      $q = "INSERT INTO admin (AdminName,AdminDesgn,Username,Password,privilege) VALUES ('$AdminName','$AdminDesgn','$Username','$Password','$AdminPriv');";
      mysqli_query($db, $q);

        // $check = getimagesize($_FILES["mem_img"]["tmp_name"]);
        if(@getimagesize($_FILES["ProfilePic"]["tmp_name"]))
        {
            $file_name = $_FILES['ProfilePic']['name'];
            $file_size = $_FILES['ProfilePic']['size'];
            $file_tmp = $_FILES['ProfilePic']['tmp_name'];
            $file_type = $_FILES['ProfilePic']['type'];
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
                  $uploadas = "uploads/admin/".$file_name;
                  $upload = "../uploads/admin/".$file_name;
                  if(move_uploaded_file($file_tmp,$upload)){
                      $q = "UPDATE admin set ProfilePic='$uploadas' WHERE AdminName='$AdminName' AND AdminDesgn='$AdminDesgn';";
                      mysqli_query($db, $q);
                      // echo "<script>alert('Successfully Uploaded')</script>";
                    }
                }
            }
        }
        echo "<script> alert('Admin added successfully!') </script>";

        // header('location:trial.php');
      }
      else{
        echo "<script> alert('Necessary Privilage Required !') </script>";
      }
    }
  }


  if (isset($_POST["deladmin"])){
    $AdminName = mysqli_real_escape_string($db, $_POST['Adminname']);
    $AdminDesgn = mysqli_real_escape_string($db, $_POST['Admindesgn']);

    $member_check_query = "SELECT * FROM admin WHERE AdminName='$AdminName' AND AdminDesgn='$AdminDesgn';";
    $result = mysqli_query($db, $member_check_query);
    $user = mysqli_fetch_assoc($result);

    if($priv == 1){

    if (mysqli_num_rows($result) > 0) {
      $q = "DELETE FROM admin WHERE AdminName='$AdminName' AND AdminDesgn='$AdminDesgn';";
      mysqli_query($db, $q);
      echo "<script>alert('Admin deleted successfully!')</script>";
      // header('location:manage_team.php');
    }

    else{
      echo "<script>alert('Admin does not exists!')</script>";
      // header('location:manage_team.php');
    }
  }
  else{
    echo "<script> alert('Necessary Privilage Required !') </script>";
  }
  }

?>
<html lang="en">
  <head>
    <?php require "sidebar.php" ?>
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

        input[type=text],[type=password]{
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

  <div class="cont">
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2>Manage Admins!</h2>
                <p>Add or remove an admin.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="butn">
            <center>
            <button onclick="f1on()">ADD AN ADMIN</button>
            </center>
        </div>
        <div class="butn">
            <center>
                <button onclick="f2on()">REMOVE AN ADMIN</button>
            </center>
        </div>
        <div class="outer" id="f1">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f1off()"></i><br>
                    <form method="POST" action="add_admin.php" enctype="multipart/form-data">
                        <label>Admin Name:</label><br>
                        <input type="text" name="Adminname" required><br><br>
                        <label>Admin Username:</label><br>
                        <input type="text" name="Adminuser" required><br><br>
                        <label>Admin Designation/Description:</label><br>
                        <input type="text" name="Admindesgn" required><br><br>
                       <label>Admin Image:</label><br>
                        <input type="file" name="ProfilePic"><br><br>
                        <label>Admin Managing Privileges:</label><br>
                        <input type="radio" name="priv" value="1">Yes<br>
                        <input type="radio" name="priv" value="0" checked>No<br>
                        <label for="new-password">Password:</label>
                      <input autocomplete="new-password" type="password" id="new-password" name="pw_1" placeholder="Your password">
                      <br>
                      <br>
                        <input type="submit" name="addadmin" value="ADD ADMIN">

                    </form>
            </div>
            </center>
        </div>
        <div class="outer" id="f2">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f2off()"></i><br>
                    <form method="POST" action="add_admin.php">
                        <label>Admin Name:</label><br>
                        <input type="text" name="Adminname" required><br><br>
                        <label>Admin Designation/Description:</label><br>
                        <input type="text" name="Admindesgn" required><br><br>
                        <input type="submit" name="deladmin" value="REMOVE ADMIN">
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
