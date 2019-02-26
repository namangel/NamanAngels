<?php
	require '../../../server.php';
	if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
    $u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $cname = $row['CName'];

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/member.css" type="text/css">
        <script src="js/invprofform.js"></script>
        <title><?= $cname ?>'s Membership | NAMAN</title>
        <link rel="icon" href="../../../img/favicon.jpg" type="image/jpg" sizes="16x16">
    </head>
    <body>
		<?php require '../include/header/inv_db.php'; ?>
		<?php require '../include/nav/nav.php'; ?>
        <div class="container">
            <div class="one">
                <center><big><span>BROWSE THROUGH UNLIMITED INDUSTRIES & GET PREMIUM TREATMENT</span>
                    <br><br><br><br><br><br><br><br>
                    <p class="quote">"A great business starts from small investment, whereas the small investments start from a big risk."</p>
                </big></center>
                <center><button class="button1" onclick="location.href='../../../Signing/direct_member_institution.php'">BECOME OUR MEMBER</button></center>
            </div>
            <div class="two">
                <div class="im">
                    <img src="../../../img/Internet.png" alt="Web Services" style="width:60% ; margin-top:15px;">
                    <p><b style="font-size:1.5vw;">Internet/Web Services</b></p>
                </div>
                <div class="im">
                    <img src="../../../img/Food.png" alt="Food and Drink" style="width:67% ; margin-top:15px;">
                    <p><b style="font-size:1.5vw;">Food and Drink</b></p>
                </div>
            </div>
            <div class="three"  style="margin-top:10px;">
                <div class="im">
                    <img src="../../../img/Media.png" alt="Media" style="width:65% ; margin-top:15px;">
                    <p><b style="font-size:1.5vw;">Media</b></p>
                </div>
                <div class="im">
                    <img src="../../../img/Education.png" alt="Education" style="width:65% ; margin-top:15px;">
                    <p><b style="font-size:1.5vw;">Education</b></p>
                </div>
                <div class="im" style="margin-bottom:20px;">
                    <img src="../../../img/Software.png" alt="Software" style="width:65% ; margin-top:15px;">
                    <p><b style="font-size:1.5vw;">Software</b></p>
                </div>
            </div>
        </div>

        <?php require "../../../include/footer/footer.php" ?>
    </body>
</html>
