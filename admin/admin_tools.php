<?php require('../server.php');
if(!isset($_SESSION['adminID'])){
    header('location: index.php');
}


?>
<html>
<?php require "sidebar.php" ?>
<head>
    <title>View Tools & Services| NAMAN</title>
    <link rel="icon" href="../img/favicon.jpg" type="image/jpg" sizes="16x16">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .container1{
            display: grid;
            color:black;
            grid-template-columns: 1fr 1fr 1fr;
            grid-auto-rows: auto;
            grid-gap: 20px;
            text-align: center;
            margin-left: 350px;
            margin-right: 150px;
            margin-top: 50px;
        }

        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          /* background-color: #F4F5FA; */
          margin: auto;
          width: 80%;
          min-height: 250px;
          text-align: center;
          font-family: arial;
          padding-bottom: 30px;
          background-color:white;
        }

        .card img{
            /* padding: 50px; */
            width: 150px;
            height: 150px;
        }
        .title {
          color: grey;
          font-size: 18px;
        }
        .price{
          text-decoration: bold;
          font-size: 25px;
        }
    </style>
</head>
<body>

    <div class="container1">
        <?php
        $qu = "SELECT * FROM tools;";
        $results = mysqli_query($db, $qu);
        while($row = mysqli_fetch_assoc($results)){
            echo '<div class="card">';
                echo '<img src="../'.$row['Image'].'" alt="John">';
                echo '<h1>'.$row['Name'].'</h1>';
                echo '<p class="title">'.$row['Description'].'</p>';
                echo '<p class="price">'.$row['Cost'].'</p>';
            echo '</div>';
        }
        ?>
        <br><br>
    </div>
</body>
