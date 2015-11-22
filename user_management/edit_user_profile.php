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
    <link href="../css/popup.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popup.js"></script>
    <script type="text/javascript" src="../js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="../js/prettify.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link href="../css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
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
            }
        }
        ?>
        <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>

        <style type="text/css" >
            .errorMsg{border:1px solid red; }
            .message{color: red; font-weight:bold; }
        </style>

        <div id="update_form" class="main_form" align="center" style="padding: 20px;border-radius: 3px;">
            <div align="center" style="font-size: 18px;color:black;font-weight:bold;font-size:20px;padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid grey">Update Profile</div>
            <form action="user_management.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="form_name" value="edit_user_profile">
                <input type="hidden" name="user_id" value="<?php echo $userID; ?>">

                <label for="female">First Name :</label>
                <input type="text" name="first_name" value="<?php echo $first_name;?>" id="first_name" placeholder="First Name" style="margin-left: 50px;" maxlength="100" required="" pattern="/^([a-Z])$/"  /><br>
                <label for="female">Last Name :</label>
                <input type="text" name="last_name" value="<?php echo $last_name;?>" id="last_name" placeholder="Last Name" maxlength="100" required="" pattern="/^([a-Z])$/" style="margin-left: 50px;" /><br>
                <label for="female">User Name :</label>
                <input type="text" name="username" value="<?php echo $username;?>" id="username" placeholder="Username" maxlength="100" required="" pattern="^[a-zA-Z0-9_]*$" style="margin-left: 50px;" /><br>
                <?php
                if(isset($_SESSION['username']) || isset($_SESSION['google_data']['given_name'])) {
                ?>
                    <label for="female">Date Of Birth :</label>
                    <input type='text' id='datepickers' value="<?php echo $birth_date;?>" name='birth_date' style="margin-left: 35px;"><br>
                <?php
                }else{
                }
                ?>
                <label for="female">Country :</label>
                <select name='user_country' style="width: 260px; margin-left: 65px;">
                    <option value='none' selected="selected"> - Select One - </option>
                    <?php
                    $result = mysql_query("select * from countries");
                    while($row = mysql_fetch_array($result))
                    {
                        $name = $row['name'];
                        ?>
                        <option value = <?php echo $name; ?> <?php if($user_country == $name){ echo 'selected="selected"';} ?> ><?php echo $name; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="female">Body Type :</label>
                <select name='model_body_type' style="width: 260px;margin-left: 50px;">
                    <option value='none'   selected="selected"> - Select One - </option>
                    <?php
                    $result = mysql_query("select * from body_types");
                    while($row = mysql_fetch_array($result))
                    {
                        $name = $row['body_types_name'];
                        $value = $row['body_types_id'];
                        ?>
                        <option value = <?php echo $value; ?> <?php if($bodyTypeName == $name){ echo 'selected="selected"';} ?> ><?php echo $name; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="female">Email :</label>
                <input type="text" name="email" value="<?php echo $email;?>" id="email" placeholder="Email Address" required="" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,20}" maxlength="255" style="margin-left: 80px;" /><br>
                <?php
                    if(isset($_SESSION['username']) || isset($_SESSION['google_data']['given_name'])) {
                ?>
                        <input type="hidden" name="password" value="">
                <?php
                }else{
                    ?>
                    <label for="female">Password :</label>
                    <input type="password" name="password" id="password" placeholder="Password" maxlength="32"
                           style="margin-left: 60px;"/><br><br>
                <?php
                }
                ?>

                <div style='margin-left:110px'>
                    <input type="submit" name="submit" value="Update Profile"/>
                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        $( "#datepickers" ).datepicker({
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
