<?php
	require '../../server.php';

	$id = $_SESSION['StpID'];

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
					<?php
					$qu = "SELECT * FROM tools;";
					$results = mysqli_query($db, $qu);
					while($row = mysqli_fetch_array($results)){
							echo '<div class="card">';
							echo '<img src='.$row['tl_img'].' alt="John">';
										echo '<h1>'.$row['tl_name'].'</h1>';
									echo '<p class="title">'.$row['tl_desc'].'</p>';
									echo '<p class="price">'.$row['tl_cost'].'</p>';
									echo "<a href='#' target='_blank'>
									<button type='submit' name='subinv' class='pricebtn' value='Price' action='index.php'>BUY</button></a>";

							echo '</div>';
					}
					?>
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
