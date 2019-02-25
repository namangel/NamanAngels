<html>
    <head>
        <title>About Naman Angels | NAMAN</title>
        <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
        <link rel="stylesheet" href="style.css">
        <script language="JavaScript">
            function val()
            {
                var fn=document.form1.fname.value;
                var ln=document.form1.lname.value;
                var pn=document.form1.phno.value;
                var e=document.form1.email.value;
                var atp=e.indexOf("@");
                var dpt=e.indexOf(".");

                if((pn.length<10)||(pn.length>10))
                {
                	alert("Enter Valid Phone Number");
                	return false;
                }

                for(i=0;i<pn.length;i++)
                {
                    var ch=pn.charAt(i);
                    if(ch<"0"||ch>"9")
                    	{
                    		alert("Enter Valid Phone Number");
                    		return false;
                    	}
                }
                if(atp<1||dpt<atp+1)
                {
                    alert("Enter Valid Email id");
                    return false;
                }
            }
        </script>
    </head>
    <style>
        *{
          box-sizing: border-box;
        }
        body{
        background: white;
        line-height: 1.6;
        padding-right: 50px;
        padding-left: 50px;
        padding-top: 20px;
        }

        .top{
          font-size: 30px;
          color: blue;
        }

        .content{
          font-family: arial;
          font-size: 18px;
        }

        .apply-button{
          width:200px;
          height:50px;
          background-color: #0A2B40;
          color:white;
        }

        .apply-button:hover{
          opacity: 0.8;
        }
        .container1{
          max-width: 1000px;
          margin-left: auto;
          margin-right: auto;
          padding: 1px;
        }

        ul{
          list-style: none;
          padding: 0;
        }
        .brand{
          text-align: center;
        }

        .brand span{
          color: blue;
        }

        .wrapper{
          box-shadow: 0 0 20px 0 rgba(76,94,116,0.6);
        }

        .wrapper > *{
          padding: 1em;
        }
        .company{
          background: #d9d9d9;
        }
        .company ul{
          text-align: center;
          padding: 0 0 1rem 0;
        }
        .contact{
          background: #d9d9d9;
        }
        .contact span{
          color: blue;
        }
        .contact form{
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-gap: 15px;
        }
        .contact form label{
          display: block;
        }
        .contact form p{
          margin: 0px;
        }
        .contact form .full{
          grid-column: 1 / 3;
        }
        .contact form input , .contact form textarea ,.contact form button{
          border: none;
          width: 100%;
          padding: 10px;
        }
        .contact form input[type=submit] {
          background-color: #0A2B40;
          color:white;
          text-transform: uppercase;
          width: 200px;
        }
        .contact form input[type=submit]:hover{
          opacity: 0.8;
          transition: background 2s ease-out;
        }
         @media(min-width:700px) {
        .wrapper{
          display: grid;
          grid-template-columns: 1fr 2fr;
        }
        .wrapper > *{
          padding: 2em;
        }
        .company h2 , .company ul{
          text-align: left;
        }
        }
        .h1{
          width: 100%;
          height: 150px;
          padding-top: 20px;
        }
        .c1{
          position: relative;
          width: 100%;
          height: 300px;
          background: #ecf0f1;
          box-sizing: border-box;
          color: black;
        }

        .c2{
          width: 100%;
          height: 400px;
          margin-top: 50px;
        }

        .c3{
          position: relative;
          width: 100%;
          height: 700px;
          background: #ecf0f1;
          margin-bottom: 100px;
        }

        .objective{
          display: grid;
          margin-left: 200px;
          margin-right: 200px;
          grid-template-columns: 1fr 1fr 1fr;
          grid-gap: 40px;
        }

        .obj{
          padding-top: 20px;
          background-color: white;
          text-align: center;
          border-bottom: 1px solid #ccc;
        }

        .obj:hover{
          border-bottom: 8px solid #1e90ff;
        }
        .obj img{
          height: 90px;
          width: 90px;
        }
        .c4{
          width: 100%;
          height: 600px;
        }
        .c1 p, .c2 p, .c3 p{
          padding-top: 20px;
          padding-left: 50px;
          padding-right: 50px;
          }

        .c1:after{
          position: absolute;
          width: 100%;
          height: 100%;
          content: '';
          background: inherit;
          z-index: -1;
          top: 0;
          right: 0;
          left: 0;
          bottom: 0;
          transform-origin: top left;
          transform: skewY(4deg);

        }

        .c3:after{
          position: absolute;
          width: 100%;
          height: 100%;
          content: '';
          background: inherit;
          z-index: -1;
          top: 0;
          right: 0;
          left: 0;
          bottom: 0;
          transform-origin: top left;
          transform: skewY(-4deg);

        }

    </style>
<body>
      <?php
      include "../header/sign.php"
      ?>
    <div class="c1" id="fstp">
        <font class="top"><center>For startup</center></font>
          <p>
              <font class="content">
              Building a successful business requires more than just capital – a motivated team, a business edge, mentoring, technological
              support and networks NAMAN nurtures the idea of start-ups, helps them grow with proper mentoring and provides varied investment
              opportunities for the investors. NAMAN ensures that quality startups are given the support they need in the form of capital,
              tech support and mentoring. NAMAN carefully curate startups and hand-hold them through the entire process of angel investing.
              The startups choose by NAMAN and they have an overall access to all amenities of our incubation center, networks and technology
              support.
              </font>
          </p>
          <br><center>
          <button class="apply-button" onclick="location.href='/NamanAngels/Signing/register_st.php'">APPLY NOW </button>
          </center><br>
    </div>
    <div class="c2" id="finv">
        <center><font class="top">For Investor</font></center>
          <p>
              <font class="content">
              As Seed Investment continues to grow, Naman Angels India Foundation will strive to bring investors a greater breadth of
              investment opportunities. Investors when onboard are provided with Investor Development Program (IDP) and opportunities to
              attend round table conferences with fellow investors. Once the agreement is signed the investor becomes a certified NAMAN
              investor with recognition across social media.
              </font>
          </p>
          <br>
          <center>
          <button class="apply-button" onclick="location.href='/NamanAngels/Signing/register_inv.php'">APPLY NOW </button>
          </center><br>
    </div>
    <div class="c3" id="cinf">
        <center><font class="top">Company Info</font></center>
        <p>
            <font class="content">
                Naman Angels India Foundation (NAMAN) is Navi Mumbai’s first Seed Investment & Innovation Platform.
                We are committed to disrupt the seed investment in Navi Mumbai and Maharashtra. Our innovation platform
                provides values to startups through its angel networks, venture funds & co-working facility and strategic tie-ups.<br>
                NAMAN ensures that quality startups are given the support they need in the form of capital, tech support and mentoring.
                NAMAN carefully curate startups and hand-hold them through the entire process of angel investing.
            </font>
        </p>
        <center><font style="font-size: 24px; color: #1390ff;">Objectives</font></center><br>
        <div class="objective">
          <div class="obj">
            <img src="../img/objective1.png">
            <p>Providing a platform to support and mentor selected entrepreneurs to reach the stage of “investor readiness”.</p>
          </div>
          <div class="obj">
            <img src="../img/objective2.png">
            <p>Facilitating a Pan-India Network of Entrepreneurs, Investors and Mentors.</p>
          </div>
          <div class="obj">
            <img src="../img/objective3.png">
            <p>Provide investment opportunities to deserving entrepreneurs, provide real time solutions to grave problems of modern economies.</p>
          </div>
        </div>
    </div>
<div class="c4" id="cont">
    <div class="container1">
        <div class="wrapper animated bounceInLeft ">
            <div class="company">
                <h2 class="brand"><span>Contact</span> Us</h2>
                <ul>
                    <li>Investor Relation Queries</li>
                    <li>ABC</li>
                    <li>XYZ</li>
                    <li><i class="fa fa-phone"></i>  +91 915 2095 991</li>
                    <li><i class="fa fa-envelope"></i> naman@namanangels.com</li>
                </ul>
            </div>
        <div class="contact">
            <h2> <span>Email</span> Us</h2>
            <form name="form1" >
                <p>
                    <label>First Name</label>
                    <input type="text" style="width:270px" name="fname" required>
                </p>
                <p>
                    <label>Last Name</label>
                    <input   type="text" style="width:270px" name="lname" required>
                </p>
                <p>
                    <label>Phone No</label>
                    <input   type="text" style="width:270px" name="phno" required>
                </p>
                <p>
                    <label>Email Id</label>
                    <input   type="email" style="width:270px" name="email" required>
                </p>
                <p class="full">
                    <label>Message</label>
                    <textarea  name=msg  rows="5" required></textarea>
                </p>
                <p class="full">
                    <center><input type="submit" value="SEND MESSAGE" onclick="return val()"></center>
                </p>
            </form>
            </div>
        </div>
    </div>
</div>
        <?php
                include "../footer/footer.php"
        ?>
</body>
</html>
