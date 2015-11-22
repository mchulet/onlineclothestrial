<?php
    session_start();
    include "includes/header.php";
    include "includes/connection.php";
    include_once "google/config.php";
    include_once "includes/functions.php";
//    require_once 'fb/config.php';

if(isset($_SESSION)){
//print_r($_SESSION);
//    echo $_SESSION['google_data']['given_name'];exit;
}
if(isset($_SESSION['username'])) {
    $query = mysql_query("select * from user_details where username = '" . $_SESSION['username'] . "' ");
    $row = mysql_fetch_array($query);
    $user_id = $row['User_id'];
}

if(isset($_SESSION['google_data']['given_name'])) {
    $query = mysql_query("select * from user_details where username = '" . $_SESSION['google_data']['given_name'] . "' ");
    $row = mysql_fetch_array($query);
    $user_id = $row['User_id'];
}

$auth_provider = $_GET['oauth_provider'];
//echo $auth_provider;
if($auth_provider == 'twitter')
{
//    echo 'yes';
}
else{
// For google api login
    if(isset($_REQUEST['code'])){
        $gClient->authenticate();
        $_SESSION['access_token'] = $gClient->getAccessToken();
//    header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['access_token'])) {
        $gClient->setAccessToken($_SESSION['access_token']);
    }

    if ($gClient->getAccessToken()) {
        $userProfile = $google_oauthV2->userinfo->get();
        //DB Insert
        $gUser = new Users();

        $gUser->checkGoogleUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['name'],$userProfile['family_name'],$userProfile['email'],$userProfile['locale'],$userProfile['picture']);
        $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
//    $userProfile['given_name'] = $_SESSION['username'];
//    echo $userProfile['given_name']; exit;
//    header("location: index.php");
        $_SESSION['access_token'] = $gClient->getAccessToken();
    } else {
        $authUrl = $gClient->createAuthUrl();
    }
}

// For facebook sharing
function getUrl() {
    $url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
    $url .= '://' . $_SERVER['SERVER_NAME'];
    $url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];
    return $url;
}


?>
<body>

<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="js/jquery.ui.dialog.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="jquery.plugin.html2canvas.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '291152291034379', // replace your app id here
            channelUrl : 'http://onlineclothestrial.com/index.php',
            status     : true,
            cookie     : true,
            xfbml      : true
        });
    };
    (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

    function FBLogin(){
        //alert("hi");
        FB.login(function(response){
            if(response.authResponse){
                window.location.href = "check_login.php?action=fblogin";
            }
        }, {scope: 'email,user_likes'});
    }
</script>

<div class="container">
    <div class="main_container">
        <div class="header_title"><img src="images/site_logo.png" height="80px" width="197px" style="float:left;padding:5px 0px 5px 15px" >
            <div style="padding: 24px 0px;margin-right: 10%;font-size: 35px;letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">
                ONLINE DRESSING ROOM
            </div>

            <div>
                <?php
                if(isset($_SESSION['username']) || isset($_SESSION['google_data']['given_name']))
                {
                ?>
                    <div id="post_login">
                        <a href="user_management/user_profile.php"style="float: right;margin-top: -80px;margin-right: 170px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;">
                            Profile
                        </a>
                        <a href="user_management/user_logout.php"style="float: right;margin-top: -80px;margin-right: 110px;color: white;text-decoration: none;font-size: 15px;border-left: 2px solid white;padding-left: 5px;">Logout</a>
                        <a href="contactus_management/contact_us.php"style="float: right;margin-top: -80px;margin-right: 20px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;border-left: 2px solid white;padding-left: 5px;">Contact Us</a>
                    </div>
                    <?php
                    if(isset($_SESSION['username'])) {
                        $query = mysql_query("select * from user_details where username = '" . $_SESSION['username'] . "' ");
                        $row = mysql_fetch_array($query);
                    }
                    if(isset($_SESSION['google_data']['given_name'])) {
                        $query = mysql_query("select * from user_details where username = '" . $_SESSION['google_data']['given_name'] . "' ");
                        $row = mysql_fetch_array($query);
                    }
                    $login_body = $row['body_type'];
                    $bodyTypeQuery = mysql_query("select * from body_types where body_types_id = '".$login_body."'");
                    $bodyTypeRow = mysql_fetch_array($bodyTypeQuery);
                    $bodyTypeName = $bodyTypeRow['body_types_name'];

                    echo "<div id='user_login_body_type' style='font-size: 17px; margin-right: 80%;'>Type of body:  ". $bodyTypeName."</div>";
                    if(isset($_SESSION['username'])) {
                        echo "<div align='right' style='font-size: 20px; margin-right: 2%;'>Welcome ". $row['username']."</div>";
                    }
                    if(isset($_SESSION['google_data']['given_name'])) {
                        echo "<div align='right' style='font-size: 20px; margin-right: 2%;'>Welcome ". $_SESSION['google_data']['given_name']."</div>";
                    }

                }
                else
                {
                ?>
                    <div id="pre_login">
                        <a href="user_management/user_login.php" style="float: right;margin-top: -60px;margin-right: 170px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;">Login</a>
                        <a href="user_management/user_registration.php"style="float: right;margin-top: -60px;margin-right: 110px;color: white;text-decoration: none;font-size: 15px;border-left: 2px solid white;padding-left: 5px;">Register</a>
                        <a href="contactus_management/contact_us.php"style="float: right;margin-top: -60px;margin-right: 20px;color: white;text-decoration: none;font-size: 15px;padding-right: 5px;border-left: 2px solid white;padding-left: 5px;">Contact Us</a>
                        <?php
                        if (!isset($_SESSION["username"]) || !isset($_SESSION['google_data']['given_name']))
                        {
                        ?>
                            <span style="margin-left: 60%;font-size: 15px;">Login with</span>
                            <a href="javascript:FBLogin();"><img src="images/fbicon.png" style="margin-top: -4%;" ></a>
                            <a href="twitter/login_twitter.php"><img src="images/twitericon.png" style="margin-top: -4%;" ></a>
                            <?php
                            if(isset($authUrl))
                            {
                            ?>
                                <a href=<?php echo $authUrl?>><img src="images/google__round_logo.png" height="25px" style="margin-top: -4%;" ></a>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </div>

                <?php
                }
                ?>



                <div align='right' id='user_login_body_type' style='font-size: 20px;display:none;'>default</div>
            </div>

            <div style='clear:both'></div>
        </div>

        <div class="space"></div>

        <div class="model_area">
            <div class="selected_model" id="selected_models">
                <?php
                $i=1;
                $modelResult = mysql_query("select * from model");
                while($modelRow = mysql_fetch_array($modelResult))
                {
                    $modelName = $modelRow['model_name'];
                    $modelID = $modelRow['model_id'];
                    $modelImgPath = $modelRow['model_img_path'];
                    $modelBodyTypeName = $modelRow['model_body_type_name'];

                    echo "<div id='modeldisplayid_".$i."' class='modeldisplayid'>";
                    echo "<div class='mode_body_type_heading' style='letter-spacing:1px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>".$modelBodyTypeName."</div>";
                    echo "<div class='clear_all' style='float:right;margin:10px;font-weight:bold;cursor:pointer'>Clear All</div>";
                    echo "<div class='dropable_area'  id='droppable' style='background-image:url(images/models/".$modelImgPath.");height:574px;width:210px;margin-left: 25%;' ></div><div class='clear'></div>";
                    echo "<div class='mode_body_type_name' style='letter-spacing:2px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>".$modelName."</div>";
                    echo "</div>";
                    $i++;
                }
                if(isset($_SESSION['username'])) {
                    $userResult = mysql_query("select * from user_details where username = '" . $_SESSION['username'] . "' ");
                    while ($userRow = mysql_fetch_array($userResult)) {
                        $bodyType = $userRow['body_type'];
                        $userImage = $userRow['user_image'];
                        $firstName = $userRow['first_name'];
                        echo "<div id='modeldisplayid_" . $i . "' class='modeldisplayid'>";
                        echo "<div class='mode_body_type_heading' style='letter-spacing:1px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>" . $bodyType . "</div>";
                        echo "<div class='clear_all' style='float:right;margin:10px;font-weight:bold;cursor:pointer'>Clear All</div>";
                        echo "<div class='dropable_area'  id='droppable' style='background-image:url(images/models/" . $userImage . ");height:574px;width:210px;margin-left: 25%;' ></div><div class='clear'></div>";
                        echo "<div class='mode_body_type_name' style='letter-spacing:2px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>" . $firstName . "</div>";
                        echo "</div>";
                        $i++;
                    }
                }

                if(isset($_SESSION['google_data']['given_name'])) {
                    $userResult = mysql_query("select * from user_details where username = '" . $_SESSION['google_data']['given_name'] . "' ");
                    while ($userRow = mysql_fetch_array($userResult)) {
                        $bodyType = $userRow['body_type'];
                        $userImage = $userRow['user_image'];
                        $firstName = $userRow['first_name'];
                        echo "<div id='modeldisplayid_" . $i . "' class='modeldisplayid'>";
                        echo "<div class='mode_body_type_heading' style='letter-spacing:1px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>" . $bodyType . "</div>";
                        echo "<div class='clear_all' style='float:right;margin:10px;font-weight:bold;cursor:pointer'>Clear All</div>";
                        echo "<div class='dropable_area'  id='droppable' style='background-image:url(images/models/" . $userImage . ");height:574px;width:210px;margin-left: 25%;' ></div><div class='clear'></div>";
                        echo "<div class='mode_body_type_name' style='letter-spacing:2px;font-family: \"Antic Slab\", Arial, Helvetica, sans-serif !important;'>" . $firstName . "</div>";
                        echo "</div>";
                        $i++;
                    }
                }
                ?>
            </div>
        </div>


        <div class="center_area">
            <div class="items_area" ></div>
            <div id="pre_upload" style="margin-left: 155px;">
                <a href="#" class="topopup"><img title="preview" src="images/preview.png"/></a>
                <br>
                <br>
                <a href="#" class="topopup"><img title="upload" src="images/upload.png"/></a>

            </div>
        </div>
        <div class="categories_area">
            <div class="categories_area_heading" style="letter-spacing:2px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">
                CLOTHING CATEGORY MENU
            </div>
            <div class="cat_menu" style="letter-spacing:1px;font-family: 'Antic Slab', Arial, Helvetica, sans-serif !important;">
                <ul class='category_menus'>
                <?php
                    $categoryResult = mysql_query("select category_id, category_name, category_logo, category_details from main_category");
                    while($categoryRow = mysql_fetch_array($categoryResult))
                    {
                        $logo = $categoryRow['category_logo'];
                        $catName = $categoryRow['category_name'];
                        $catId = $categoryRow['category_id'];
                        echo "<li style='padding:3px'>
                                <div style='float:left;margin-bottom: -2px'><img src='images/category_logos/thumbs/".$logo."' height='30px' width='30px'></div>
                                <div class='cat_name' style='float:left;margin-left:10px;padding-top:0px;font-size:14px;padding-top:5px;cursor:pointer' >".$catName."</div>
                                <div id='".$catId."' class='plus' style='float:right;margin-right:15px;padding-top:5px;cursor:pointer'> <img src='images/downarrow.png' height='10px' width='10px' >
                                </div><div style='clear:both'></div>";

                        $subCategoryResult = 'SELECT sub_category_id, sub_category_name, sub_category_logo FROM sub_category
                                              WHERE category_id="'.$catId.'" order by  sub_category_name asc ';
                        $rowsubCategoryResult = mysql_query($subCategoryResult);

                        echo "<ul class='showing_sub_menus sub".$catId."'>";
                        while($row = mysql_fetch_array($rowsubCategoryResult))
                        {
                            echo "<li>
                                    <div style='float:left;margin-bottom: -2px'>
                                        <img src='images/sub_category_logos/thumbs/".$row['sub_category_logo']."' height='20px' width='20px'>
                                    </div>
                                    <span id='".$row['sub_category_id']."' style='cursor:pointer' class='sub_cat_name'>".$row['sub_category_name'].
                                "</li>";
                        }
                        echo "</ul>";
                    echo "</li>";
                    }
                echo "</ul>";
                ?>
                </ul>
            </div>

            <div class="small_model_area">
                <div id='ca-container' class='ca-container'>
                    <div class="ca-nav"><span class="ca-nav-prev">Previous</span><span class="ca-nav-next">Next</span></div>
                    <div class='ca-wrapper' style="overflow: hidden;">
                        <?php
                            if(isset($_SESSION['username'])) {
                                $userResult = mysql_query("select * from user_details where username = '" . $_SESSION['username'] . "' ");
                                while ($userRow = mysql_fetch_array($userResult)) {
                                    $bodyType = $userRow['body_type'];
                                    $userImage = $userRow['user_image'];
                                    $firstName = $userRow['first_name'];

                                    $bodyTypeQuery = mysql_query("select * from body_types where body_types_id = '".$bodyType."'");
                                    $bodyTypeRow = mysql_fetch_array($bodyTypeQuery);
                                    $bodyTypeName = $bodyTypeRow['body_types_name'];

                                    echo "<div class='ca-item ca-item-1'>";
                                    echo "<div style='font-weight: bold;text-transform: uppercase;font-size: 12px;'>";
                                    echo $firstName;
                                    echo "</div>";
                                    echo "<div class='ca-item-main'>";
                                    echo "<div class='thumb_model_name1' id='thumb_".$bodyType."' style='cursor:pointer' >
                                            <img id='".$userImage."' title='".$bodyTypeName."' src='images/models/small/".$userImage."'/>
                                        </div>";
                                    echo "</div>";
                                    echo "</div>";

                                }
                                $modelResult = mysql_query("select * from model");
                                while($modelRow = mysql_fetch_array($modelResult))
                                {
                                    $modelName = $modelRow['model_name'];
                                    $modelID = $modelRow['model_id'];
                                    $modelImgPath = $modelRow['model_img_path'];
                                    $modelBodyTypeName = $modelRow['model_body_type_name'];
                                    echo "<div class='ca-item ca-item-1'>";
                                    echo "<div style='font-weight: bold;text-transform: uppercase;font-size: 12px;'>";
                                    echo $modelName;
                                    echo "</div>";
                                    echo "<div class='ca-item-main'>";
                                    echo "<div class='thumb_model_name' id='thumb_".$modelID."' style='cursor:pointer' >
                                            <img id='".$modelImgPath."' title='".$modelBodyTypeName."' src='images/models/small/".$modelImgPath."'/>
                                        </div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            elseif(isset($_SESSION['google_data']['given_name'])) {
                                $userResult = mysql_query("select * from user_details where username = '" . $_SESSION['google_data']['given_name'] . "' ");
                                while ($userRow = mysql_fetch_array($userResult)) {
                                    $bodyType = $userRow['body_type'];
                                    $userImage = $userRow['user_image'];
                                    $firstName = $userRow['first_name'];

                                    $bodyTypeQuery = mysql_query("select * from body_types where body_types_id = '".$bodyType."'");
                                    $bodyTypeRow = mysql_fetch_array($bodyTypeQuery);
                                    $bodyTypeName = $bodyTypeRow['body_types_name'];

                                    echo "<div class='ca-item ca-item-1'>";
                                    echo "<div style='font-weight: bold;text-transform: uppercase;font-size: 12px;'>";
                                    echo $firstName;
                                    echo "</div>";
                                    echo "<div class='ca-item-main'>";
                                    echo "<div class='thumb_model_name1' id='thumb_".$bodyType."' style='cursor:pointer' >
                                            <img id='".$userImage."' title='".$bodyTypeName."' src='images/models/small/".$userImage."'/>
                                        </div>";
                                    echo "</div>";
                                    echo "</div>";

                                }
                                $modelResult = mysql_query("select * from model");
                                while($modelRow = mysql_fetch_array($modelResult))
                                {
                                    $modelName = $modelRow['model_name'];
                                    $modelID = $modelRow['model_id'];
                                    $modelImgPath = $modelRow['model_img_path'];
                                    $modelBodyTypeName = $modelRow['model_body_type_name'];
                                    echo "<div class='ca-item ca-item-1'>";
                                    echo "<div style='font-weight: bold;text-transform: uppercase;font-size: 12px;'>";
                                    echo $modelName;
                                    echo "</div>";
                                    echo "<div class='ca-item-main'>";
                                    echo "<div class='thumb_model_name' id='thumb_".$modelID."' style='cursor:pointer' >
                                        <img id='".$modelImgPath."' title='".$modelBodyTypeName."' src='images/models/small/".$modelImgPath."'/>
                                    </div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            else
                            {
                                $modelResult = mysql_query("select * from model");
                                while($modelRow = mysql_fetch_array($modelResult))
                                {
                                    $modelName = $modelRow['model_name'];
                                    $modelID = $modelRow['model_id'];
                                    $modelImgPath = $modelRow['model_img_path'];
                                    $modelBodyTypeName = $modelRow['model_body_type_name'];
                                    echo "<div class='ca-item ca-item-1'>";
                                    echo "<div style='font-weight: bold;text-transform: uppercase;font-size: 12px;'>";
                                    echo $modelName;
                                    echo "</div>";
                                    echo "<div class='ca-item-main'>";
                                    echo "<div class='thumb_model_name' id='thumb_".$modelID."' style='cursor:pointer' >
                                        <img id='".$modelImgPath."' title='".$modelBodyTypeName."' src='images/models/small/".$modelImgPath."'/>
                                    </div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="clear"></div>

    </div>
</div>
<!-- POP UP section -->
<div id="toPopup">
    <div class="close"></div>
    <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
    <div id="popup_content">
    <?php
        echo "<p>";
        if(isset($_SESSION['username']))
        {
            echo '<div id="upload_form" style="display:none">';
                echo '<div id="register_form" class="main_form" style="width: 35%;float:right;margin-right: 65px;margin-top: 100px;padding: 20px;background: black;border-radius: 3px;">';
                    echo '<div align="center" style="font-size: 18px;color:white;font-weight:bold;font-size:20px;padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid grey">
                                Upload Your Image';
                        echo '<div align="center" style="font-size: 20px;color:white">
                                Plaese upload model image of dimension 249px x 574px ';
                            ?>
                                <form action="user_management/user_management.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <input type="hidden" name="form_name" value="add_user_model_image">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <hr/>
                                    <div class='input_row' style="margin-top: 25px;">
                                        <div class='labels' style='color:white;margin-left: 30px;width: auto;'>Model Image :</div>
                                        <div class='input_fields' style='float: right;color: white;'>
                                            <input type="file" name="userfile" value="userfile" id="userfile">
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" name="submit" value="Upload Image" style="margin-top: 25px;"/>
                                </form>
                            <?php
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo '<div>';
                echo '<div id="edit_sub_cat_div" style="float:left;width:450px;"></div>';
                echo '<div id="item_vendor_info" style="border:1px solid #ffffff;height:610px;width:500px;float:right;overflow-y:scroll"></div>';
                echo '<div id="download_social">';
                echo '<input type="submit" value="Download" onclick="printDiv();" />';
                echo '</div>';
                echo '<div style="clear:both"></div>';
            echo '</div>';
        }
        elseif(isset($_SESSION['google_data']['given_name']))
        {
            echo '<div id="upload_form" style="display:none">';
            echo '<div id="register_form" class="main_form" style="width: 35%;float:right;margin-right: 65px;margin-top: 100px;padding: 20px;background: black;border-radius: 3px;">';
            echo '<div align="center" style="font-size: 18px;color:white;font-weight:bold;font-size:20px;padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid grey">
                                Upload Your Image';
            echo '<div align="center" style="font-size: 20px;color:white">
                                Plaese upload model image of dimension 249px x 574px ';
            ?>
            <form action="user_management/user_management.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="form_name" value="add_user_model_image">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <hr/>
                <div class='input_row' style="margin-top: 25px;">
                    <div class='labels' style='color:white;margin-left: 30px;width: auto;'>Model Image :</div>
                    <div class='input_fields' style='float: right;color: white;'>
                        <input type="file" name="userfile" value="userfile" id="userfile">
                    </div>
                </div>
                <br>
                <input type="submit" name="submit" value="Upload Image" style="margin-top: 25px;"/>
            </form>
            <?php
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div>';
            echo '<div id="edit_sub_cat_div" style="float:left;width:450px;"></div>';
            echo '<div id="item_vendor_info" style="border:1px solid #ffffff;height:610px;width:500px;float:right;overflow-y:scroll"></div>';
            echo '<div id="download_social">';
            echo '<input type="submit" value="Download" onclick="printDiv();" />';
            echo '</div>';
            echo '<div style="clear:both"></div>';
            echo '</div>';
        }
        else
        {
            echo "<div class='pop_login'>";
                echo "<div align='center'><h3>You are not Logged in please Login</h3></div>";
            echo "</div>";
            echo '<h1 class="center">Online Dressing Room</h1>';
            echo '<div class="login" style="background-color: black;">';
                echo '<h2 style="color:white;text-align: center;">User Login</h2>';
        ?>
                <form action="user_management/user_management.php" method="post" accept-charset="utf-8">
                    <input type="hidden" name="form_name" value="user_login">
                    <hr/>
                    <h3 style='color:white'>Username :<input type="text" name="username" value="" required=""  /></h3>
                    <h3 style='color:white'>Password :<input type="password" name="password" value="" required="" /></h3>
                    <input type="submit" name="submit" value="Login"  />
                    <a href="user_management/user_registration.php" class="form_button" style="text-decoration: none;color:#000000"> Register </a>
                </form>
        <?php
                if(isset($message))
                {
                    echo "<h5><div class='error'>".$message."</div></h5>";
                }
	        echo '</div>';
        }
        echo "</p>";
    ?>
    </div>
</div>
<!--toPopup end-->

<div class="loader"></div>
<div id="backgroundPopup"></div>

<!-- POP UP section end -->



<script type="text/javascript">

//    For showing data onclick on preview button


    $(".topopup").click(function(){

        $('#toPopup').fadeIn('normal');
        $('#backgroundPopup').fadeIn('normal');
//		sub_cat_id=$(this).attr('id')
        //	alert(cat_id)
        button_click= $(this).children().attr('title');

        // alert(button_click)
        if(button_click=='preview')
        {
            $("#edit_sub_cat_div").html("");
            $("#selected_models").clone().appendTo("#edit_sub_cat_div");
            $("#selected_models").children().each(function(e) {
//		        alert($(this).attr('id'))
                if($(this).css('display') == "block")
                {
                    model_id_for_sub_item = $(this).attr("id")
                }
            });
//            alert(model_id_for_sub_item)
            item_count = $("#"+model_id_for_sub_item).children().next().next().find('.full_item_shown').length;

            $("#"+model_id_for_sub_item).children().next().next().find('.full_item_shown').each(function(e) {
            });
            $('#item_vendor_info').show();
            $("#item_vendor_info").html("<h1>Click Link to Buy</h1>");

            $(".model_area #selected_models #"+model_id_for_sub_item+" .full_item_shown").each(function(e) {
//                alert($(this).attr('id'))
                single_id =$(this).attr('id')
                image_path = $(this).children().children().next().attr('src');
                vendor_name = $(this).children().children().next().next().html();
                vendor_link = $(this).children().children().next().next().next().text();
//                alert(image_path);

                var image_part = image_path.split("/");
                var image_path1= image_part[0];
                var image_path2= image_part[1];
                var image_path3= image_part[2];
                var image_path6= image_part[6];

                new_img_thumb_path = "http://www.onlinegamesbuzz.com/dress_appnew/images/products/thumbs/"+image_path6;

                $("#item_vendor_info").append("<div style='margin:10px;padding:10px;border:1px solid #cccccc'>" +
                                                "<div style='float:left;width: 100px;height: 100px;'>" +
                                                    "<img src='"+new_img_thumb_path+"'>" +
                                                "</div>" +
                                                "<div style='float:left;margin-left:40px'>" +
                                                    "<h5>Vendor Name: "+vendor_name+"</a></h5>" +
                                                "</div>" +
                                                "<div style='float:left;margin-left:40px'>" +
                                                    "<h5>Vendor Link: <a href='"+vendor_link+"' target='_blank'>"+vendor_link+"</a></h5>" +
                                                "</div>" +
                                                "<div style='clear:both'></div>" +
//                                                "<div class='fb-share-button' data-href='http://localhost:8080/clothestrail/index.php#item_vendor_info' data-layout='button_count'></div>" +
//                                                "<div id='fb-root'></div>" +
                                                <?php
                                                    $encoded_url = urlencode( getUrl() );
                                                    if ( !empty($encoded_url) ){
                                                ?>
                                                    '<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_url.'#edit_sub_cat_div'; ?>" target="_blank">Share on Facebook </a>' +
                                                <?php
                                                }
                                                ?>
                                            "</div>")
            });

//                    (function(d, s, id) {
//                        var js, fjs = d.getElementsByTagName(s)[0];
//                        if (d.getElementById(id)) return;
//                        js = d.createElement(s); js.id = id;
//                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=291152291034379";
//                        fjs.parentNode.insertBefore(js, fjs);
//                    }(document, 'script', 'facebook-jssdk'));

            $('#edit_sub_cat_div .clear_all').hide();
            $('#upload_form').hide();
            //  alert(item_count)
        }
        else{

            $("#edit_sub_cat_div").html("");
            $("#selected_models").clone().appendTo("#edit_sub_cat_div");
            $('#edit_sub_cat_div .clear_all').hide();
            $('#item_vendor_info').hide();
            $('#download_social').hide();

            $('#upload_form').show();



        }

    });
    // $('#edit_sub_cat_div').empty();

    function printDiv(div)
    {
        html2canvas([document.getElementById('edit_sub_cat_div')], {
            onrendered: function(canvas)
            {
                var img = canvas.toDataURL()
                $.post("save.php", {data: img}, function (file) {
                    window.location.href =  "download.php?path="+ file});
            }
        });
    }

    function show_items_for_first_model()
    {
        user_login_body_type = $("#user_login_body_type").html()
//        alert(user_login_body_type)
        if(user_login_body_type=="default")
        {
            user_login_body_type =1;
        }
        else
        {
            user_login_body_type = null;
        }
        $("#modeldisplayid_"+user_login_body_type).show();
        $.ajax({
            url: "show_items_default_model.php",
            type: 'POST',
            data: "selected_image_id="+user_login_body_type,
            success: function(msg) {
                //					alert(msg)
                $('.items_area').html(msg).fadeIn(100);
            }

        });
    }

    $(document).ready(function (){


        $(".clear_all").live('click',function () {
            $(this).next().html("");
        })

        $(".modeldisplayid").hide();
        $(".plus").hide();

        $('ul.category_menus li ul').has("li").each(function () {

            //	alert($(this).attr('class'))
            plus_class = $(this).attr('class')
//		alert("plus_class"+plus_class)
            var class_name = plus_class.split(" ");
            //	var str1 = ret[0];
            var class_name_part= class_name[1];
//		alert(class_name_part)
            $(this).prev().prev().show();
        })

        //	 alert()
        show_items_for_first_model();
        $(".showing_sub_menus").hide();

        $(".plus").click(function () {
            $(".plus").parent().next().addClass("showing_sub_menus");
            //	$(".plus").text("+");
            cat_id = $(this).attr("id");
            //	alert(cat_id);
//		$(".showing_sub_menus").toggle();
            $(this).parent().next().removeClass("showing_sub_menus");
            $(".sub"+cat_id).toggle();
//		$(this).text("-");

        })
//	$(".showing_sub_menus").hide();


        $(".cat_name").click(function () {

            selected_cat_id = $(this).next().attr('id');
            //	alert(selected_cat_id)
            $('.items_area').html("<img src='images/loading.gif' style='margin-top:200px;margin-left:150px'>");
            $("#selected_models").children().each(function(e) {
                //		alert($(this).attr('id'))
                if($(this).css('display') == "block")
                {
                    model_id_for_sub_item = $(this).attr("id")
                }
            });
//		alert(model_id_for_sub_item)

            var model_number = model_id_for_sub_item.split("_");
            //	var str1 = ret[0];
            var model_item_number= model_number[1];
            //	alert(model_item_number)


//		alert($('.modeldisplayid').attr('style'))
            if(selected_cat_id == "all")
            {
                show_All_items()
            }
            else
            {
                if(selected_cat_id==9 || selected_cat_id==10 )
                {
                    $("#selected_models").attr('disabled', 'disabled');
                    $.ajax({
                        url: "show_results.php",
                        type: 'POST',
                        //		data: "selected_cat_id="+selected_cat_id,
                        data: {"selected_cat_id": selected_cat_id, "model_number": '0'},
                        success: function(msg) {
                            //		alert(msg)
                            $('.items_area').html(msg).fadeIn(100);
                        }

                    });

                }
                else
                {
                    $.ajax({
                        url: "show_results.php",
                        type: 'POST',
                        //		data: "selected_cat_id="+selected_cat_id,
                        data: {"selected_cat_id": selected_cat_id, "model_number": model_item_number},
                        success: function(msg) {
                            //		alert(msg)
                            $('.items_area').html(msg).fadeIn(100);
                        }

                    });
                }

            }
        })

        $(".sub_cat_name").click(function () {

            selected_sub_cat_id = $(this).attr('id');
//            alert(selected_sub_cat_id)
            $('.items_area').html("<img src='images/loading.gif' style='margin-top:200px;margin-left:150px'>");
            $.ajax({
                url: "show_sub_results.php",
                type: 'POST',
                data: "selected_sub_cat_id="+selected_sub_cat_id,
                success: function(msg) {
                    //					alert(msg)
                    $('.items_area').html(msg).fadeIn(100);
                }

            });

        })

        $(".thumb_model_name").click(function () {

            image_name=$(this).children().attr('id')
//            alert(image_name)
            image_path=$(this).prev().text();
            full_image_path = image_path+"images/models/"+image_name;
            $('.items_area').html("<img src='images/loading.gif' style='margin-top:200px;margin-left:150px'>");
//            alert(full_image_path)
            image_attr_id = $(this).attr('id')
//            alert(image_id)
            var ret = image_attr_id.split("_");
            var image_id= ret[1];

            $(".modeldisplayid").hide();
            $("#modeldisplayid_"+image_id).show();

            $.ajax({
                url: "show_items_default_model.php",
                type: 'POST',
                data: "selected_image_id="+image_id,
                success: function(msg) {
                    //					alert(msg)
                    $('.items_area').html(msg).fadeIn(100);
                }
            });
        })


        $(".thumb_model_name1").click(function () {

            image_name=$(this).children().attr('id')
            image_path=$(this).prev().text();
            full_image_path = image_path+"images/models/"+image_name;
            $('.items_area').html("<img src='images/loading.gif' style='margin-top:200px;margin-left:150px'>");
            image_attr_id = $(this).attr('id')

            var ret = image_attr_id.split("_");
            var image_id= ret[1];

            $(".modeldisplayid").hide();
            $("#modeldisplayid_6").show();

            $.ajax({
                url: "show_items_default_model.php",
                type: 'POST',
                data: "selected_image_id="+image_id,
                success: function(msg) {
                    //					alert(msg)
                    $('.items_area').html(msg).fadeIn(100);
                }
            });
        })


    });

</script>

<!---->
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<!--<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript">
    $('#ca-container').contentcarousel();
</script>

<?php
    include "includes/footer.php";
?>