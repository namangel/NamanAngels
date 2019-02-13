<?php
 $username = "root";
 $password = "";
 $host = "localhost:3307";
$connect=mysqli_connect("localhost:3307","root","")or die("cant connect to server");
$select_db=mysqli_select_db($connect,'dummydata') or die("couldnt conect to database");
if(isset($_POST['submit']))
{
    $_SESSION['search'] = mysqli_real_escape_string($connect, $_POST['searchkey']);
    header('location: admin_browsestartup.php?pageno=1');
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type=text/css  href="css/admin_browse.css">
 
</head>
<body>

    <div class="browsesearch">
        <div class="bsearch">
            <form class="searchform" action="admin_browsestartup.php" method="post">
                <input type="text" name="searchkey" placeholder="Enter Keyword">
                <input type="submit" name="submit" value="Search">
            </form>
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
           /* $sname = $_SESSION['search'];*/
            $total_pages_sql = "SELECT COUNT(*) FROM dummy where StpName LIKE '%{$sname}%'";
            $result = mysqli_query($connect,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_rows = $total_rows < 1? 1:$total_rows;
            $total_pages = ceil($total_rows/$no_of_records_per_page);
            $sql = "SELECT * FROM dummy where StpName Like '%{$sname}%' LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($connect,$sql);
            while($row = mysqli_fetch_array($res_data))
            {

                echo '<div class="card">';
                   
                    echo '<h1>'.$row['StpName'].'</h1>';
                   /* echo '<img src='.$row['medium'].' alt="John" style="width:100%">'; */
                    echo '<p>'.$row['FName'].'</p>';
                    echo '<p>'.$row['SName'].'</p>';
                    echo '<p><button class="viewprofile">View Profile</button></p>';
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
 </div>
</body>
</html>