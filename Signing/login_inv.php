<?php require('../server.php') ?>

<html>
<head>
  <title>Investor Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

    <?php require 'include/header/sign.php'; ?>
    <div class="cont">
        <br>
        <div class="header">
            <h2>Login - Invester</h2><hr>
        </div>
        <div class="logform">
            <form method="post" action="login_inv.php">
                <?php include('errors.php'); ?>
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" autofocus>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="butcont">
                    <div class="input-group">
                        <button type="submit" class="btn" name="login_inv" style="background-color:#0e3c58;">Login</button>
                    </div>
                    <p style="font-size:14px">
                        Not a member yet? <a href="register_inv.php">Register</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

    <?php require "../include/footer/footer.php"?>

</body>
</html>
