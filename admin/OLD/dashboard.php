<head>
    <!-- <link rel="stylesheet" href="css/dashboard.css" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
body{
    margin: 0px;
    padding: 0px;
}
.main{
    margin-left: 20%;
 } 
.top{
    width:40%;
    margin:30px;
    background-image: linear-gradient(to right, #00b8e6,#00b8e6 50%, white 50%, white);
    padding: 20px;
    color: #0A2B40;
    box-shadow: 2px 0px 8px 0px #888888; 
    border-right: 5px solid #00b8e6;
}
.a1{
    float:left;
}
.a2{
    float:right;
    background-image: linear-gradient(to right, #0A2B40,#0A2B40 50%, white 50%, white);
    border-right: 5px solid #0A2B40;
    color: white;
}
.num{
    float:right;
    color:#0A2B40;
}
</style>
<body>
<div><?php require "sidebar.php" ?></div>
    <div class="contain">
        <div class="main">
            <div class="a1 top">
                    <h5>Today</h5>
                    <h3>USERS: <span class="num">num</span></h3> 
            </div>
            <div class="a2 top">
                    <h5>Today</h5>
                    <h3>VISITED: <span class="num">num</span></h3>
            </div>
        </div>
    </div>
</body>