<head>
    <link rel="stylesheet" href="css/sidebar.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
<body>
    <div class="container">
        <div class="color nam"><h1>Naman Angels</h3></div>
        <div class="prof">
            <center>
            <div class="name">Lorem</div>
            <div class="desig">Lorem, ipsum dolor.</div>
            <div class="icon">
                <a href="#"><i class="fa fa-user"></i></a>
                <a href="#"><i class="fa fa-cog"></i></a>
                <a href="#"><i class="fa fa-power-off"></i></a>
            </div>
            </center>
        </div>
        <div class="color navbar">
            <ul class="list">
                <a href="#"><li>Dashboard</li></a>
                <a href="#"><li>Login/Register</li></a>
                <a href="#"><li>Inbox</li></a>
                <li id="down"><button onclick="on()" class="butn">View Profiles
                    <i class="fa fa-angle-down" style="float:right;"></i></button>
                </li>
                <div id="sub">
                <li><button onclick="off()" class="butn">View Profiles
                    <i class="fa fa-angle-down" style="float:right;"></i></button>
                </li>
                <a href="#"><li class="subli">Startup</li></a>
                <a href="#"><li class="subli">Investor</li></a>
                </div>
                <li><a href="#">Services</a></li>
            </ul>
        </div>
    </div>
</body>
