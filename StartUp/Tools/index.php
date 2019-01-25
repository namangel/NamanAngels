<?php
	require '../../server.php';

	$id = $_SESSION['StpID'];

	$qu = "SELECT * FROM tools;";
	$results = mysqli_query($db, $qu);
	$Tname = array();
	$Tdesc = array();
	$Tcost = array();
	$Timg = array();
	while($row=mysqli_fetch_array($results))
	{
		array_push($Tname,$row['tl_name']);
		array_push($Tdesc,$row['tl_desc']);
		array_push($Tcost,$row['tl_cost']);
		array_push($Timg,$row['tl_img']);
	}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/tools.css" type="text/css">
        <script src="js\profform.js"></script>
				<title>StartUp Profile - NamanAngels</title>

    </head>
    <body>
			<?php require '../include/header/stp_db.php'; ?>
			<?php require '../include/nav/nav.php'; ?>
        <div class="container">
					<div class="card">
						<img src=<?=$Timg[0]?> alt="John">
							<h1><?=$Tname[0]?></h1>
							<p class="title"><?=$Tdesc[0]?></p>
							<p class="price">$ <?=$Tcost[0]?></p>
							<a href="#">
							<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>

					<div class="card">
						<img src=<?=$Timg[1]?> alt="John">
							<h1><?=$Tname[1]?></h1>
							<p class="title"><?=$Tdesc[1]?></p>
							<p class="price">$ <?=$Tcost[1]?></p>
							<a href="#">
							<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>

					<div class="card">
						<img src=<?=$Timg[2]?> alt="John">
							<h1><?=$Tname[2]?></h1>
							<p class="title"><?=$Tdesc[2]?></p>
							<p class="price">$ <?=$Tcost[2]?></p>
							<a href="#">
							<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>

					<div class="card">
						<img src=<?=$Timg[3]?> alt="John">
							<h1><?=$Tname[3]?></h1>
							<p class="title"><?=$Tdesc[3]?></p>
							<p class="price">$ <?=$Tcost[3]?></p>
							<a href="#">
							<button type='submit' name='subin3' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>

					<div class="card">
						<img src=<?=$Timg[4]?> alt="John">
							<h1><?=$Tname[4]?></h1>
							<p class="title"><?=$Tdesc[4]?></p>
							<p class="price">$ <?=$Tcost[4]?></p>
							<a href="#">
							<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>

					<div class="card">
						<img src=<?=$Timg[5]?> alt="John">
							<h1><?=$Tname[5]?></h1>
							<p class="title"><?=$Tdesc[5]?></p>
							<p class="price">$ <?=$Tcost[5]?></p>
							<a href="#">
							<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>
					</div>
					<br>
					<br>
		</div>
				<?php include '../../include/footer/footer.php'; ?>

    </body>
</html>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
