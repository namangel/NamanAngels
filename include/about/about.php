<html>
    <head>
        <title>What is Naman Angel?</title>
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
        padding: 1px;
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
          background: #B0C4DE;
        }
        .company ul{
          text-align: center;
          padding: 0 0 1rem 0;
        }
        .contact{
          background: darkgray;
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
          background: #B0C4DE;
          text-transform: uppercase;
        }
        .contact form input[type=submit]:hover{
          background: red;
          color: white;
          outline: 0;
          transition: background 2s ease-out;
        }
        .contact form input[type=text]:hover , .contact form textarea:hover ,.contact form input[type=email]:hover {
          background-color: #87CEFA;
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
        body{
          margin: 0;
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
          margin-bottom: 50px;
          box-sizing: border-box;
          padding: 0px;
          color: black;
          text-align: center;
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
        .c3{
          position: relative;
          width: 100%;
          height: 300px;
          background: #ecf0f1;
          margin-bottom: 100px;
          text-align: center;

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
        .c2{
          width: 100%;
          height: 400px;
          text-align: center;


        }
        .c4{
          width: 100%;
          height: 600px;
        }
        .c3 p{
          padding-top: 20px;
          padding-left: 40px;
          padding-right: 40px;
          text-align: center;
          }
    </style>
<body>
    <div class="c1" id="fstp">
        <font style="font-size:30 ; color:blue">For startup</font>
    </div>
    <div class="c2" id="finv">
        <font style="font-size:30 ; color:blue">For Investor</font>
    </div>
    <div class="c3" id="cinf">
        <font style="font-size:30 ; color:blue">Company Info</font>
        <p>
            <font style="font-family: arial ; font-size:18">
                Naman Angels India Foundation (NAMAN) is Navi Mumbai’s first Seed Investment & Innovation Platform.
                We are committed to disrupt the seed investment in Navi Mumbai and Maharashtra. Our innovation platform
                provides values to startups through its angel networks, venture funds & co-working facility and strategic tie-ups.<br>
                NAMAN ensures that quality startups are given the support they need in the form of capital, tech support and mentoring.
                NAMAN carefully curate startups and hand-hold them through the entire process of angel investing.
                The startups choose by NAMAN and they have an overall access to all amenities of our incubation center,
                networks and technology support.
            </font>
        </p>
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
                    <input type="submit" value="SEND MESSAGE" onclick="return val()">
                </p>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
