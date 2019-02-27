<?php require('../server.php');
  if(isset($_POST['mem'])){


  $memid = strtoupper('MEM'.substr(sha1($In, FALSE), 0, 8));

  // $In = mysqli_real_escape_string($db, $_POST['inv_id']);
  $In = $_SESSION['newmem'];
  $Stdate = mysqli_real_escape_string($db, $_POST['stdate']);
  $Endate = mysqli_real_escape_string($db, $_POST['endate']);

  // echo $In;
  // echo $memid;
  $q = "UPDATE userinv SET MemID = '$memid' WHERE InvID='$In';";
  mysqli_query($db, $q);

  $q2 = "INSERT INTO membership (InvID, MemID, StDate, ExpDate) VALUES ('$In','$memid','$Stdate','$Endate');";
  mysqli_query($db, $q2);

  header('location: estmem.php');

}
?>
<?php require "sidebar.php"; ?>

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
  .welcome {
    margin-left: 290px;
    z-index: -100;
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
    .btn{
      background-color:  #ff8533;
      border: none;
      color: white;
      padding: 10px;
    }
  </style>
  </head>
<body>
    <div class="welcome">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="content">
              <h2>View Members!</h2>
              <p>Get the details of existing members.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="teamform">
    <form method="POST" action="estmem.php">
        <label>Inv Id:</label><br>
        <input type="text" name="inv_id" required><br><br>
        <input type="submit" name="get_details" value="GET DETAILS">
    </form>
  </div>
<br>
  <?php
      if (isset($_POST["get_details"]))
      {
        if (isset($_POST['inv_id'])){
          $InvID = mysqli_real_escape_string($db, $_POST['inv_id']);
          $check_query = "SELECT * FROM aview WHERE InvID='$InvID' ;";
          $result = mysqli_query($db, $check_query);
          $num = mysqli_num_rows($result);
          if($num ==0){
            echo '<div class="card"><br>';

            echo '<h3 style="color:#ff8533";>Investor Does Not Exist</h3>';
            echo '<h3>Investor Id Incorrect</h3>';
            echo '</div>';
          }
          else{
            $row=mysqli_fetch_assoc($result);
            if(empty($row['MemID'])){
                echo '<div class="card"><br>';

                echo '<h3 style="color:#ff8533";>'.$row['CName'].'</h3>';
                echo '<h3><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;'.$row['FName'].'</h3>';
                echo '<h3><i class="fa fa-user" aria-hidden="true"></i>&nbsp;'.$row['LName'].'</h3>';
                echo '<h3> <i class="fa fa-circle" aria-hidden="true"></i>&nbsp;'.$row['Type'].'</h3><br>';
                echo '<form method="POST" action="estmem.php">';
                echo '<label>Start Date:</label><br>
                      <input type="date" name="stdate" placeholder="yyyy-mm-dd"><br><br>
                      <label>End Date:</label><br>
                      <input type="date" name="endate" placeholder="yyyy-mm-dd"><br><br>';
                // echo '<input type="hidden" name="invid" value="'.$row['InvID'].'">';
                $_SESSION['newmem'] = $row['InvID'];
                echo '<input type="submit" name="mem" value="Accept Membership">';
                echo '</form>';
                // echo '<a href="estmembership.php?inid='.$row['InvID'].'"target=_blank><button class="btn">Accept Membership</button></a>';
                // echo '<form method="POST" action="estmem.php">'.'<input type="submit" name="accept" value="Accept Membership">'.'</form>';
                echo '</div>';
                // header('location: estmem.php');
                // $memid = strtoupper('MEM'.substr(sha1($invID, FALSE), 0, 8));
              }
              else{
                echo '<div class="card"><br>';

                echo '<h3 style="color:#ff8533";>Membership Exists</h3>';
                echo '<h3>Investor is Already a Member</h3>';
                echo '</div>';
              }
            }
          }
    }
  ?>

</body>

</html>
