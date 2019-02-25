<?php
require('../server.php');
if(isset($_SESSION['StpID'])){
	header('location: ../StartUp/index.php');
}
if(isset($_SESSION['InvID'])){
	header('location: ../Investor/index.php');
}

?>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css\sign.css">
	<title>Login | NAMAN</title>
  	<link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>
<body>

<?php require 'include/header/sign.php'; ?>

<div class="grid-container">

	<div class="item2">
		<center>
		<img src="../img/logo.png" height="200">
		</center>
		Welcome to Naman
		<hr style="align:center;size:10px;width:30%">
	</div>

	<div class="item3">
		Please select the role that describes you.
		<br>
		<button class="buttonst" onclick="location.href='login_st.php'">I'm A Start-up</button>
		<br>
		<button class="buttoninv" onclick="location.href='login_inv.php'">I'm An Investor</button>
		<br>
		<br>
		<hr style="align:center;size:10px;width:30%">
	</div>
</div>
<?php require "../include/footer/footersmall.php"?>
</body>
</html>
