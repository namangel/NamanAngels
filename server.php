<?php
session_start();

// initializing variables

$iname = "";
$fname = "";
$lname = "";
$email = "";
$country = "";
$city = "";
$state = "";
$website = "";
$average = "";
$username ="";
$phone ="";
$stname ="";
$ffname ="";
$sfname ="";
$type = "";
$inv ="";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'naman');

// REGISTER INVESTER
if (isset($_POST['reg_inv'])) {

  $iname = mysqli_real_escape_string($db, $_POST['iname']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $website = mysqli_real_escape_string($db, $_POST['website']);
  $avg = mysqli_real_escape_string($db, $_POST['average']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (empty($iname) or empty($fname) or empty($lname) or empty($password_1) or empty($email) or empty($city) or empty($username) or empty($phone) or empty($state) or empty($website) or empty($avg) or empty($password_1))
  { array_push($errors, "Fill All the fields");
  }

  if (strlen($password_1) < 8) {
	array_push($errors, "Enter Password Greater than 8 Characters");
  }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (strlen($phone) < 10) {
	array_push($errors, "Enter Correct Phone Number");
  }

  $user_check_query = "SELECT * FROM user_inv WHERE Username='$username' OR Email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }
  if (count($errors) == 0) {
    $fpass = sha1($password_1);
  	$query = "INSERT INTO user_inv (Cname,Fname,Lname,Email,Country,State,City,Website,Avg,Username,Phone,Password)
  			  VALUES('$iname', '$fname', '$lname', '$email', '$country', '$state', '$city', '$website', '$avg', '$username', '$phone', '$fpass')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['country'] = $country;
    $_SESSION['state'] = $state;
    $_SESSION['city'] = $city;
    $_SESSION['website'] = $website;
    $_SESSION['phone'] = $phone;

    $query = "INSERT INTO inv_overview (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO inv_group (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO inv_previnvestment (Username) values ('$username')";
  	mysqli_query($db, $query);

  	// $_SESSION['success'] = "You are now logged in";
  	header('location: ../Investor/inv_landing.php');
  }
}

//REGISTOR STARTUP
if (isset($_POST['reg_st'])) {

  $stname = mysqli_real_escape_string($db, $_POST['stname']);
  $ffname = mysqli_real_escape_string($db, $_POST['ffname']);
  $sfname = mysqli_real_escape_string($db, $_POST['sfname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $website = mysqli_real_escape_string($db, $_POST['website']);
  $inv = mysqli_real_escape_string($db, $_POST['inv']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($stname) or empty($ffname) or empty($sfname) or empty($inv) or empty($email) or  empty($type)
  or empty($country) or empty($city) or empty($username) or empty($phone) or empty($state) or empty($website) or empty($password_1) or empty($password_2))
  { array_push($errors, "Fill All the Fields"); }

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (strlen($password_1) < 8) {
   array_push($errors, "Enter Password Greater than 8 Characters");
  }
  if (strlen($phone) < 10) {
   array_push($errors, "Enter Correct Phone Number");
  }
  $user_check_query = "SELECT * FROM user_st WHERE Username='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if($user['username'] == $username) {
      array_push($errors, "Username already exists");
    }

    if($user['email'] == $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
    $fpass = sha1($password_1);
    $query = "INSERT INTO user_st (Stname,Ffname,Sfname,Email,Type,Country,State,City,Website,Inv,Username,Phone,Password)
    VALUES('$stname','$ffname','$sfname','$email','$type','$country','$state','$city','$website','$inv','$username','$phone','$fpass')";
    mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['stname'] = $stname;
    $_SESSION['fname'] = $ffname;
    $_SESSION['lname'] = $sfname;
    $_SESSION['email'] = $email;
    $_SESSION['country'] = $country;
    $_SESSION['state'] = $state;
    $_SESSION['city'] = $city;
    $_SESSION['website'] = $website;
    $_SESSION['phone'] = $phone;

    $query = "INSERT INTO st_overview (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO st_advisors (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO st_exec (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO st_previnvestment (Username) values ('$username')";
  	mysqli_query($db, $query);

    $query = "INSERT INTO st_teams (Username) values ('$username')";
  	mysqli_query($db, $query);

  	// $_SESSION['success'] = "You are now logged in";
  	header('location: ../StartUp/stp_landing.php');
  }
}

// LOGIN INVESTER
if (isset($_POST['login_inv'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $fpass = sha1($password);
  	$query = "SELECT * FROM user_inv WHERE Username='$username' AND Password='$fpass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
		  header('location: ../Investor/inv_landing.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//LOGIN STARTUP
if (isset($_POST['login_st']))
{
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)){
  	array_push($errors, "Username is required");
  }
  if (empty($password)){
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0)
  {
    $fpass = sha1($password);
  	$query = "SELECT * FROM user_st WHERE Username='$username' AND Password='$fpass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  		header('location: ../StartUp/stp_landing.php');
  	}
    else
    {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


?>
