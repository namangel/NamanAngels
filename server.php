<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'namangel');

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

    $user_check_query = "SELECT * FROM userinv WHERE Username='$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists')</script>";
    }
    else{
        $fpass = sha1($password_1);
        $query = "INSERT INTO userinv (InvID, Username, Password) VALUES (NULL, '$username', '$fpass')";
        mysqli_query($db, $query);

        $user_query = "SELECT * FROM userinv WHERE Username='$username'";
        $result = mysqli_query($db, $user_query);
        $user = mysqli_fetch_assoc($result);
        $userid = $user['InvID'];
        $_SESSION['InvID'] = $user['InvID'];

        $query = "INSERT INTO inv_details (InvID,CName,FName,LName,Email,Phone,Website,City,State,Country,AvgInvestment)
        VALUES('$userid', '$iname', '$fname', '$lname', '$email', '$phone', '$website', '$city', '$state', '$country', '$avg')";
        mysqli_query($db, $query);

        $query = "INSERT INTO inv_addetails (InvID) values ('$userid')";
        mysqli_query($db, $query);
        $query = "INSERT INTO inv_uploads (InvID) values ('$userid')";
        mysqli_query($db, $query);

        // $_SESSION['success'] = "You are now logged in";
        header('location: ../Investor/index.php');
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

        $fpass = sha1($password_1);
        $query = "INSERT INTO userstp (StpID, Username, Password)
        VALUES(NULL, '$username', '$fpass')";
        mysqli_query($db, $query);

        $user_query = "SELECT * FROM userstp WHERE Username='$username'";
        $result = mysqli_query($db, $user_query);
        $user = mysqli_fetch_assoc($result);
        $userid = $user['StpID'];
        $_SESSION['StpID'] = $user['StpID'];

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
        header('location: ../Investor/index.php');
  	}else {
        echo "<script>alert('Wrong username/password combination')</script>";
  	}
}

//LOGIN STARTUP
if (isset($_POST['login_st']))
{
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
