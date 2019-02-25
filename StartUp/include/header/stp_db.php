<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/NamanAngels/css/navbar.css">
</head>
<body>
  <div class="topnav">
    <div class="toplogo1">
       <center><a href='../../index.php'><img src="/NamanAngels/img/HeaderLogo.png" style="height:50px;width:135px; margin: 5px;"></a></center>
    </div>
      <div class="dropdown">
          <button class="dropbtn"><?= $Stname?>'s Startup</button>
          <div class="dropdown-content">
              <a href="../../Profile/index.php?s=<?= $_SESSION['StpID']?>" target='_blank'>Profile</a>
              <a href="../Settings/contact.php">Account settings</a>
              <a href="../../logout.php">Sign out</a>
          </div>
      </div>
    </div>
</body>
