<?php
    require '../../server.php';
?>
<html>
    <head>
        <title>Team NAMAN</title>
        <link rel="stylesheet" href="/NamanAngels/css/team.css">
    </head>

    <body>
      <?php
      include "../header/sign.php"
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
                        <img src="'.$row['image'].'"/>
                        <a class="linkedin" ahref="#">'.$row['member_link'].'</a><br><br>
                        <font class="name">'.$row['member_name'].'</font><br>
                        <p class="designation">'.$row['description'].'</p></center>
                    </div>';
        }
        echo '</div>';
        ?>
        <?php
        include "../footer/footer.php"
        ?>
    </body>
    </html>
