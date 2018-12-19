<html>
    <head>
      <title>Get Started With NamanAngels</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link type="text/css" rel="stylesheet" href="css\startup.css">
      <link type="text/css" rel="stylesheet" href="css\sticky.css">

    </head>
    <body>
      <?php require 'include/header/staticst.php'; ?>
      <div class="container">
        <div class="ss">
          <center>
            <br>
      	     <b><font style="font-size:4vw;font-family:Arial;">STARTUP SMARTER</font></b>
             <br>
      	      <p style="font-size:20;">
      	         Join the 500,000 founders that have used Naman. to start, grow, and fund their companies.
      	          <br>
                  <br><br>
          	 <button class="button" style="width:250px;background-color:#0A2B40;color:white;" onclick="location.href='Signing/register_st.php'">
               GET STARTED FOR FREE
             </button>
             <br><br>
          	</center>
        </div>

            <div class="stick" id="navbar">
              <div class="sticknop">
              </div>
              <div class="stickin">
              <center>
                <br>
              	<a href="#inc">INCORPORATE</a>
              	<a href="#rc">RAISE CAPITAL</a>
                <!-- <a href="">FAQ</a> -->
                <br><br>
              </center>
             </div>
              <div class="sticknop">
              </div>
            </div>

            <div class="one" id="inc">
              <br><br><br><br><br><br>
              <center>
            <big> Incorporate and grow your company</big>
                <br><br>
            <font>Start and run your company confidently with startup legal,
              accounting, and financial tools and services all on one simple platform. Naman was designed by experienced startup
               founders, investors, and lawyers, to help you incorporate and grow your company like a seasoned entrepreneur.<br><br>
            </font>
          </center>
            </div>
            <div class="imageone"><center><img src="img/Launch.png" height="300px"></center></div>

            <div class="imagetwo"><center><img src="img/happy.png" height="300px"></center></div>

            <div class="two" id="rc">
              <center>
                <br><br><br><br><br><br>
              <!-- <big><b>Apply for startup funding</b></big><br><br> -->
            <big>  Raise Capital from Top Angel Investors & VCs.</big><br><br>
            <font>Naman angels provides a single common application for hundreds of angel groups across the world.
              The Naman Company Profile guides you through the process of honing your application and connecting with the right investors.
              Thousands of companies have used their profile to collectively raise through the Naman angel network.<br><br>
              <a class="create" href="register_st.php"> Create your Company profile</font></a>
            </center>
            </div>


            <div class="none"><br><br></div>
            <div class="gs">
        <font style="font-size:20px">Building a successful business requires more than just capital
           - a motivated team, a business edge,<br>
          mentoring, technological support and networks.
            We at Naman carefully curate startups and hand-hold them through <br>
            the entire process of angel investing.
            The startups we choose have an overall access to all amenities<br>
            of our incubation center, networks and technology support.
          </font>
          <br><br>
          <button class="button" style="width:250px;background-color:#0A2B40;color:white;" onclick="location.href='Signing/register_st.php'">APPLY NOW </button>
          <br>
          <br>
            </div>
            <div class="no5">.</div>

            <!-- <div style="grid-column: span 12">
              <div class="foot" style="background-color:#ecf0f1;">
                <center>
                <br>
                <font style="font-size:20px;font-family:Courier;">
              <pre>
              <a class="a1" href="#">Company Info</a>  <a href="#" class="a1">For Startups</a>  <a href="#" class="a1">For Investors</a>  <a href="#" class="a1"> Support </a> <a href="#" class="a1"> Contact Us</a>
              </pre>
                </font>
              <i class="fa fa-facebook-official" style="font-size:48px;color:#9cc5e0"></i>
              <i class="fa fa-twitter-square" style="font-size:49px;color:#9cc5e0"></i>
              <br>
              <pre>
              <a class="a2" href="#">Terms of Service </a> | <a href="#" class="a2"> Privacy </a> | <a class="a2" href="#" > License </a>
            </center>
              </div>
            </div> -->
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
