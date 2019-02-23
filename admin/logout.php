<?php
if(!session_id()) {
    session_start();
}
$_SESSION = array();
session_destroy(); //destroy the session
header("location: index.php"); //to redirect back to "index.php" after logging out
?>
