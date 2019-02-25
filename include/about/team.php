<?php
    require '../../server.php';
?>
<html>
    <head>
        <title>Team Naman | NAMAN</title>
        <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
        <link rel="stylesheet" href="/NamanAngels/css/team.css">
    </head>

    <body>
      <?php
      include "../header/sign.php";
      ?>

        <font class="adv"><center>Our Chief Advisory & Team</center></font>
        <?php
        $qu = "SELECT * FROM namanteam";
        $results = mysqli_query($db, $qu);
        echo '<div class="advisory">';
        while($row = mysqli_fetch_assoc($results))
        {
                echo '<div class="member">
                        <center>
                        <img src="../../'.$row['Image'].'" style="border-radius:50%;" /><br>
                        <a class="linkedin" href="'.$row['Link'].'">My LinkedIn</a><br><br>
                        <font class="name">'.$row['Name'].'</font><br>
                        <p class="designation">'.$row['Description'].'</p></center>
                    </div>';
        }
        echo '</div>';
        ?>
        <?php
        include "../footer/footer.php"
        ?>
    </body>
    </html>
