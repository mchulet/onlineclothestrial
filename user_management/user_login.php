<?php
    include "../includes/connection.php";
?>
<head>
    <link href=../css/style.css rel="stylesheet" type="text/css" />
</head>
<div class="container">
    <div class="main_container">
        <div class="header_title">
            <img src="../images/site_logo.png" height="80px" width="197px" style="float:left;padding:5px 0px 5px 15px" >
            <div style="padding: 24px 0px;margin-right: 10%;font-size: 35px;letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">ONLINE DRESSING ROOM</div>
            <a href='../index.php'style='float: right;margin-right: 5px;text-decoration: none;padding-right: 5px;font-size: 20px;font-weight: bold;    margin-top: -54px;color: #fff;'>Go to Dress App Room</a>

            <div class="clear"></div>
        </div>

        <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
        <style type="text/css" >
            .errorMsg{border:1px solid red; }
            .message{color: red; font-weight:bold; }
        </style>

        <h1 class="center">User Login Form</h1>

        <div class="login" style='background-color: black'>
            <h2 style='color:white;text-align: center;'>User Login</h2>
            <form action="user_management.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="form_name" value="user_login">
                <hr/>
                <h3 style='color:white'>Username :<input type="text" name="username" value="" required=""  /></h3>
                <h3 style='color:white'>Password :<input type="password" name="password" value="" required="" /></h3>
                <input type="submit" name="submit" value="Login"  />
                <a href="user_registration.php" class="form_button" style="text-decoration: none;color:#000000"> Register </a>

            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>

<!-- Footer -->
<?php
    include "../includes/footer.php";
?>
<!-- End #footer -->
