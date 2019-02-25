<?php
    require '../server.php';
    if(!isset($_SESSION['adminID'])){
        header('location: index.php');
    }

    $u = $_SESSION['adminID'];
    $qu = "SELECT * FROM admin WHERE adminID='$u'";
    $results = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $Password = $row['Password'];

	if(isset($_POST["changepw"]))
	{
        $curr_pw= mysqli_real_escape_string($db, $_POST['currentpassword']);
        // $curr_pwd=sha1($curr_pw);
        $pw_1 = mysqli_real_escape_string($db, $_POST['pw_1']);
        $pw_2 = mysqli_real_escape_string($db, $_POST['pw_2']);
        $error=0;

        if ($Password != $curr_pw) {
            echo "<script>alert('Your Password is incorrect')</script>";
            $error=$error+1;
        }
        if (strlen($pw_1) < 8) {
            echo "<script>alert('Enter Password Greater than 8 Characters')</script>";
            $error=$error+1;
           }
        if ($pw_1 != $pw_2) {
            echo "<script>alert('The two passwords do not match')</script>";
            $error=$error+1;
        }
        if ($error == 0){
            // $pw=sha1($pw_1);
            $pw=$pw_1;
            $q = "UPDATE admin set Password='$pw' where adminID='$u';";
			mysqli_query($db, $q);
            echo "<script>alert('Password Changed Successfully')</script>";
        }
    }

?>
<html>
<head>
    <title>Account- Change Password| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/changepassword.css">
</head>
<style>
    body {
    margin: 0px;
  }

  .wrapper {
    background-color: #fff;
    color: #444;
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    grid-auto-rows: minmax(100px, auto) ;
  }

  .wrapper > div {
   border: 2px solid white;
   border-radius: 5px;
   }


  .two{
    margin-left: 310px;
   grid-column: 1;
   grid-row: 2/8;
   background-color:white;
  color:black;
text-align: left;
margin-top:-60px;

  }

  .four{
      grid-column: 1/8;
   grid-row: 8/10;
   background-color:#2a2b3d;
  }
  ul
  {
  margin:0px;
  padding:0px;
  list-style-type:none;
  }



  input[type=text], input[type="email"]{
      width: 100%;
      padding: 12px;
      border: 1px solid rgb(133, 166, 194);
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;

  }
  input[type=submit] {
      background-color:#0A2B40;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float:left;
      align-content: center;
  }

  input[type=file] {
      background-color: transparent;
      color: white;
      width:100%;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float:left;
      align-content: center;
  }
  input[type=password], input[type="tel"]{
      width: 60%;
      padding: 12px;
      border: 1px solid rgb(133, 166, 194);
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;

  }
  input:invalid {
  border-color: #bf4040;
  background: #f2d9d9;
  }


  input[type=submit] {
      background-color:#2a2b3d;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }

  input[type=submit]:hover{
      opacity: 1;
  }
  label{
      color: black;

  }

  h5{
      color:black;
  }
  .hvr-float-shadow {
    transform: translateZ(0);
    transition-duration: 0.3s;
    text-align:100px;
  }

  .hvr-float-shadow:before {
    pointer-events: none;
    position: absolute;
    z-index: -1;
    content: '';
    top: 100%;
    left: 5%;
    height: 10px;
    width: 90%;
    opacity: 0;


    /* W3C */
    transition-duration: 0.3s;
    transition-property: transform, opacity;
  }

  .hvr-float-shadow:hover,
  .hvr-float-shadow:focus,
  .hvr-float-shadow:active {
    transform: translateY(-5px);
    font-weight: bold;
    /* move the element up by 5px */
  }

  .hvr-float-shadow:hover:before,
  .hvr-float-shadow:focus:before,
  .hvr-float-shadow:active:before {
    opacity: 1;
    transform: translateY(5px);
    /* move the element down by 5px (it will stay in place because it's attached to the element that also moves up 5px) */
  }

  #set {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }

  #set td, #set th {

      padding: 8px;
  }

  #set tr:nth-child(even){border:1px solid rgb(133, 166, 194);}

  #set tr:hover {background-image:rgb(92, 86, 86);}

  #set th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: transparent;

      color:black;
      size: 50px;
  }


    </style>
<body>
<?php require "sidebar.php" ?>
<div class="wrapper">
  <div class="two">


        <div class="hvr-float-shadow" >
                CHANGE PASSWORD </div>
      <hr>
        <form method="post" action="changepassword.php">
            <label for="current-password">Current Password</label>
            <br>
            <input autocomplete="current-password" type="password" id="current-password" name="currentpassword" placeholder="Your current password..">
        <br>
            <label for="new-password">Password</label>
            <br>
            <input autocomplete="new-password" type="password" id="new-password" name="pw_1" placeholder="Your  new password..">
        <br>
            <label for="confirm-password">Confirm Password</label>
            <br>
            <input autocomplete="confirm-password" type="password" id="confirm-password" name="pw_2" placeholder="Confirm new password..">
        <br>
        <input type="submit" value="Change Password" name="changepw">
          </form>

  </div>



</body>
</html>
