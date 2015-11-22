<?php
session_start();
include "../includes/connection.php";
include_once("../includes/analyticstracking.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Online Dressing Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.6" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="js/prettify.js"></script>
    <script type="text/javascript">
        // Detect whether device supports orientationchange event, otherwise fall back to
        // the resize event.
        var supportsOrientationChange = "onorientationchange" in window,
            orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

        window.addEventListener(orientationEvent, function() {
            if(window.orientation==0)
            {
                document.getElementById('portrait').style.display = '';
                document.getElementById('landscape').style.display = 'none';
            }
            else if(window.orientation==90)
            {
                document.getElementById('portrait').style.display = 'none';
                document.getElementById('landscape').style.display = '';
            }
        }, false);
    </script>
</head>
<body>
<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../js/jquery.ui.touch-punch.min.js"></script>

<div class="container">
    <div class="main_container">
        <div class="header_title">
            <img src="../images/site_logo.png" height="80px" width="197px" style="float:left;padding:5px 0px 5px 15px" >
            <div style="padding: 24px 0px;margin-right: 10%;font-size: 35px;letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">
                ONLINE DRESSING ROOM
            </div>
        </div>

        <a href='user_logout.php'style='float: right;margin-right: 20px;text-decoration: none;font-size: 20px;margin-top: 20px;font-weight: bold;'>Logout</a>
        <a href='../index.php?oauth_provider=twitter'style='float: right;margin-right: 5px;text-decoration: none;margin-top: 20px;padding-right: 5px; border-right:4px solid black;font-size: 20px;font-weight: bold;'>Go to Dress App Room</a>

        <div style="padding-left: 400px;"><h2>Welcome to Online Dressing Room App</h2></div>

        <?php
            if(isset($_SESSION['username']) || isset($_SESSION['google_data']['given_name']))
            {
                echo "<table width='798' border='1' align='center' cellpadding='0'>";
                if(isset($_SESSION['username'])) {
                    $query = mysql_query("select * from user_details where username = '" . $_SESSION['username'] . "' ");
                }
                if(isset($_SESSION['google_data']['given_name'])) {
                    $query = mysql_query("select * from user_details where username = '" . $_SESSION['google_data']['given_name'] . "' ");
                }
                while($row = mysql_fetch_array($query))
                {
                    $userID = $row['User_id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $username = $row['username'];
                    $birth_date = $row['dob'];
                    $user_country = $row['country'];
                    $email = $row['email'];
                    $user_image = $row['user_image'];

                    $model_body_type = $row['body_type'];
                    $bodyTypeQuery = mysql_query("select * from body_types where body_types_id = '".$model_body_type."'");
                    $bodyTypeRow = mysql_fetch_array($bodyTypeQuery);
                    $bodyTypeName = $bodyTypeRow['body_types_name'];


                    echo "<tr><td height='26' colspan='2' style='padding-left: 220px;'><h1>Your Profile Information </h1></td></tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>FirstName :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$first_name."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>LastName :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$last_name."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>Date Of Birth :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$birth_date."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>Country :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$user_country."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>Username :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$username."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>Email :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$email."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>Model Body Type :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$bodyTypeName."</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td valign='top'><div align='left'><h2>User Model Image :</h2></div></td>";
                    echo "<td valign='top' style='text-align: center;'><h2>".$user_image."</h2></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }


        echo "<div class='clear'></div>";
        echo "<div style='margin-top: 20px;'>";
        echo "<a id=".$userID." href='edit_user_profile.php' style='cursor:pointer;margin-left: 540px;font-size: 20px;font-weight: bold;'>Edit Profile</a>";
        echo "</div>";
        ?>

    </div>
</div>

    <!-- Footer -->
    <?php
    include "../includes/footer.php";
    ?>
    <!-- End #footer -->
