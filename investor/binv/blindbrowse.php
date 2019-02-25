<?php
    require('../../server.php');
    // if(!isset($_SESSION['InvID'])){
    //     header('location: ../pageerror.php');
    // }

    $_SESSION['search'] = "";
    if(isset($_POST['indsubmit'])){
        $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['indsearchkey']);
        header('location: blindbrowse.php?pageno=1');
    }
?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/browse.css">
  <title>Browse Startups | NAMAN</title>
  <link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
</head>
<body>

    <?php require "include/header/binv_browse.php"?>
        <div class="browsesearch">
        <div class="bsearch">
            <form class="searchform" action="blindbrowse.php" method="post">
                <select  name="indsearchkey">
                    <option value="">Select Industry</option>
                    <option value="Advertising">Advertising</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Analytics">Analytics</option>
                    <option value="Android">Android</option>
                    <option value="Apps">Apps</option>
                    <option value="Art">Art</option>
                    <option value="Automotive">Automotive</option>
                    <option value="B2B">B2B</option>
                    <option value="Big Data">Big Data</option>
                    <option value="Big Data Analytics">Big Data Analytics</option>
                    <option value="Brand Marketing">Brand Marketing</option>
                    <option value="Business Development">Business Development</option>
                    <option value="Business Services">Business Services</option>
                    <option value="Clean Energy">Clean Energy</option>
                    <option value="Clean Technology">Clean Technology</option>
                    <option value="Cloud Computing">Cloud Computing</option>
                    <option value="Commercial Real Estate">Commercial Real Estate</option>
                    <option value="Consulting">Consulting</option>
                    <option value="Consumer Electronics">Consumer Electronics</option>
                    <option value="Consumer Goods">Consumer Goods</option>
                    <option value="Consumer Internet">Consumer Internet</option>
                    <option value="Consumers">Consumers</option>
                    <option value="Crowdfunding">Crowdfunding</option>
                    <option value="Design">Design</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Digital Media">Digital Media</option>
                    <option value="E-Commerce">E-Commerce</option>
                    <option value="E-Commerce Platforms">E-Commerce Platforms</option>
                    <option value="Education">Education</option>
                    <option value="Enterprise Software">Enterprise Software</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Events">Events</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Finance">Finance</option>
                    <option value="Fitness">Fitness</option>
                    <option value="Food and Beverages">Food and Beverages</option>
                    <option value="Games">Games</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Health and Wellness">Health and Wellness</option>
                    <option value="Hospitality">Hospitality</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Internet">Internet</option>
                    <option value="iOS">iOS</option>
                    <option value="Location Based Services">Location Based Services</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Marketplaces">Marketplaces</option>
                    <option value="Media">Media</option>
                    <option value="Medical Devices">Medical Devices</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Mobile Advertising">Mobile Advertising</option>
                    <option value="Mobile Application">Mobile Application</option>
                    <option value="Mobile Commerce">Mobile Commerce</option>
                    <option value="Mobile Games">Mobile Games</option>
                    <option value="Mobile Health">Mobile Health</option>
                    <option value="Mobile Payments">Mobile Payments</option>
                    <option value="Music">Music</option>
                    <option value="Nonprofits">Nonprofits</option>
                    <option value="Online Travel">Online Travel</option>
                    <option value="Payments">Payments</option>
                    <option value="Personal Health">Personal Health</option>
                    <option value="Publishing">Publishing</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Recruiting">Recruiting</option>
                    <option value="Restaurants">Restaurants</option>
                    <option value="Retail">Retail</option>
                    <option value="Retail Technology">Retail Technology</option>
                    <option value="SaaS">SaaS</option>
                    <option value="Sales and Marketing">Sales and Marketing</option>
                    <option value="Security">Security</option>
                    <option value="Small and Medium Businesses">Small and Medium Businesses</option>
                    <option value="Social Commerce">Social Commerce</option>
                    <option value="Social Games">Social Games</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Social Media Marketing">Social Media Marketing</option>
                    <option value="Software">Software</option>
                    <option value="Sports">Sports</option>
                    <option value="Technology">Technology</option>
                    <option value="Telecommunications">Telecommunications</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Travel">Travel</option>
                    <option value="User Experience Design">User Experience Design</option>
                    <option value="Venture Capital">Venture Capital</option>
                    <option value="Video">Video</option>
                    <option value="Video Games">Video Games</option>
                    <option value="Web Design">Web Design</option>
                    <option value="Web Development">Web Development</option>

                  </select>
                <input type="submit" name="indsubmit" value="Search">
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

            $sname = $_SESSION['search'];


            $total_pages_sql = "SELECT COUNT(*) FROM st_details where StpID IN (Select StpID from userstp where Type Like '%{$sname}%')";

            $result = mysqli_query($db,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_rows = $total_rows < 1? 1:$total_rows;
            $total_pages = ceil($total_rows/$no_of_records_per_page);

            $sql = "SELECT * FROM BProfile where Verified = 1 AND Type Like '%{$sname}%' LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($res_data)){

                $stid = $row['StpID'];
                $t = $row['Type'];
                $st = $row['Stage'] == "" ? '--' : $row['Stage'];
                $rnd = $row['Round'];
                $sk = $row['Seeking'];
                echo '<div class="card">';
                // echo '<img src="../../'.$row['StpImg'].'" alt="Startup Logo" style="width:100%">';
                // echo '<h1>'.$t.'</h1>';
                    echo '<p class="title">'.$t.'</p>';
                    echo '<p>'.$st.'</p>';
                    echo '<p>'.$rnd.' Round</p>';
                    echo '<p class="title">Seeking: '.$sk.'</p>';
                    echo "<a href='#' target='_blank'>
                    <button type='submit' name='subinv' class='viewprofile' value='Invest' action='index.php'>Invest</button></a>";
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
        <?php require "../../include/footer/footer.php"?>
    </div>


</body>
</html>
