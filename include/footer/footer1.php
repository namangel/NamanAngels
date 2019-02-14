<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
.grid-container {
 					display: grid;
  					grid-template-columns: 1fr 1fr 1fr;
 				    background-color:#F4F6F6;
 				    color: #444;
 				    font-family:Arial, Helvetica, sans-serif
}
.grid-item {
   			background-color:#F4F6F5;
  			padding: 5px 70px;
  			height:430px;
}
.spa a{
          text-decoration: none;
          color:black;
}
.spa a:visited{
          		color:black;
}
.foota1:hover{
            font-size: 15px;
            color: black;
}
.foota2:hover{
            font-size: 15px;
            color: black;
}
.spa{
            display: inline-block;
            width: 120px;
        }
#icon{
            display: inline-block;
            font-size: 24px;
            color:#9cc5e0;
            margin-right:10px;
}
#icon:hover{
            cursor:pointer;
            font-size: 50px;
            color:black;
}
#map{
			height:200px;
			width:inherit;
}
</style>
</head>
<body>
<div class="grid-container" >
  <div class="grid-item" style="font-size:16px;"><a href="./index.php"><img src="/NamanAngels/img/HeaderLogo.png" style="height:100px;width:350px; margin: 5px;"></a>
  <p align="justify">Naman Angels India Foundation (NAMAN) is Navi Mumbai's first Seed Investment & Innovation Platform. We are committed to disrupt the seed investment in Navi Mumbai and Maharashtra. Our innovation platform provides values to startups through its angel networks, mentors, venture funds & co-working facility and strategic tie-ups.</p><br><br><br><br><br><br><br>
  <p align="left" style="font-size:11px">Coyright © 2018 All Rights Reserved.A Tapaswi Group Ventures Presentation LLP.</p>


  </div>
  <div class="grid-item" style="font-size:16px;"><br><center><h1>Useful Links</h1><br>
    <table width="50%">
      <tr>
        <td><ul><li><span class="spa">
                  <a href="/NamanAngels/include/about/team.php" class="foota1"> Our Team</a>
                </span></li></ul></td>
        <td><ul><li> <span class="spa">
                  <a class="foota2" href="#">Terms of Service </a>
                </span></li></ul></td>
      </tr>
      <tr>
        <td><ul><li><span class="spa">
                  <a href="/NamanAngels/include/about/about.php#fstp" class="foota1">For Startups</a>
                </span></li></ul></td>
        <td><ul><li><span class="spa">
                  <a class="foota2" href="#"> Privacy </a>
                </span></li></ul></td>
      </tr>
      <tr>
        <td><ul><li><span class="spa">
                  <a href="/NamanAngels/include/about/about.php#finv" class="foota1">For Investors</a>
                </span></li></ul></td>
        <td><ul><li> <span class="spa">
                  <a class="foota2" href="#" > License </a>
                </span></li></ul></td>
      </tr>
      <tr>
        <td><ul><li><span class="spa">
                  <a href="/NamanAngels/include/about/about.php#cont" class="foota1"> Support </a>
                </span></li></ul></td>
        <td><ul><li><span class="spa">
                  <a href="/NamanAngels/include/about/about.php#cont" class="foota1"> Contact Us</a>
                </span></li></ul></td>
      </tr>
    </table>
    
               <br><br><br><br><br><br><center>
  <p>
  	<i class="fa fa-facebook-official" id="icon"></i>
            <i class="fa fa-linkedin-square" id="icon"></i>
            <i class="fa fa-twitter-square" id="icon"></i>
            <i class="fa fa-instagram" id="icon"></i>
            
   </p>
   </center>
  </div>
  <div class="grid-item"><br><center><h1>Address</h1>
  <div id="map">
    <script>
	function initMap() {
  	var uluru = {lat: -25.344, lng: 131.036};
  	var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 4, center: uluru});
    var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT9SkM5dzPSbUvMyJrO3QsiYtRfzWIZkA&callback=initMap">
    </script> 
  </div></center><br><br><br><br><br>
   <p align="right" style="font-size:11px">Designed by xyz</p>
  </div>

  <br>
</div>
	
</body>
</html>
