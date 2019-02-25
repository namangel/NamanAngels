<?php require('../server.php'); ?>
<?php require "sidebar.php"; ?>
<?php
// if (isset($_POST["getdetails"]))
//   {
    
//     $InvID = mysqli_real_escape_string($db, $_POST['inv_id']);
//     $check_query = "SELECT * FROM aview WHERE InvID='$InvID' ;";
//        echo '<div class="card">';
       
//               echo '<h1>'.$row['CName'].'</h1>';
//               echo '<h1>'.$row['FName'].'</h1>';
//               echo '<h1>'.$row['LName'].'</h1>';
//             echo '<p>'.$row['Type'].'</p>';
//          echo '</div>';
//    header('location:estmem.php');
// }    
?>

<html>
<head>

<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: auto;
  width: 80%;
  text-align: center;
  font-family: arial;
  background-color:white;
  color:black;
}
.teamform{
        background-color: #ccc4d4;
        float: center;
        border: 2px solid black;
        margin-top: 10px;
        margin-left:400px;
        padding: 20px;
        width: 60%;
        color:black;
        }
        .butn button{
        background-color: #ff8533;
        width: 60%;
        border: none;
        color: white;
        cursor: pointer;
        
      }
      input[type=submit]{
            background-color:  #ff8533;
            border: none;
            color: white;
            padding: 10px;
        }
</style>
</head>
<body>
<div class="teamform">
                   
                    <form method="POST" action="estmem.php">
                        <label>Inv Id:</label><br>
                        <input type="text" name="inv_id"><br><br>
                        <input type="submit" name="get_details" value="getdetails">
                    </form>
            </div>

            <?php 
                if (isset($_POST["getdetails"]))
                {
                  
                  $InvID = mysqli_real_escape_string($db, $_POST['inv_id']);
                  $check_query = "SELECT * FROM aview WHERE InvID='$InvID' ;";
                     echo '<div class="card">';
                     
                            echo '<h1>'.$row['CName'].'</h1>';
                            echo '<h1>'.$row['FName'].'</h1>';
                            echo '<h1>'.$row['LName'].'</h1>';
                          echo '<p>'.$row['Type'].'</p>';
                       echo '</div>';
                 header('location:estmem.php');
              }         
            
            
            ?>

</body>

</html>

