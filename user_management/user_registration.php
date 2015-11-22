<?php
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
    <link href="../css/popup.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popup.js"></script>
    <script type="text/javascript" src="../js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="../js/prettify.js"></script>
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
    <script src="../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link href="../css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
</head>



<div class="container">
    <div class="main_container">
        <div class="header_title"><img src="../images/site_logo.png" height="80px" width="197px" style="float:left;padding:5px 0px 5px 15px" >
            <div style="padding: 24px 0px;margin-right: 10%;font-size: 35px;letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">ONLINE DRESSING ROOM</div>
            <a href='../index.php?oauth_provider=twitter'style='float: right;margin-right: 5px;text-decoration: none;padding-right: 5px;font-size: 20px;font-weight: bold;    margin-top: -54px;color: #fff;'>Go to Dress App Room</a>
            <div class="clear"></div>
        </div>
        <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>

        <style type="text/css" >
            .errorMsg{border:1px solid red; }
            .message{color: red; font-weight:bold; }
        </style>

        <div class="details_header">
            <div class="inside_logos" style="margin-left:400px;margin-left:400px;padding:10px">
                <div style="margin-top:10px;margin-left:130px;font-size:24px;font-weight: bold;font-family: Courgette">User Registration</div>
            </div>
        </div>
        <div id="register_form" class="main_form" style="float:left;margin-left: 30%;padding: 20px;background: black;border-radius: 3px;-webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);-moz-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);">
            <div align="center" style="font-size: 18px;color:white;font-weight:bold;font-size:20px;padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid grey">Create An Account</div>
            <form action="user_management.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="form_name" value="user_registration">

                <span class='userlabels'>First Name :</span>
                <input type="text" name="first_name" value="" id="first_name" placeholder="First Name" maxlength="100" required="" pattern="/^([a-Z])$/"  /><br>
                <span class='userlabels'>Last Name :</span>
                <input type="text" name="last_name" value="" id="last_name" placeholder="Last Name" maxlength="100" required="" pattern="/^([a-Z])$/"  /><br>
                <span class='userlabels'>User Name :</span>
                <input type="text" name="username" value="" id="username" placeholder="Username" maxlength="100" required="" pattern="^[a-zA-Z0-9_]*$"  /><br>
                <span class='userlabels'>Date Of Birth :</span>
                <input type='text' id='datepicker' name='birth_date'><br>
                <span class='userlabels'>Country :</span>
                <select name='user_country' style="width: 56%;">
                    <option value='none' selected="selected"> - Select One - </option>
                    <?php
                        $result = mysql_query("select * from countries");
                        while($row = mysql_fetch_array($result))
                        {
                            $name = $row['name'];
                    ?>
                            <option value = <?php echo $name; ?> ><?php echo $name; ?></option>
                    <?php
                        }
                    ?>
                </select><br>
                <span class='userlabels'>Body Type :</span>
                <select name='model_body_type' style="width: 56%;">
                    <option value='none' selected="selected"> - Select One - </option>
                    <?php
                    $result = mysql_query("select * from body_types");
                    while($row = mysql_fetch_array($result))
                    {
                        $name = $row['body_types_name'];
                        $value = $row['body_types_id'];
                        ?>
                        <option value = <?php echo $value; ?> ><?php echo $name; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <span class='userlabels'>Email :</span>
                <input type="text" name="email" value="" id="email" placeholder="Email Address" required="" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,40}" maxlength="40"  /><br>
                <span class='userlabels'>Password :</span>
                <input type="password" name="password" value="" id="password" placeholder="Password" maxlength="32" /><br>
                <span class='userlabels'>Re-Password :</span>
                <input type="password" name="confirm_password" value="" id="confirm_password" placeholder="Password Confirm" maxlength="32"  /><br>
                <div style='margin-left:110px;font-size:14px;width:275px;color: white;margin-bottom:15px'>
                    By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.
                </div>
                <div style='margin-left:110px'>
                    <input type="submit" name="submit" value="Sign Up"/>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2013',
            dateFormat: 'dd MM yy'
        });
    });
</script>

<!-- Footer -->
<?php
include "../includes/footer.php";
?>
<!-- End #footer -->
