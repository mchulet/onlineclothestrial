<?php
    session_start();
    include "../includes/connection.php";
    include_once "../includes/analyticstracking.php";
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

<body><div class="container">
    <div class="row">
        <div class="main_container">
            <div class="header_title">
                <img src="../images/site_logo.png" height="80px" width="197px" style="float:left;padding:5px 0px 5px 15px" >
                <div style="padding: 24px 0px;margin-right: 10%;font-size: 35px;letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">
                    ONLINE DRESSING ROOM
                </div>
                <a href='../index.php?oauth_provider=twitter'style='float: right;margin-right: 10px;text-decoration: none;padding-right: 5px;font-size: 20px;font-weight: bold;margin-top: -75px;color: #fff;'>Go to Dress App Room</a>

                <div class="clear"></div>
                <?php
                if(isset($_SESSION['username']))
                {
                    $query = mysql_query("select * from user_details where username = '".$_SESSION['username']."' ");
                    $row = mysql_fetch_array($query);
                    $login_body = $row['body_type'];
                    $bodyTypeQuery = mysql_query("select * from body_types where body_types_id = '".$login_body."'");
                    $bodyTypeRow = mysql_fetch_array($bodyTypeQuery);
                    $bodyTypeName = $bodyTypeRow['body_types_name'];
                    ?>
                    <div id='user_login_body_type' style='font-size: 17px; margin-right: 80%;'>Type of
                        body:  <?php echo ". $bodyTypeName."?></div>
                    <div align='right' style='font-size: 20px; margin-right: 2%;'>
                        Welcome  <?php echo $_SESSION['username'];?></div>
                <?php
                }
                ?>

            </div>
            <?php
            if(isset($_SESSION['username']))
            {
            ?>
                <div id="post_login">
                    <a href="../user_management/user_profile.php"style="float: right;margin-top: -80px;margin-right: 170px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;">
                        Profile
                    </a>
                    <a href="../user_management/user_logout.php"style="float: right;margin-top: -80px;margin-right: 110px;color: white;text-decoration: none;font-size: 15px;border-left: 2px solid white;padding-left: 5px;">Logout</a>
                    <a href="contact_us.php"style="float: right;margin-top: -80px;margin-right: 20px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;border-left: 2px solid white;padding-left: 5px;">Contact Us</a>
                </div>
            <?php
            }
            else
            {
                ?>
                <div id="pre_login">
                    <a href="../user_management/user_login.php" style="float: right;margin-top: -45px;margin-right: 170px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;">Login</a>
                    <a href="../user_management/user_registration.php"style="float: right;margin-top: -45px;margin-right: 110px;color: white;text-decoration: none;font-size: 15px;border-left: 2px solid white;padding-left: 5px;">Register</a>
                    <a href="contact_us.php"style="float: right;margin-top: -45px;margin-right: 20px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;border-left: 2px solid white;padding-left: 5px;">Contact Us</a>

                </div>

            <?php
            }
            ?>

            <div align='right' id='user_login_body_type' style='font-size: 20px;display:none;'>default</div>


            <div class="col-md-6 col-md-offset-3 well" style=" margin-top: 20px;">
                <form action="contactus_management.php" method="post" accept-charset="utf-8" class="form-horizontal" name="contactform">
                    <input type="hidden" name="form_name" value="contactform"><fieldset>
                        <legend style="text-align: center;font-size: 20px;font-weight: bold;">CONTACT US</legend>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name" class="control-label">Name</label><b class="txtRed">*</b>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="name" required="" placeholder="Your Name" type="text" value="" />
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email" class="control-label">Email</label><b class="txtRed">*</b>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="email" required="" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,40}" placeholder="Your Email ID" type="text" value="" />
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="subject" class="control-label">Subject</label><b class="txtRed">*</b>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="subject" required="" placeholder="Your Subject" type="text" value="" />
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="message" class="control-label">Message</label><b class="txtRed">*</b>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" required="" style="margin-left: 10px;" rows="4" placeholder="Your Message"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php
include "../includes/footer.php";
?>
<!-- End #footer -->