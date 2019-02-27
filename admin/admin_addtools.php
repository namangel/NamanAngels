<?php require('../server.php');
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }

    if (isset($_POST["addtl"])){
        $tlName = mysqli_real_escape_string($db, $_POST['tl_name']);
        $tlDesc = mysqli_real_escape_string($db, $_POST['tl_desc']);
        $tlPrice = mysqli_real_escape_string($db, $_POST['tl_cost']);

        $tl_check_query = "SELECT * FROM tools WHERE Name='$tlName' AND Description='$tlDesc';";
        $result = mysqli_query($db, $tl_check_query);
        $user = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('Tool already exists')</script>";
        }
        else{
            // echo "<script>alert('Member added successfully!')</script>";
            $q = "INSERT INTO tools (Name,Description, Cost) VALUES ('$tlName','$tlDesc', '$tlPrice');";
            mysqli_query($db, $q);

            $check = @getimagesize($_FILES["tl_img"]["tmp_name"]);
            if($check != false)
            {
                $file_name = $_FILES['tl_img']['name'];
                $file_size = $_FILES['tl_img']['size'];
                $file_tmp = $_FILES['tl_img']['tmp_name'];
                $file_type = $_FILES['tl_img']['type'];
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
                        $uploadas = "uploads/tools/".$file_name;
                        $upload = "../uploads/tools/".$file_name;
                        if(move_uploaded_file($file_tmp,$upload)){
                            $q = "UPDATE tools SET Image = '$uploadas' WHERE Name='$tlName' AND Description='$tlDesc';";
                            mysqli_query($db, $q);
                        }
                    }
                }
            }
        }
        echo "<script>alert('Tool added successfully!')</script>";
        header('location: admin_addtools.php');
    }

    if (isset($_POST["deltool"])){
        $tlid = mysqli_real_escape_string($db, $_POST['tool']);
        $q = "DELETE FROM tools WHERE tool_id='$tlid';";
        mysqli_query($db, $q);
        echo "<script>alert('Tool deleted successfully!')</script>";
        header('location: admin_addtools.php');
    }

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Manage Tools & Services| NAMAN</title>
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
                <h2>Manage tools & services!</h2>
                <p>Add or remove tools and services.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="butn">
            <center>
            <button onclick="f1on()">ADD A TOOL</button>
            </center>
        </div>
        <div class="butn">
            <center>
                <button onclick="f2on()">REMOVE A TOOL</button>
            </center>
        </div>
        <div class="outer" id="f1">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f1off()"></i><br>
                    <form method="POST" action="admin_addtools.php">
                        <label>Tool Name:</label><br>
                        <input type="text" name="tl_name"><br><br>
                        <label>Tool Description:</label><br>
                        <input type="text" name="tl_desc"><br><br>
                        <label>Tool Price:</label><br>
                        <input type="text" name="tl_cost"><br><br>
                        <label>Tool Image:</label><br>
                        <input type="file" name="tl_img"><br><br>
                        <input type="submit" name="addtl">
                    </form>
            </div>
            </center>
        </div>
        <div class="outer" id="f2">
            <center>
            <div class="teamform">
                    <i class="fa fa-close cross" onclick="f2off()"></i><br>
                    <form method="POST" action="admin_addtools.php">
                        <label>Tool Name:</label><br>
                            <?php
                                echo '<select name="tool">';
                                $qu1= "SELECT * FROM tools;";
                                $res1 = mysqli_query($db, $qu1);
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    echo '<option value="'.$row1['ID'].'">'.$row1['Name'].'</option>';
                                }
                                echo '</select>
                                <br><br>';
                            ?>
                        <input type="submit" name="deltool">
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
