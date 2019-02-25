<?php require('../../server.php');
if(!isset($_SESSION['InvID'])){
    header('location: pageerror.php');
}
$u = $_SESSION['InvID'];
$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
$results = mysqli_query($db, $qu);
$row = mysqli_fetch_assoc($results);
$cname = $row['CName'];
?>
<html>
<head>
  <title>Investor Profile - NamanAngels</title>
  <link rel="stylesheet" type="text/css" href="css/inv_landing.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?= $cname ?>'s Dashboard | NAMAN</title>
  <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>

<body>

<?php require "include/header/inv_land.php"?>
<?php require "include/nav/nav.php"?>
<div>
    <div style="margin-left: 150px; margin-right: 150px; margin-top: 20px; ">
        <br>
        <p><font size="6px"><center>License Naman For Your Investor Organization</center></font></p><br>
        <p>To expedite your consultation and onboarding, please fill out the following form to help us understand your group.
        Naman is a deal flow management platform available for free to investor groups affiliated with Naman's partners.
        If you're a new group interested in using Naman to manage deals, but don't have the necessary affiliation, we'll refer you
        the appropriate federation in your region so you can get information about how to join. Once your group has been qualified
        we'll send you an invite to create your administrator account, as well as a link to a guide for getting your group up and
        running on Naman.</p> <br><br>
        <p><font size="5px" color="black">Thank you for your interest in Naman!</font></p><br>
    </div>
    <div style="background-color: #f2f2f2; margin-left: 150px; margin-right: 150px; margin-top: 20px;">
        <p style="padding:20px">Our team will contact you shortly to discuss your needs and schedulea demo. In the meantime, find out the latest
        industry news and expert insights on our blog, or take a look at some startups in your area.</p>
    </div>
    <div style="margin-left: 150px; margin-right: 150px; margin-top: 20px; ">
		<h3>Next Steps</h3>
    </div>
    <div class="step">
        <div><i class="fa fa-calendar fa-3x" style="color: #008040"></i>
            <a href="inv_demo.php"><button class="button1">Demo<br>Schedule an introductory call or demo</button></a>
        </div>
        <div><i class="fa fa-registered fa-3x" style="color: #008040"></i>
            <a href="DB/index.php"><button class="button1">Register<br>Complete your enterprise license registration</button></a>
        </div>

        <div><i class="fa fa-info-circle fa-3x" style="color: #008040"></i>
                <a href="DB/browse.php"><button class="button1">Startups<br>Explore latest startups</button></a>
        </div>
    </div>
    <br><br>

</div>
  <?php require "../../include/footer/footer.php"?>
</body>
</html>
