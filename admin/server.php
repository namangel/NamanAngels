<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'namangel');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    // $designation = mysqli_real_escape_string($db, $_POST['designation']);

//     $fpass = sha1($password);
  	$query = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
        $_SESSION['adminID'] = $row['adminID'];
        // $_SESSION['search'] = "";
        header('location: dashboard.php');
  	}else {
        echo "<script>alert('Wrong username/password combination')</script>";
  	}
}

?>
