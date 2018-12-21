<?php
	require '../../server.php';
	// $_SESSION['username'] = 'xyz123';//predefine -- nikalo mujhe
	$u = "";
	if (isset($_GET['searchquery'])) {
		$u = $_GET['searchquery'];
	}

	$qu = "SELECT * FROM user_st WHERE Username='$u'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$ID = $row['ID'];
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
	$Sfname = $row['Sfname'];
	$Email = $row['Email'];
	$Type = $row['Type'];
	$Country = $row['Country'];
	$State = $row['State'];
	$City = $row['City'];
	$Website = $row['Website'];
	$Inv = $row['Inv'];
	$Phone = $row['Phone'];
	$Password = $row['Password'];

	$q = "SELECT * FROM st_overview WHERE Username='$u';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Stage = $row['Stage'] == "" ? '--' : $row['Stage'];
	$DOF = $row['DOF'] == "" ? '--' : $row['DOF'];
	$EmpNum = $row['EmpNum']==""? '--':$row['EmpNum'];
	$IncType = $row['IncType']==""? '--':$row['IncType'];
	$LinkedInLink = $row['LinkedInLink']==""? '--':$row['LinkedInLink'];
	$TwitterLink = $row['TwitterLink']==""? '--':$row['TwitterLink'];
	$FBLink = $row['FBLink']==""? '--':$row['FBLink'];
	$Summary = $row['Summary']==""? 'Tell the world who you are and what makes your company special.':$row['Summary'];
	$OLP = $row['OLP']==""? '--':$row['OLP'];
	$Logo = $row['Logo'];

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/companyprof.css" type="text/css">
        <script src="js\profform.js"></script>
				<title>StartUp Profile - NamanAngels</title>
    </head>
    <body>
			<?php require '../include/header/stp_profile.php'; ?>
        <div class="container">
            <div class="main">
				<div class="backimg">
                        <font style="font-size:30px;"><?= $Stname?></font>
                </div>
                <div class="sideprof">
                    <div class="upload">
                        <div><?= '<img src="data:image/jpeg;base64,'.base64_encode($Logo).'"/>';?></div>
                    </div>
                    <ul class="proflist">
                        <li class="item">Name <span class="value"><?= $Stname?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Stage <span class="value"><?= $Stage?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Industry <span class="value"><?= $Type?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Location <span class="value"><?= $City.", ".$State.", ".$Country?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Founded <span class="value"><?= $DOF?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Employees <span class="value"><?= $EmpNum?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Incorporation Type <span class="value"><?= $IncType?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Website <span class="value"><?= $Website?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                    </ul>
                </div>
                <div class="social sideprof">
                    <h3>Social presence</h3>
					<ul class="proflist">
						<li class="item">LinkedIn <span class="value"><?= $LinkedInLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
						<li class="item">Twitter <span class="value"><?= $TwitterLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
	                    <li class="item">Facebook <span class="value"><?= $FBLink?></span></li>
	                    <li style="list-style: none; display: inline">
	                        <hr>
	                    </li>
                    </ul>
                </div>

                <div class="contact sideprof">
                    <h3>Contact</h3>
					<ul class="proflist">
						<li class="item">Phone :  <span class="value"><?= $Phone?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                        <li class="item">Email ID : <span class="value"><?= $Email?></span></li>
                        <li style="list-style: none; display: inline">
                            <hr>
                        </li>
                    </ul>

                </div>
				<div class="nav">
                    <div><a href="Overview.php?searchquery=<?=$u?>">Overview</a></div>
                    <div><a href="Exec.php?searchquery=<?=$u?>">Executive summary</a></div>
                    <div><a href="Finance.php?searchquery=<?=$u?>">Financials</a></div>
                    <div><a href="Doc.php?searchquery=<?=$u?>">Documents</a></div>
                </div>
				<div class="summary">
						<div class="databox">
	                        <h3>Business Plan</h3>
	                        <p>What is your long term business plan? Preferred file types: .pdf, .doc, .xls</p>
						</div>
						<div class="databox">
	                        <h3>Financial Projections</h3>
	                        <p>Provide an overview of where your financials are headed within the next 5 years. Preferred file types: .pdf, .doc, .xls</p>
	        	</div>
						<div class="databox">
	                        <h3>Supplemental Documents</h3>
	                        <p>Upload any documents to support your company.</p>
						</div>
				</div>
    		</div>
        </div>
		<?php include '../../include/footer/footer.php'; ?>
    </body>
</html>
