<?php
	require '../../server.php';
	$u = $_SESSION['username'];
	$qu = "SELECT * FROM user_inv WHERE Username='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['Fname'];
	$lname = $row['Lname'];
    $web = $row['Website'];
    $city = $row['City'];
    $state = $row['State'];
	$country = $row['Country'];
	$phone = $row['Phone'];
    $email = $row['Email'];
    $website = $row['Website'];


    if(isset($_POST["slsave"]))
	{
		$sllinkin = mysqli_real_escape_string($db, $_POST['sllinkin']);
		$sltwit = mysqli_real_escape_string($db, $_POST['sltwit']);
		$slfb = mysqli_real_escape_string($db, $_POST['slfb']);

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
		header('location: Inv_Profile_Group.php');
    }


    if(isset($_POST["editsubmit"]))
	{
		$updemail = mysqli_real_escape_string($db, $_POST['updemail']);
		$updphone = mysqli_real_escape_string($db, $_POST['updphone']);
		$updwebsite = mysqli_real_escape_string($db, $_POST['updwebsite']);

		if($updemail != NULL)
		{
			$q = "UPDATE user_inv set Email='$updemail' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($updphone != NULL)
		{
			$q = "UPDATE user_inv set Phone='$updphone' where Username='$u'";
			mysqli_query($db, $q);
		}
		if($updwebsite != NULL)
		{
			$q = "UPDATE user_inv set Website='$updwebsite' where Username='$u'";
			mysqli_query($db, $q);
		}
		header('location: Inv_Profile_Group.php');
    }


    if(isset($_POST["grpsubmit"]))
	{
		$grpname = mysqli_real_escape_string($db, $_POST['grpName']);
        $grpdesig = mysqli_real_escape_string($db, $_POST['grpDesig']);
        $grpexp = mysqli_real_escape_string($db, $_POST['grpExp']);

		if($grpname != NULL and $grpexp != NULL and $grpdesig != NULL)
		{
			$q = "INSERT INTO inv_group  VALUES ('$u','$grpname','$grpdesig','$grpexp');";
			mysqli_query($db, $q);
		}
		header('location: Inv_Profile_Group.php');
    }

    if(isset($_POST["grpremove"]))
	{
		$grpname = mysqli_real_escape_string($db, $_POST['grpName']);

		if($grpname != NULL)
		{
			$q = "DELETE FROM inv_group WHERE Username='$u' AND GrpName='$grpname';";
			mysqli_query($db, $q);
		}
		header('location: Inv_Profile_Group.php');
    }


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/invprof.css" rel="stylesheet" type="text/css">
    <script src="js\invprofile.js"></script>
</head>
<body>
	<?php require '../include/header/inv_db.php' ?>
	<?php require "../include/nav/nav.php"?>
    <div class="profbody">
        <div class="banner">
            <div class="pic"></div>
            <div class="social">
                <button class="butn" onclick="on()">Add Social Links</button>
            </div>
            <div class="detail">
                <div class="name"><?= $fname." ".$lname?></div>
                <div class="det">
                <p><?= $city.", ".$state.", ".$country?></p>
                </div>
            </div>
            <div class="edit">
                <button class="butn" onclick="on1()">Edit Profile</button>
            </div>
            <div class="contact">
                <div class="det"><hr>
                    <span class="title">Phone Number: </span><?= $phone?>
                    <i class="fa fa-phone ic"></i>
                    <hr>
                </div>
                <div class="det">
                    <span class="title">Email: </span><?= $email?>
                    <i class="fa fa-envelope ic"></i>
                    <hr>
                </div>
                <div class="det">
                    <span class="title">Website: </span><?= $web?>
                    <i class="fa fa-globe ic"></i>
                    <hr>
                </div>
            </div>
        </div>
        <div class="tabs">
            <center>
                <div class="tab"><a href="Inv_Profile.php">Summary</a></div>
                <div class="tab"><a href="Inv_Profile_Group.php" style="color:#004de6;">Group</a></div>
                <div class="tab"><a href="Overview.php">Investments</a></div>
            </center>
        </div>
        <div class="pane">
                <h3>Group</h3>
                <p>Manage your affiliations.</p>
                <form method="post" action="Inv_Profile_Group.php">
                    <center>
                        <label>Name:</label>&nbsp;<input type="text" name="grpName" size="50">&nbsp;&nbsp;&nbsp;
                        <label>Designation:</label>&nbsp;<input type="text" name="grpDesig" size="50">
                        <br><br>
                        <label>Experience:</label>&nbsp;&nbsp;<input type="text" name="grpExp" size="115">
                        <br><br>
                        <input type="submit" value="Add" name="grpsubmit" class="butn">&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="Remove" name="grpremove" class="butn">
                        <p style=" font-size:10pt; color:gray;">Fill all details to add a group and only the name to remove corresponding group.</p>
                    </center>
                </form>
                <center>
                <table>
                <tr>
                    <td>Group Name &nbsp;</td>
                    <td>Designation &nbsp;</td>
                    <td>Experience &nbsp;</td>
                </tr>
                <?php
                $qu = "SELECT * FROM inv_group WHERE Username='$u'";
                $results = mysqli_query($db, $qu);
                while($row = mysqli_fetch_assoc($results))
                {
                    $grpname=$row['GrpName'];
                    $grpdesig=$row['GrpDesignation'];
                    $grpexp=$row['GrpExperience'];
                    echo "<tr>
                    <td>$grpname</td>
                    <td>$grpdesig</td>
                    <td>$grpexp</td>
                    </tr>";
                }
                ?>
                </table>
                </center>
        </div>
    </div>

    <div id="links">
            <form class="ovform" method="post">
                <i class="fa fa-window-close" onclick="off()" style="float:right;"></i>
                <div class="inp">
                <label><i class="fa fa-linkedin"></i></label>
                <input size="30" type="text" name="sllinkin">
                </div>
                <div class="inp">
                <label><i class="fa fa-twitter"></i></label>
                <input size="30" type="text" name="sltwit">
                </div>
                <div class="inp">
                <label><i class="fa fa-facebook"> </i></label>
                <input size="30" type="text" name="slfb">
                </div>
                <input type="submit" name="slsave" class="butn">
            </form>
    </div>
    <div id="editprof">
        <form class="ovform" method="post">
            <i class="fa fa-window-close" onclick="off1()" style="float:right;"></i>
            <div class="inp">
            <label>Email:</label>
            <input type="text" name="updemail" value="<?php echo $email; ?>">
            </div>
            <div class="inp">
            <label>Phone Number:</label>
            <input type="text" name="updphone" value="<?php echo $phone; ?>">
            </div>
            <div class="inp">
            <label>Website:</label>
            <input type="text" name="updwebsite" value="<?php echo $website; ?>">
            </div>
            <input type="submit" name="editsubmit" class="butn">
        </form>
    </div>
	<?php require "../../include/footer/footer.php"?>
</body>
