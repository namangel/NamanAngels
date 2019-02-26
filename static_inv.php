<?php require "server.php"; ?>
<html>
<head>
<title>Investor | NAMAN</title>
<link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css\inv.css">
<link type="text/css" rel="stylesheet" href="css\sticky.css">
</head>
<body>
    <?php
    if(isset($_SESSION['InvID'])){
        require 'include/header/staticinvlogin.php';
    }
    else{
        require 'include/header/staticinv.php';
    } ?>
<div class="container">

  <div class="start1" style=" background-color: #7ec5fd;" >
    <div style="grid-column: span 2; background-color: inherit;"></div>
    <div style="grid-column: span 8; background-color: inherit;">
    <center>
      <br>
      <br>
      <b>
      <font style="font-family:Arial;">
      We partner with exceptional entrepreneurs in the US and India.
       Our team comprises ex-entrepreneurs who are strong
    	"bottom-up" thinkers and "sleeves rolled up" operators.
      With decades of experience in building and funding globally leading companies,
    	we manage USD 1.5 billion across funds.
      Our footprint in world's two leading markets positions us
      uniquely with global insights and ability to
    	serve entrepreneurs.
      </font>
      </b>
      <br>
      <br>

      <center>
      <button class="button" type="submit" style="width:270px;background-color:#0A2B40;color:white;"  onclick="location.href='Signing/register_inv.php'">
        <span>CREATE YOUR PROFILE</span></button>

      <button class="button" type="submit" style="width:270px;background-color:#0A2B40;color:white;"  onclick="location.href='investor/binv'">
      <span>START BROWSING</span></button>
    </center>

    </div>
    <div style="grid-column: span 2; background-color: inherit;"></div>
      <br>
    </center>
  </div>

  <div class="stick" id="navbar">
    <div class="sticknop">
    </div>
    <div class="stickin">
    <center>
      <br>
      <a href="#des">DESIGN</a>
      <a href="#func">FUNCTIONS</a>
      <a href="#qua">QUALITIES</a>
      <br><br>
    </center>
   </div>
    <div class="sticknop">
    </div>
  </div>

  <div class="start" style="background-color:white;">
    <div style="grid-column: span 1; background-color: inherit;"></div>
    <div style="grid-column: span 11; background-color: inherit;">
      <br>
    <font style="font-size:3vw;font-family:Arial;">HOW WE HELP</font>
    <p>We are the go-to thought partners for our entrepreneurs. We operate as <br>
    one team, one firm. Our companies have access to the entire Nexus <br>
    team in Silicon Valley and India for strategic guidance, team-building, and <br>
    opening doors to potential customers and partners.<p>
    </div>
  </div>

  <div class="start" style="background-color: #4fb1fc;color:white;" id="des">
    <div style="grid-column: span 11; background-color: inherit; text-align:right;">
      <br>
        <font style="font-size:3vw;font-family:Arial;">DESIGNED AROUND YOU</font>
      <p>Naman offers the tools accredited angel investors, venture funds and startup programs need to get<br>
      the job done. Whether you're an angel investor group syndicating a deal, <br>
      a venture fund vetting a big investment,or a startup program connecting investors with top startup talent,<br>
      Naman is designed for safe collaboration.<p>
        <br>
    </div>
    <div style="grid-column: span 1; background-color: inherit;"></div>
  </div>

  <div class="imggrid" height="400px" id="func">
    <br><br><br><br><br><br><br>
    <center>
      <img src="img/Relation.png">
    </center>
  </div>

  <div class="deal">
    <br><br><br>
    <div class="deal1">
      <b><font style="font-size:24px;font-family:Arial;">Discuss Deals</font></b></br>
      <br>
      <font>
      Send direct messages, receive email notifications, and maintain a
       log of discussions to ensure everyone's on the same page.
     </font>
     <br>
     <br>
    </div>
    <div class="deal1">
      <b><font style="font-size:24px;font-family:Arial;">Track Deals</font></b></br>
       <br>
       <font>
       Organize and track deals effortlessly from one page
       using customizable workflow tools.
      </font>
      <br>
      <br>
    </div>
    <div class="deal1">
       <b><font style="font-size:24px;font-family:Arial;">Review Deals</font></b></br>
       <br>
       <font>
       Naman makes it easy to review new deals and track investor interest.
      </font>
      <br>
      <br>
    </div>
    <div class="deal1">
      <b><font style="font-size:24px;font-family:Arial;">Share Deals</font></b></br>
      <br>
      <font>
      Invite people from outside of your organization
       to review, advise or join a deal.
     </font>
     <br>
     <br>
   </div>
  </div>

  <div class="no"id="qua">
    <pre>



    </pre>
  </div>

  <div class="objs">
      <div style="grid-column: span 1"> </div>
      <div class="obj">
        <br>
        <center>
          <img src="img/Settings.png" class="imgs"></img><br><br>
        <b><font style="font-size:24px;font-family:Arial;">SIMPLE SETUP<br>
        </font></b><br>
        <font>Naman offers tools and support to ensure importing member data and
        setting up your account is quick and easy.</font>
      </center>
      </div>
      <div style="grid-column: span 1"> </div>
      <div class="obj">
        <br>
        <center>
        <img src="img/Easy.png"class="imgs"></img><br><br>
        <b><font style="font-size:24px;font-family:Arial;">EASY TO USE<br>
        </font></b><br>
        <font>Naman's funding platform is designed to work with your
           current deal flow management processes.  Work smarter, not harder.
        </font><br>
      </center>
      <br>
      </div>
      <div style="grid-column: span 1"> </div>
      <div class="obj">
        <br>
        <center>
        <img src="img/Support.png" class="imgs"></img><br><br>
        <b><font style="font-size:24px;font-family:Arial;">TOTAL SUPPORT<br>
        </font></b><br>
        <font>With dedicated customer support and help guides
           we will ensure you get up to speed quickly.
        </font>
      </center>
      </div>
      <div style="grid-column: span 1"> </div>
  </div>

  <div class="no">
    <pre>



    </pre>
  </div>

  <div class="no2"></div>
  <div class="title">
    <br>
    <b><font style="font-size:40px;font-family:Arial;">What's Private Stays Private</font></b><br><br>
    <font style="font-size: 25px;color:grey">You always control your profile visibility,
      who can contact you, and who has access to your deals.
    </font>
    <br><br>
  </div>

  <div class="no2"></div>

  <div class="no">
    <pre>


    </pre>
  </div>

  <div class="no2"></div>
  <div class="reg">
    <center>
    <br><font style="font-size:35px;font-family:Arial;">READY TO VENTURE FORWARD?</font><br><br>
      <button class="button" type="submit" style="width:270px;background-color:#0A2B40;color:white;"  onclick="location.href='Signing/register_inv.php'">
        <span>CREATE YOUR PROFILE</span></button>
    </center>
    <br>
  </div>

  <div class="reg">
    <center>
    <br><font style="font-size:35px;font-family:Arial;">BE A PART OF OUR NETWORK</font><br><br>
      <button class="button" type="submit" style="width:270px;background-color:#0A2B40;color:white;"  onclick="location.href='Signing/register_mem.php'">
        <span>GET A MEMBERSHIP</span></button>
    </center>
    <br>
  </div>

  <div class="no2"></div>
  <div class="no5">.</div>

  </div>

</div>
<?php require "include/footer/footer.php"?>
<script>
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>
</body>
</html>
