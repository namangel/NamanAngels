<?php
  require '../server.php';
  $In = $_GET['inid'];
  $memid = strtoupper('MEM'.substr(sha1($In, FALSE), 0, 8));

  // echo $In;
  // echo $memid;
  $q = "UPDATE userinv SET MemID = '$memid' WHERE InvID='$In';";
  mysqli_query($db, $q);

  header('location: estmem.php');


 ?>
