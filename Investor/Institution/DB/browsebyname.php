<?php
    require('../../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
    if(isset($_POST['submit'])){
        $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['searchkey']);
        header('location: browsebyname.php?pageno=1');
    }
    $u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $cname = $row['CName'];

    $qu = "SELECT * FROM userinv WHERE InvID='$u'";
  	$resultrow = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $memberstatus = 'Member';
    if(empty($row['MemID'])){
        $memberstatus = 'NotMember'; ///not a member
    }
?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/browse.css">
  <title>Browse Startups by Name | NAMAN</title>
  <link rel="icon" href="../../../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>
<body>

    <?php require "../include/header/inv_db.php"?>
    <?php require "../include/nav/nav.php"?>
    <div class="browsesearch">
        <div class="bsearch">
            <form class="searchform" action="browsebyname.php" method="post">
                <input type="text" name="searchkey" placeholder="Enter Keyword">
                <input type="submit" name="submit" value="Search">
            </form>
            <center>
                <?php
                    if($memberstatus == 'Member'){
                        echo '<p style="color:gray;padding-bottom:10px"><i class="fa fa-lock" aria-hidden="true"></i> Become A Member to have an exclusive access to profile of Startups</p>';
                    }

                ?>
            </center>
        </div>
        <div class='output'>
            <?php
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            }
            else {
                $pageno = 1;
            }

            $sname="";

            $no_of_records_per_page = 3;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $sname = $_SESSION['search'];


           $total_pages_sql = "SELECT COUNT(*) FROM Profile where StpName LIKE '%{$sname}%'";

            $result = mysqli_query($db,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_rows = $total_rows < 1? 1:$total_rows;
            $total_pages = ceil($total_rows/$no_of_records_per_page);

            $sql = "SELECT * FROM Profile where StpName Like '%{$sname}%' LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($res_data)){
                echo '<div class="card">';
                echo '<img src="../../../'.$row['StpImg'].'" alt="StartUp Logo" style="width:100%">';
                      echo '<h1>'.$row['StpName'].'</h1>';
                    echo '<p class="title">'.$row['Type'].'</p>';
                    echo '<p>'.$row['FName'].'</p>';
                    echo '<p>'.$row['SName'].'</p>';
                    $button = "";
                    if($memberstatus == 'NotMember'){
                        $button = "<a href='../../../Profile/index.php?s=".$row['StpID']."' target='_blank'>
                        <button type='submit' name='subinv' class='viewprofile' value='View Profile' action='index.php'>View Profile</button></a>";
                    }
                    echo $button;

                echo '</div>';
            }
            ?>
        </div>
        <?php
            echo '<div class="pages">';
            echo '<ul class="pagination">';
                echo '<li><a href="?pageno=1">First</a></li>';
                echo '<li class=';
                    if($pageno <= 1){ echo 'disabled'; };
                        echo '>';
                    echo '<a href=';
                    if($pageno <= 1){ echo "#"; } else { echo "?pageno=".($pageno - 1); };
                    echo '>Prev</a>';
                echo '</li>';
                echo '<li class=';
                    if($pageno >= $total_pages){ echo 'disabled'; };
                    echo '>';
                    echo '<a href=';
                    if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); };
                    echo '>Next</a>';
                echo '</li>';
                echo "<li><a href='?pageno=$total_pages'>Last</a></li>";
            echo '</ul>';
        echo '</div>';
        ?>
        <?php require "../../../include/footer/footersmall.php"?>
    </div>


</body>
</html>
