<?php

$db = mysqli_connect('localhost', 'root', '', 'namangel');
//admin login
session_start();

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $query = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  if (mysqli_num_rows($results) == 1) {
      $_SESSION['adminID'] = $row['adminID'];
      header('location: dashboard.php');
  }else {
      echo "<script>alert('Wrong username/password combination')</script>";
  }

}

if (isset($_POST['loginblind'])) {

  $binid = mysqli_real_escape_string($db, $_POST['binid']);
  $memid = mysqli_real_escape_string($db, $_POST['memid']);


  $query = "SELECT * FROM userbinv WHERE BinvID='$binid' AND MemID='$memid'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  if (mysqli_num_rows($results) == 1) {
      $_SESSION['BinvID'] = $row['BinvID'];
      header('location: blindbrowse.php');
  }else {
      echo "<script>alert('Wrong id combination')</script>";
  }

}

// REGISTER INVESTER
if (isset($_POST['reginv_ind'])) {

    $type='Individual';
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $avg = mysqli_real_escape_string($db, $_POST['average']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    $user_check_query = "SELECT * FROM userinv WHERE Username='$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists')</script>";
    }
    else{
        $user_check_query = "SELECT * FROM userinv WHERE Entry = (SELECT max(Entry) from userinv)";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        $newid = (int)(substr($user['InvID'], 5,7)) + 1;
        $userid = 'NAMIN'.str_pad($newid, 7, '0', STR_PAD_LEFT);



        $fpass = sha1($password_1);
        $query = "INSERT INTO userinv (InvID, Username, Password) VALUES ('$userid', '$username', '$fpass')";
        mysqli_query($db, $query);

        $_SESSION['InvID'] = $userid;

        $query = "INSERT INTO inv_details (InvID,CName,FName,LName,Email,Phone,Website,City,State,Country,AvgInvestment,Type)
        VALUES('$userid', null , '$fname', '$lname', '$email', '$phone', null , '$city', '$state', '$country', '$avg', '$type')";
        mysqli_query($db, $query);

        $query = "INSERT INTO inv_addetails (InvID) values ('$userid')";
        mysqli_query($db, $query);
        $query = "INSERT INTO inv_uploads (InvID) values ('$userid')";
        mysqli_query($db, $query);

        // $_SESSION['success'] = "You are now logged in";

        header('location: ../Investor/Individual/index.php');
    }
}


if (isset($_POST['reginv_inst'])) {

  $type='Institution';
  $cname = mysqli_real_escape_string($db, $_POST['iname']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $avg = mysqli_real_escape_string($db, $_POST['average']);
  $website = mysqli_real_escape_string($db, $_POST['website']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  $user_check_query = "SELECT * FROM userinv WHERE Username='$username'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('Username already exists')</script>";
  }
  else{

      $user_check_query = "SELECT * FROM userinv WHERE Entry = (SELECT max(Entry) from userinv)";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      $newid = (int)(substr($user['InvID'], 5,7)) + 1;
      $userid = 'NAMIN'.str_pad($newid, 7, '0', STR_PAD_LEFT);

      $fpass = sha1($password_1);
      $query = "INSERT INTO userinv (InvID, Username, Password) VALUES ('$userid', '$username', '$fpass')";
      mysqli_query($db, $query);

      $_SESSION['InvID'] = $userid;

      $query = "INSERT INTO inv_details (InvID,CName,FName,LName,Email,Phone,Website,City,State,Country,AvgInvestment,Type)
      VALUES('$userid', '$cname' , '$fname', '$lname', '$email', '$phone', '$website' , '$city', '$state', '$country', '$avg', '$type')";
      mysqli_query($db, $query);

      $query = "INSERT INTO inv_addetails (InvID) values ('$userid')";
      mysqli_query($db, $query);
      $query = "INSERT INTO inv_uploads (InvID) values ('$userid')";
      mysqli_query($db, $query);

      // $_SESSION['success'] = "You are now logged in";
      header('location: ../Investor/Institution/index.php');
  }
}

if (isset($_POST['dir_mem'])) {

    $iname = mysqli_real_escape_string($db, $_POST['iname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $website = mysqli_real_escape_string($db, $_POST['website']);

    header('location: ../Signing/mem_email.php');

}



//REGISTOR STARTUP
if (isset($_POST['reg_st'])) {

    $stname = mysqli_real_escape_string($db, $_POST['stname']);
    $ffname = mysqli_real_escape_string($db, $_POST['ffname']);
    $sfname = mysqli_real_escape_string($db, $_POST['sfname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $inv = mysqli_real_escape_string($db, $_POST['inv']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    $user_check_query = "SELECT * FROM userstp WHERE Username='$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists')</script>";
    }
    else{
        $user_check_query = "SELECT * FROM userstp WHERE Entry = (SELECT max(Entry) from userstp)";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        $newid = (int)(substr($user['StpID'], 5,7)) + 1;
        $userid = 'NAMST'.str_pad($newid, 7, '0', STR_PAD_LEFT);

        $fpass = sha1($password_1);
        $query = "INSERT INTO userstp (StpID, Username, Password) VALUES ('$userid', '$username', '$fpass')";
        mysqli_query($db, $query);

        $_SESSION['StpID'] = $userid;

        $query = "INSERT INTO st_details (StpID, Stname,Ffname,Sfname,Email,Phone,Type,Address,Country,State,City,Website,Investment)
        VALUES('$userid','$stname','$ffname','$sfname','$email','$phone','$type','$address','$country','$state','$city','$website','$inv')";
        mysqli_query($db, $query);

        $query = "INSERT INTO st_addetails (StpID) values ('$userid')";
        mysqli_query($db, $query);

        $query = "INSERT INTO st_description (StpID) values ('$userid')";
        mysqli_query($db, $query);

        $query = "INSERT INTO st_uploads (StpID) values ('$userid')";
        mysqli_query($db, $query);


        header('location: ../StartUp/index.php');
    }
}

// LOGIN INVESTER
if (isset($_POST['login_inv'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $fpass = sha1($password);
  	$query = "SELECT * FROM userinv WHERE Username='$username' AND Password='$fpass'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);

  	if (mysqli_num_rows($results) == 1) {
        $_SESSION['InvID'] = $row['InvID'];
        $_SESSION['search'] = "";

        $u = $_SESSION['InvID'];
        $qu = "SELECT * FROM inv_details WHERE InvID='$u'";
        $results = mysqli_query($db, $qu);
        $row = mysqli_fetch_assoc($results);
        $type = $row['Type'];

        if($type == "Individual"){
          header('location: ../Investor/Individual/index.php');
        }
        else{
          header('location: ../Investor/Institution/index.php');
        }

  	}else {
        echo "<script>alert('Wrong username/password combination')</script>";
  	}
}

//LOGIN STARTUP
if (isset($_POST['login_st'])){
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

    $fpass = sha1($password);
  	$query = "SELECT * FROM userstp WHERE Username='$username' AND Password='$fpass'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
        $_SESSION['StpID'] = $row['StpID'];

        header('location: ../StartUp/index.php');
  	}
    else
    {
  		echo "<script>alert('Wrong username/password combination')</script>";
  	}
}


?>
