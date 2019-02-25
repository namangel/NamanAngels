<?php require('../../server.php');
if(!isset($_SESSION['InvID'])){
    header('location: ../pageerror.php');
}
 ?>
<html>
<head>
<title>Membership Mail Confirmation| NAMAN</title>
  <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php require 'include/header/sign.php'; ?>


  <div class="header"><h2>A Mail has Been sent to Naman and you will recieve a Reply from Naman Shortly</h2><hr></div>
  <div>
</div>
</div>
<?php require "../../include/footer/footer.php"?>
</body>
</html>
