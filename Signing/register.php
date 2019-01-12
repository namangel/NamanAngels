<html>
	<head>
		<title>Registor Yourself</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/sign.css">
	</head>

	<body>

		<?php require 'include/header/sign.php'; ?>

		<div class="grid-container">

		<div class="item2">
			<center>
			<img src="../img/logo2.png" height="200"><br>
		</center>
		Join the Naman's Platform for Startup Investing
		<hr style="align:center;size:10px;width:30%">
		</div>

		<div class="item3">
			Please select the role that describes you.
			<br>
			<button class="buttonst" onclick="location.href='register_st.php'">I'm A Start-up</button>
			<br>
			<button class="buttoninv" onclick="location.href='register_inv.php'">Im An Investor</button>

			<br><br>
			<hr style="align:center;size:10px;width:30%">
			<br>
			Already registered? <a href="login.php" class="a1">Sign In</a>
		</div>
		</div>
		<?php require "../include/footer/footer.php"?>
	</body>
</html>
