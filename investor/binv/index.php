<?php
    require '../../server.php';
?>
<head>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Investor Membership | NAMAN</title>
    <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
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
            <input type="text" name="binid" placeholder="Enter Investor ID" required>
            <br>
            <!-- <input type="text" name="designation" placeholder="Enter Designation">
            <br> -->
            <input type="text" name="memid" placeholder="Enter Membership ID" required>
            <br>
            <input type="submit" name="loginblind" class="log" value="Login">
        </form>
        <p> Not a member yet?</p>
        <p> Create your Investor Profile Now </p>
        <button class="mem" type="submit"  onclick="location.href='../../signing/register_inv.php'">
          CREATE INVESTOR PROFILE</button>
        <p> OR Join the Naman Network now </p>
        <button class="mem" type="submit"  onclick="location.href='../../Signing/register_mem.php'">
          GET MEMBERSHIP</button>
    </div>
    <br>
    <br>
    </center>

    <?php require "../../include/footer/footersmall.php"?>
</body>
