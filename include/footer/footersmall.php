<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
        .list{
            background-color: white;
        }
        .list li{
            display: inline-block;
            background-color: white;
        }
        #icon{
            display: inline-block;
            font-size: 20px;
            color:#9cc5e0;
            margin-right:10px;
        }
        #icon:hover{
            cursor:pointer;
            color:black;
        }


        #mainNav1{
          font-family:"arial";
          text-align: center;
          background-color: white;
          /* font-weight:bold; */
        }
        #mainNav1 ul {
          list-style: none;
          margin:0;
          text-align:center;
        }
        #mainNav1 ul li {
          display: inline-block;
          display:inline;
          margin: 20px;
          text-align:center;
        }
        #mainNav1 ul li a {
          padding-bottom: 10px;
          text-decoration: none;
          color: black;
          text-align:center;
        }
        #mainNav1 ul li a,
        #mainNav1 ul li a:after,
        #mainNav1 ul li a:before {
          transition: all .5s;
        }
        #mainNav1 ul li a:hover {
          color:#0A2B40;
        }

        /* stroke */
        #mainNav1.stroke ul li a{
          position: relative;
        }
        #mainNav1.stroke ul li a:after, #mainNav1 ul li a:after {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
          width: 0%;
          content: '.';
          color: transparent;
          background:#0A2B40;
          height: 1px;
        }
        #mainNav1.stroke ul li a:hover:after {
          width: 100%;
        }

        #mainNav1 ul li a {
          transition: all 1s;
        }

        #mainNav1 ul li a:after {
          text-align: center;
          content: '.';
          margin: 0;
          opacity: 0;
        }
        #mainNav1 ul li a:hover {
          color: #008CBA;
          z-index: 1;
        }
        #mainNav1 ul li a:hover:after {
          z-index: -10;
          animation: fill 1s forwards;
          opacity: 1;
        }
    </style>
</head>
<body>
    <div class="list">
        <center>
            <br>
            <hr width=80%>
            <nav id="mainNav1" class="stroke">
                <ul type="none">
                    <li><a href="/NamanAngels/include/about/team.php" class="foota1"> Our Team</a></li>
                    <li><a class="foota2" href="#">Terms of Service </a></li>
                    <li><a href="/NamanAngels/include/about/about.php#fstp" class="foota1">For Startups</a></li>
                    <li><a class="foota2" href="#"> Privacy </a></li>
                    <li>
                    <a href="/NamanAngels/include/about/about.php#finv" class="foota1">For Investors</a></li>
                    <li>
                    <a class="foota2" href="#" > License </a>
                    </li>
                    <li>
                    <a href="/NamanAngels/include/about/about.php#cont" class="foota1"> Support </a>
                    </li>
                    <li>
                    <a href="/NamanAngels/include/about/about.php#cont" class="foota1"> Contact Us</a>
                    </li>
                </ul>
            </nav>
            <p class="media" style="line-height:25px;">
                <i class="fa fa-facebook-official" id="icon"></i>
                <i class="fa fa-linkedin-square" id="icon"></i>
                <i class="fa fa-twitter-square" id="icon"></i>
                <i class="fa fa-instagram" id="icon"></i>
            </p>

        </center>
    </div>
</body>
</html>
