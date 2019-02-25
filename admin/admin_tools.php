<?php require('../server.php');
if(!isset($_SESSION['adminID'])){
    header('location: index.php');
}


?>
<?php require "sidebar.php" ?>
<html>
<head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }

        .container{
            display: grid;
            color:black;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-auto-rows: auto;
            grid-gap: 20px;
            text-align: center;
            margin-left: 350px;
            margin-right: 150px;
            margin-top: 50px;
        }
        .pricebtn {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          color: white;
          background-color: #2fa29d;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
          height: 50px;
        }
        /* .pricebtn:hover{
          opacity: 0.7;
        } */

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
    <div class="container">
        <?php
        $qu = "SELECT * FROM tools;";
        $results = mysqli_query($db, $qu);
        while($row = mysqli_fetch_array($results)){
            echo '<div class="card">';
            echo '<img src="../'.$row['Image'].'" alt="John">';
                        echo '<h1>'.$row['Name'].'</h1>';
                    echo '<p class="title">'.$row['Description'].'</p>';
                    echo '<p class="price">'.$row['Cost'].'</p>';
                    echo "
                    <button type='submit' name='subinv' class='pricebtn' value='Price'>BUY</button>";

            echo '</div>';
        }
        ?>
        <br>
        <br>
    </div>
</body>
