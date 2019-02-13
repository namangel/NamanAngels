<?php?>
<html>
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link name="stylesheet" href="css/sidebar.css">
<link name="test/javascript" href="js/sidebar.js">

<script>
    function on(){
            document.getElementById("down").style.display = "none";
            document.getElementById("sub").style.display = "block";
    }
    function off(){
            document.getElementById("down").style.display = "block";
            document.getElementById("sub").style.display = "none";
    }
</script>       
<style>
* {
    margin: 0;
    padding: 0;
}
.sidebar {
  width: 20%;
  z-index: 1;
  background-color: #0A2B40;
  position: absolute;
}

.side{
    box-shadow: 2px 0px 8px 0px #888888; 
}

.closebtn{
    background-color: #0A2B40;
    color: white;
    margin-top: 10px;
    position: relative;
    float: right;
    font-size: 35px;
}

.closebtn:hover {
  background-color: #444;
}

.openbtn {
  font-size: 35px;
  cursor: pointer;
  background-color: #0A2B40;
  color: white;
  padding: 10px 10px 10px 10px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

.font{
    font-size: 22px;
}

ul{
    list-style: none;
    padding-left: 0;
}

.color{
    background-color:#0A2B40;
    color: white;
}

.nam{
    height: 15%;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 30px;
}

.name,.desig{
    padding-bottom: 30px;
}

.icon i{
    color: black;
    font-size: 30px;
    padding: 5px;
}

.prof{
    background-color:  white;
    height: 25%;
    padding: 20px;
    transition: 0.5s;
    border: 1px solid black;
}

.list li{
    border: 1px solid black;
    padding: 20px;
    text-align: center;
}
.list a{
    color: white;
    text-decoration: none;
}

#sub{
    display:none;
}
.subli{
    background-color: #114b6e;
}

.butn{
    width: 100%;
    border: none;
    background: none;
    color: white;
    cursor: pointer;
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <div class="side">
        <div class="color nam"><br><h1>Naman Angels</h1></div>
        <div class="prof font">
            <center>
            <div class="name" id="name">Name</div>
            <div class="desig" id="desig">Designation</div>
            <div class="icon">
                <a href="#"><i class="fa fa-user"></i></a>
                <a href="#"><i class="fa fa-cog"></i></a>
                <a href="#"><i class="fa fa-power-off"></i></a>
            </div>
            </center>
        </div>
        <div class="color navbar font">
            <ul class="list">
                <a href="dashboard.php"><li><i class="fa fa-dashboard"></i>&nbsp;Dashboard</li></a>
                <a href="#"><li><i class="fa fa-registered"></i>&nbsp;&nbsp;Login/Register</li></a>
                <a href="#"><li><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Inbox</li></a>
                <li id="down" class="font"><button onclick="on()" class="font butn"><i class="fa fa-address-book-o"></i>&nbsp;&nbsp;View Profiles
                    <i class="fa fa-angle-down" style="float:right;"></i></button>
                </li>
                <div id="sub" class="font">
                <li><button onclick="off()" class="butn font"><i class="fa fa-address-book-o"></i>&nbsp;&nbsp;View Profiles
                    <i class="fa fa-angle-up" style="float:right;"></i></button>
                </li>
                <a href="admin_browsestartup.php"><li class="subli font"><i class="fa fa-rocket"></i>&nbsp;&nbsp;Startup</li></a>
                <a href="admin_browseinv.php"><li class="subli font"><i class="fa fa-money"></i>&nbsp;&nbsp;Investor</li></a>
                </div>
                <li><a href="services.php"><i class="fa fa-cog"></i>&nbsp;&nbsp;Services</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html> 
