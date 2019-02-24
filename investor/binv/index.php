<?php
    require '../../server.php';

    if (isset($_POST['loginmem'])) {

      $mem = mysqli_real_escape_string($db, $_POST['memid']);
      $pass = mysqli_real_escape_string($db, $_POST['pass']);
      // $designation = mysqli_real_escape_string($db, $_POST['designation']);

    //     $fpass = sha1($password);
      // $query = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
      // $results = mysqli_query($db, $query);
      // $row = mysqli_fetch_assoc($results);
      if ($mem = "memberabc" && $pass == "mem123") {

          // $_SESSION['adminID'] = $row['adminID'];
          // $_SESSION['search'] = "";

          header('location: blindbrowse.php');

      }else {
          echo "<script>alert('Wrong id/password combination')</script>";
      }

    }
?>
<head>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require "include/header/binv_browse.php"?>
    <br>
    <br>
    <center>
      <img src="../../img/Logo2.png" style="height: 230px;">
      <br>
      <br>

    <div class="login">
        <center><h1>Membership Login</h1></center>
        <form method="post" action="index.php">
            <input type="text" name="memid" placeholder="Enter Membership ID">
            <br>
            <!-- <input type="text" name="designation" placeholder="Enter Designation">
            <br> -->
            <input type="password" name="pass" placeholder="Enter Password">
            <br>
            <input type="submit" name="loginmem" class="log" value="Login">
        </form>
        <p> Not a member yet?</p>
        <p> Create your Investor Profile Now </p>
        <button class="mem" type="submit"  onclick="location.href='../../signing/register_inv.php'">
          CREATE INVESTOR PROFILE</button>
        <p> OR Join the Naman Network now </p>
        <button class="mem" type="submit"  onclick="location.href='../../signing/direct_member.php'">
          GET MEMBERSHIP</button>
    </div>
    <br>
    <br>
    </center>

    <?php require "../../include/footer/footer.php"?>
</body>
