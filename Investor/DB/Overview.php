<?php
	require '../../server.php';
	$u = $_SESSION['username'];
	$qu = "SELECT * FROM user_inv WHERE Username='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['Fname'];
    $lname = $row['Lname'];
    $cname = $row['Cname'];
    $web = $row['Website'];
    $city = $row['City'];
    $state = $row['State'];
	$country = $row['Country'];
	$phone = $row['Phone'];
    $email = $row['Email'];
    $website = $row['Website'];

    $qu = "SELECT * FROM inv_overview WHERE Username='$u'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $img = $row['ProfileImage'];
    $role = $row['Role'];
    $partner = $row['Partner'];
    $invrange = $row['InvRange'];
    $indOfInt=$row['IndustryOfInterest'];
    $summary=$row['Summary']==""? 'Tell the world who you are and what makes your company special.':$row['Summary'];
	$linkedin=$row['LinkedIn'];
	$facebook=$row['FBLink'];
	$twitter=$row['TwitterLink'];

	if(isset($_POST["cbsave"])){
        $cbfname = mysqli_real_escape_string($db, $_POST['cbfname']);
        $cblname = mysqli_real_escape_string($db, $_POST['cblname']);
		$cbcomp = mysqli_real_escape_string($db, $_POST['cbcomp']);
		$cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
		$cbrole = mysqli_real_escape_string($db, $_POST['cbrole']);
        $cbpartner = mysqli_real_escape_string($db, $_POST['cbpartner']);
        $cbioi = mysqli_real_escape_string($db, $_POST['cbioi']);
		$cbrange = mysqli_real_escape_string($db, $_POST['cbrange']);
		$cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);


		if($cbfname != "")
		{
			$q = "UPDATE user_inv set FirstName ='$cbfname' where Username='$u';";
			mysqli_query($db, $q);
        }

        if($cblname != "")
		{
			$q = "UPDATE user_inv set LastName ='$cbfname' where Username='$u';";
			mysqli_query($db, $q);
		}

		if($cbcomp != "")
		{
			$q = "UPDATE user_inv set Stage='$cbcomp' where Username='$u';";
			mysqli_query($db, $q);
		}

		if($cbcity != "")
		{
			$q = "UPDATE user_inv set City='$cbcity' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbcountry != "")
		{
			$q = "UPDATE user_inv set Country='$cbcountry' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbrole != "")
		{
			$q = "UPDATE inv_overview set Role ='$cbrole' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbpartner != "")
		{
			$q = "UPDATE inv_overview set Partner ='$cbpartner' where Username='$u';";
			mysqli_query($db, $q);
        }
        if($cbioi != "")
		{
			$q = "UPDATE inv_overview set IndustryOfInterest ='$cbioi' where Username='$u';";
			mysqli_query($db, $q);
		}
		if($cbrange != 'Select Investment')
		{
			$q = "UPDATE inv_overview set InvRange='$cbrange' where Username='$u';";
			mysqli_query($db, $q);
        }
		if($cbweb != "")
		{
			$q = "UPDATE user_inv set Website='$cbweb' where Username='$u';";
			mysqli_query($db, $q);
		}

		$check = getimagesize($_FILES["cbpic"]["tmp_name"]);
	    if($check !== false){
			$image = $_FILES['cbpic']['tmp_name'];
	        $imgContent = addslashes(file_get_contents($image));

			$q = "UPDATE inv_overview set ProfileImage='$imgContent' where Username='$u';";
			mysqli_query($db, $q);
		}

		header('location: Overview.php');
	}


    if(isset($_POST["sfsave"])){
		$sllinkin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sltwit = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$slfb = mysqli_real_escape_string($db, $_POST['sffacebook']);

		if($sllinkin != NULL)
		{
			$q = "UPDATE inv_overview set LinkedIn='$sllinkin' where Username='$u'";
			mysqli_query($db, $q);
        }
		if($sltwit != NULL)
		{
			$q = "UPDATE inv_overview set TwitterLink='$sltwit' where Username='$u'";
			mysqli_query($db, $q);
        }
		if($slfb != NULL)
		{
			$q = "UPDATE inv_overview set FBLink='$slfb' where Username='$u'";
			mysqli_query($db, $q);
        }
		header('location: Overview.php');
    }

    if(isset($_POST["cfsave"]))
	{
		$cfemail = mysqli_real_escape_string($db, $_POST['cfemail']);
		$cfphone = mysqli_real_escape_string($db, $_POST['cfphone']);

		if($cfemail != NULL)
		{
			$q = "UPDATE user_inv set Email='$cfemail' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($updphone != NULL)
		{
			$q = "UPDATE user_inv set Phone='$cfphone' where Username='$u'";
			mysqli_query($db, $q);
		}

		header('location: Overview.php');
    }

    if(isset($_POST["sumsave"]))
	{
        $summ = mysqli_real_escape_string($db, $_POST['summaryform']);
		if($summ != NULL)
		{
			$q = "UPDATE inv_overview set Summary='$summ' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Overview.php');
    }

	if(isset($_POST['gmsave'])){
		$tmname = mysqli_real_escape_string($db, $_POST['tmname']);
		$tmdesig = mysqli_real_escape_string($db, $_POST['tmdesig']);
		$tmexp = mysqli_real_escape_string($db, $_POST['tmexp']);

		$q = "INSERT INTO inv_group (Username, GrpName, GrpDesignation, GrpExperience) VALUES ('$u','$tmname', '$tmdesig', '$tmexp')";
		mysqli_query($db, $q);
		header('location: Overview.php');

	}

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piyear = mysqli_real_escape_string($db, $_POST['piyear']);
		$pistage = mysqli_real_escape_string($db, $_POST['pistage']);

		$q = "INSERT INTO inv_previnvestment (Username, PIName, PIYear, PIStage) VALUES ('$u', '$piname', '$piyear', '$pistage');";
		mysqli_query($db, $q);

		header('location: Overview.php');
	}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/invprof.css" type="text/css">
        <script src="js/invprofform.js"></script>
				<title>Investor Profile - NamanAngels</title>
    </head>
    <body>
		<?php require '../include/header/inv_db.php'; ?>
		<?php require '../include/nav/nav.php'; ?>
        <div class="container">
            <div class="main">
            	<div class="backimg">
                        <font style="font-size:30px;"><?= $cname ?></font>
                </div>
                <div class="sideprof">
					<div class="pen">
						<button class="pencil" onclick="on()"><i class="fa fa-pencil"></i></button>
						<br>
					</div>
                    <div class="upload">
                        <div><?= '<img src="data:image/jpeg;base64,'.base64_encode($img).'"/>';?></div>
                    </div>
                    <ul class="proflist">
                        <li class="item">Name <span class="value"><?= $fname ?>&nbsp;<?= $lname ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Company <span class="value"><?= $cname ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">City <span class="value"><?= $city ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Country <span class="value"><?= $country ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
						<li class="item">Industry Of Interest <span class="value"><?= $indOfInt ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Role <span class="value"><?= $role ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Partner <span class="value"><?= $partner ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Investment Range <span class="value"><?= $invrange ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Website <span class="value"><?= $website ?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                    </ul>
                </div>
				<div id="overlay">
                    <div class="compbasics">
                        <form class="profform" method="post" action='Overview.php' enctype="multipart/form-data">
                            <button class="close" onclick="off()"><i class="fa fa-close"></i></button>
                            <div class="i1">
                                <h2>Investor Basics</h2>
                                <p>Add or edit required basic information about yourself or firm.</p>
                                <hr>
                            </div>
							<div class="i2">
                                <label for="cbpic">Profile Image</label><br>
                                <input name="cbpic" type="file">
                            </div>
                            <div class="i2">
                                <label for="cbfname">First Name</label><br>
                                <input name="cbname" type="text" placeholder="">
                            </div>
                            <div class="i2">
                                <label for="cblname">Last Name</label><br>
                                <input name="cbname" type="text" placeholder="">
                            </div>
                            <div class="i2">
                                <label for="cbcomp">Company Name</label><br>
                                <input name="cbcomp" type="text" placeholder="">
                            </div>
                            <div class="i5">
                                <label for="cbcity">City</label><br>
                                <input name="cbcity" type="text"placeholder="">
                            </div>
                            <div class="i5">
                                <label for="cbcountry">Country</label><br>
                                <input name="cbcountry" type="text" placeholder="">
                            </div>
                            <div class="i7">
                                <label for="cbrole">Role</label><br>
                                <input name="cbrole" type="text" placeholder="">
                            </div>
                            <div class="i8">
                                <label for="cbpartner">Partner Name</label><br>
                                <input name="cbpartner" type="text" placeholder="">
                            </div>
                            <div class="i5">
                                <label for="cbioi">Industry Of Interest</label><br>
                                <input name="cbioi" type="text"placeholder="">
                            </div>
                            <div class="i3">
                                <label for="cbrange">Investment Range</label><br>
                                <select name="cbrange" placeholder=">">
                                    <option>Select Investment</option>
                                    <option>0 - 1,00,000</option>
                                    <option>1,00,000 - 10,00,000</option>
                                    <option>10,00,000 - 50,00,000</option>
                                    <option>50,00,000 - 1,00,00,000</option>
                                    <option>More than 1,00,00,000</option>
                                </select>
                            </div>
                            <div class="i9">
                                <label for="cbweb">Website</label><br>
                                <input name="cbweb" type="text" placeholder="">
                            </div>
                            <div class="butn">
                                <button class="cancel" onclick="off()">Cancel</button> <button class="save" name="cbsave">Save</button>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="social sideprof">
                    <button class="pencil" onclick="socialon()"><i class="fa fa-pencil"></i></button>
                    <h3>Social presence</h3>
					<ul class="proflist">
						<li class="item">LinkedIn <span class="value"><?=$linkedin?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
						<li class="item">Twitter <span class="value"><?=$twitter?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
	                    <li class="item">Facebook <span class="value"><?=$facebook?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
                    </ul>
                </div>
				<div id="socialformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="socialoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Social Presence</h3>
                            <p>Add your company's social media links.</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="socialic"><i class="fa fa-linkedin"><input type="text" name="sflinkedin" size="30"></i></div>
                                <div class="socialic"><i class="fa fa-twitter"><input type="text" name="sftwitter" size="30"></i></div>
                                <div class="socialic"><i class="fa fa-facebook"> <input type="text" name="sffacebook" size="30"></i></div>
                                <br>
                                <div class="formtext submits">
                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
                                        <input type="submit" value="Save" name="sfsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="contact sideprof">
                    <button class="pencil" onclick="contacton()"><i class="fa fa-pencil"></i></button>
                    <h3>Contact</h3>
					<ul class="proflist">
						<li class="item">Phone :  <span class="value"><?=$phone?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Email ID : <span class="value"><?= $email?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                    </ul>
                </div>
				<div id="contactform">
                    <form class="form" method="post">
                        <div class="formhead">
                            <button onclick="contactoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Contact Information</h3>
                            <p>Provide contact information for your company.</p>
                        </div>
                        <div class="formtext">
                                <label for="phone">Phone Number</label>
                                <br>
                                <input type="text" name="cfphone"  size="40">
                                <br>
                                <label for="email">Email</label>
                                <br>
                                <input type="text" name="cfemail" size="40">
                                <br><br>
                            <div class="formtext submits">
                                    <input type="submit" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="cfsave" class="save">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="nav">
                    <div><a href="Overview.php" style="color:black;">Overview</a></div>
                </div>
                <div id="sumformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="summoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Comapany Summary</h3>
                            <p>Add an overview to help investors evaluate your startup. You might like to include your business model, structure and products/services.</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext"><textarea rows="10" cols="150" name="summaryform"></textarea></div>
                                <div class="formtext submits">
                                    <input type="submit" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="sumsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>







				<div class="summary">
                    <div class="databox">
                        <button onclick="summon()" class="pencil"><i class="fa fa-pencil"></i></button>
                        <h3>Investor Description</h3>
						<?php echo $summary;
							if($summary == "Describe yourself and the value of your investment."){
								echo '<img src="../img/Capture.png">';
							}
						?>
                    </div>
					<div class="databox">
                        <button onclick="addgrpon()" class="add"><i class="fa fa-plus"></i></button>
                        <h4>Group</h4>
						<?php
							$q = "SELECT * FROM inv_group where Username='$u';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Designation</th>";
								echo "<th>Experience</th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["GrpName"].'</td>';
									echo '<td>'.$row['GrpDesignation'].'</td>';
									echo '<td>'.$row['GrpExperience'].'</td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/prof.png">';
							}
						?>
                    </div>
					<div class="databox">
                        <!-- <button onclick="teamon()" class="pencil"><i class="fa fa-pencil"></i></button> -->
                        <button onclick="addpion()" class="add"><i class="fa fa-plus"></i></button>
                        <h4>Previous Investment</h4>
						<?php
							$q = "SELECT * FROM inv_previnvestment where Username='$u';";
							$results=mysqli_query($db, $q);
							if (mysqli_num_rows($results) > 0) {
								echo '<table class="tables">';
								echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Year</th>";
								echo "<th>Stage</th>";
								echo "</th>";
							    while($row = mysqli_fetch_assoc($results)) {
							        echo '<tr>';
									echo '<td>'.$row["PIName"].'</td>';
									echo '<td>'.$row['PIYear'].'</td>';
									echo '<td>'.$row['PIStage'].'</td>';
									echo "</tr>";
							    }
								echo '</table>';
							} else {
								echo '<img src="../img/prof.png">';
							}
						?>
                    </div>
				</div>

				<div id="sumformov">
                    <div class="form">
                        <div class="formhead">
                            <button onclick="summoff()" class="close"><i class="fa fa-close"></i></button>
                            <h3>Comapany Summary</h3>
                            <p>Add an overview to help investors evaluate your startup. You might like to include your business model, structure and products/services.</p>
                        </div>
                        <div class="formtext">
                            <form method="post">
                                <div class="formtext"><textarea rows="10" cols="150" name="summaryform"></textarea></div>
                                <div class="formtext submits">
                                    <input type="submit" value="Cancel" name="cancel" class="cancel">
                                    <input type="submit" value="Save" name="sumsave" class="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

				<div id="addteam">
                        <div class="form">
                            <div class="formhead">
                                <button onclick="addgrpoff()" class="close"><i class="fa fa-close"></i></button>
                                <h3>Add a Group Member</h3>
                                <p>Your Group is one of the most influential factors driving the investment process.</p>
                            </div>
                            <div class="formtext">
                                <form method="post">
                                    <div class="formtext">
                                        <label>Name</label><br>
                                        <input type="text" name="tmname" size="50" required><br><br>
                                        <label>Designation</label><br>
                                        <input type="text" name="tmdesig" size="50" required><br><br>
                                        <label>Experience and Expertise</label><br>
                                        <textarea rows="10" name="tmexp" cols="150" required></textarea><br><br>
                                    </div>
                                    <div class="formtext submits">
                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
                                        <input type="submit" value="Save" name="gmsave" class="save">
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>

				<div id="inv">
                        <div class="form">
                            <div class="formhead">
                                <button onclick="addpioff()" class="close"><i class="fa fa-close"></i></button>
                                <h3>Add a Previous Investment</h3>
                                <p class="icsize">Please provide the name and email address of a previous investment.</p>
                            </div>
                            <div class="formtext">
                                <form method="post">
                                    <div class="formtext">
                                        <label>Name</label><br>
                                        <input type="text" size="50" name="piname" required><br><br>
                                        <label>Year</label><br>
                                        <input type="number" min="2000" max="2099" step="1" size="50" name="piyear" required /><br><br>
										<label>Stage</label><br>
										<select name="pistage" name="pistage" required>
		                                    <option>Select Stage</option>
		                                    <option>Concept Only</option>
		                                    <option>Product in Development</option>
		                                    <option>Prototype ready</option>
		                                    <option>Full Product Ready</option>
		                                    <option>$500K in TTM Revenue</option>
		                                    <option>$1M in TTM Revenue</option>
		                                    <option>$5M in TTM Revenue</option>
		                                    <option>$10M in TTM Revenue</option>
		                                    <option>$20M in TTM Revenue</option>
		                                    <option>$50M in TTM Revenue</option>
		                                    <option>$50M+ in TTM Revenue</option>
		                                </select>
                                    </div>
                                    <div class="formtext submits">
                                        <input type="submit" value="Cancel" name="cancel" class="cancel">
                                        <input type="submit" value="Save" name="pisave" class="save">
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
			<?php require "../../include/footer/footer.php" ?>
        </div>

    </body>
</html>
