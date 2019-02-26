<?php require('../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: pageerror.php');
    }
    $u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $cname = $row['CName'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="../css/companyprof.css" type="text/css"> -->
        <!-- <script src="js/profform.js"></script> -->
        <title>Demo Request | NAMAN</title>
  		<link rel="icon" href="../../img/favicon.jpg" type="image/jpg" sizes="16x16">
        <style>
            .container{
                margin-top: 50px;
                margin-bottom: 50px;
                margin-right: 250px;
                margin-left: 250px;
                min-height:600px;
            }
            .form_text {
                max-width: 100%;
            }
            textarea,input[type="email"]{
                width: 100%;
                padding: 8px;
                border: 1px solid rgb(133, 166, 194);
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 5px;
                margin-bottom: 10px;
                resize: vertical;

            }
            input[type=submit],input[type=reset] {
                background-color:#0A2B40;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float:left;
                align-content: center;
                margin-left: 30px;
            }
            input[type=submit]:hover {
                opacity: 0.6;
            }
            input[type=reset]:hover {
                opacity: 0.6;
            }
        </style>
    </head>
    <body>
			<?php require 'include/header/inv_db.php'; ?>
			<?php require 'include/nav/nav.php'; ?>
            <div class="container">
                <h3>Schedule a demo</h3>
                <p>Fill out the form and schedule a demo with our team.<p>
                <form method="post" action="mem_email.php">
                    <label>Email:</label>
                        <input type="email" name="demo_from" placeholder="Enter your email.." required>
                    <label>Subject:</label>
                        <textarea name="demo_subject" placeholder="Enter subject.." maxlength="250" required></textarea>
                    <br><label>Query:</label>
                        <textarea rows="10" name="demo_query" id="demo_query" placeholder="Enter your qurey in detail.." required></textarea>
                    <script>
                        function check_words(e) {
                            var BACKSPACE   = 8;
                            var DELETE      = 127;
                            var MAX_WORDS   = 500;
                            var valid_keys  = [BACKSPACE, DELETE];
                            var words       = this.value.split(' ');

                            if (words.length >= 500 && valid_keys.indexOf(e.keyCode) == -1) {
                                e.preventDefault();
                                words.length = 500;
                                this.value = words.join(' ');
                            }
                        }
                        var textarea = document.getElementById('demo_query');
                        textarea.addEventListener('keydown', check_words);
                        textarea.addEventListener('keyup', check_words);
                    </script>
                    <div>
                        <input type="reset" onclick="demooff()" value="Cancel" name="cancel" class="cancel">
                        <input type="submit" value="Send" name="sumsave" class="save">
                    </div>
                </form>
            </div>
            <?php require "../../include/footer/footersmall.php" ?>
    </body>
</html>
