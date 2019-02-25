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
    <title>Existing Investors| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
<style>
    .card {
      font-family: "Segoe UI", "Roboto";
   margin-left: 350px;
   border-radius: 5px;
   overflow: hidden;
   width: 450px;
   padding: 15px 25px;
   box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
   background-color:white;
  
}
  .teamform{
    background-color: #ccc4d4;
    float: center;
    border: 2px solid black;
    margin-top: 10px;
    margin-left:350px;
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
<br>
  <?php 
      if (isset($_POST["get_details"]))
      {
        
        $InvID = mysqli_real_escape_string($db, $_POST['inv_id']);
        $check_query = "SELECT * FROM aview WHERE InvID='$InvID' ;";
        $result = mysqli_query($db, $check_query);
        $row=mysqli_fetch_assoc($result);
            echo '<div class="card"><br>';
            
            echo '<h3 style="color:#ff8533";>'.$row['CName'].'</h3>';
            echo '<h3><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;'.$row['FName'].'</h3>';
            echo '<h3><i class="fa fa-user" aria-hidden="true"></i>&nbsp;'.$row['LName'].'</h3>';
            echo '<h3> <i class="fa fa-circle" aria-hidden="true"></i>&nbsp;'.$row['Type'].'</h3>';
            echo '<a href="#?s='.$row['InvID'].'" target=_blank style="text-decoration:none;">Accept Membership</a>';
            echo '</div>';
      
    }         
  
  
  ?>

</body>

</html>

