<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
        .list{
            background-color: #F4F6F6;
        }
        .list li{
            display: inline-block;
            background-color: #F4F6F6;
        }
        #icon{
            display: inline-block;
            font-size: 20px;
            color:#9cc5e0;
            margin-right:10px;
        }
        #icon:hover{
            cursor:pointer;
            font-size: 25px;
            color:black;
        }

        
#mainNav{
  font-family:"arial";
  text-align:left;
  /* font-weight:bold; */
}
#mainNav ul {
  list-style: none;
  margin:0;
  text-align:left;
  margin-left: 200px;
}
#mainNav ul li {
  display: inline-block;
  display:inline;
  margin: 20px;
  text-align:center;
}
#mainNav ul li a {
  padding-bottom: 10px;
  text-decoration: none;
  color: black;
  text-align:center;
}
#mainNav ul li a,
#mainNav ul li a:after,
#mainNav ul li a:before {
  transition: all .5s;
}
#mainNav ul li a:hover {
  color:#0A2B40;
}

/* stroke */
#mainNav.stroke ul li a
{
  position: relative;
}
#mainNav.stroke ul li a:after,
#mainNav ul li a:after {
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
#mainNav.stroke ul li a:hover:after {
  width: 100%;
}

#mainNav ul li a {
  transition: all 1s;
}

#mainNav ul li a:after {
  text-align: left;
  content: '.';
  margin: 0;
  opacity: 0;
}
#mainNav ul li a:hover {
  color: #008CBA;
  z-index: 1;
}
#mainNav ul li a:hover:after {
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
    <nav id="mainNav" class="stroke">
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
    <br>
    <p class="media">
        <i class="fa fa-facebook-official" id="icon"></i>
        <i class="fa fa-linkedin-square" id="icon"></i>
        <i class="fa fa-twitter-square" id="icon"></i>
        <i class="fa fa-instagram" id="icon"></i>
    </p>
    </center>
    </div>
</body>
</html>
