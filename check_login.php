<?php
session_start();
ob_start();

include 'includes/connection.php';
$timezone_identifier = 'Asia/Calcutta';
if(function_exists('date_default_timezone_set')){ date_default_timezone_set($timezone_identifier);}
$now = date('Y-m-d');

if(isset($_REQUEST["action"]))
{
$action = $_REQUEST["action"];
switch($action){
	case "fblogin":
	include 'facebook.php';
	$appid      = "291152291034379";
	$appsecret  = "b57557c9adfcee8eb0ec27b4fe3b40aa";
	$facebook   = new Facebook(array(
  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));
	$fbuser = $facebook->getUser();
//    print_r($fbuser) ;exit;
	if ($fbuser) {
		try {
		    $user_profile = $facebook->api('/me');
		}
		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		$user_fbid	= $fbuser;
		echo $user_email = $user_profile["email"];
		echo $user_fnmae = $user_profile["first_name"];
        echo $user_lnmae = $user_profile["last_name"];
        $act_key = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
        $active_user = 'Y';
		echo $user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
        echo $resultuser = mysql_query("SELECT * FROM user_details WHERE email = '$user_email'");
        $row = mysql_fetch_array($resultuser);
        $checkUser = $row['email'];
        echo $check_select = count($checkUser);
		echo "INSERT INTO user_details (fb_id, first_name,last_name,username,email,act_key,active_user)
              VALUES ('$user_fbid','$user_fnmae','$user_lnmae','$user_fnmae','$user_email','$act_key','$active_user')";
		
		if($check_select > 0){
            $resultUser = mysql_query("SELECT * FROM user_details WHERE email = '$user_email'");
            $feresultuser =  mysql_fetch_array($resultUser);
            $_SESSION['User_id']=$feresultuser['User_id'];
            $_SESSION['username']=$feresultuser['first_name'];
            $_SESSION['email']=$feresultuser['email'];
			//echo "Login success";
			/* print_r($_SESSION);
			exit(); */
			header("location:index.php");
			
		}else{
			$qrynewuser = mysql_query("INSERT INTO user_details (fb_id, first_name,last_name,username,email,act_key,active_user)
              VALUES ('$user_fbid','$user_fnmae','$user_lnmae','$user_fnmae','$user_email','$act_key','$active_user')");
			$insertid = mysql_insert_id();
			$resultusernew = mysql_query("SELECT * FROM `user_details` WHERE User_id = '$insertid'");
			$feresultuser =  mysql_fetch_array($resultusernew);
			$_SESSION['User_id']=$feresultuser['User_id'];
			$_SESSION['username']=$feresultuser['first_name'];
			$_SESSION['email']=$feresultuser['email'];
			//echo "Login success";
			/* print_r($_SESSION);
			exit(); */
			header("location:index.php");
                       
                }
                
    
	}
    else{
        $loginUrl = $facebook->getLoginUrl(array (
            'display' => 'popup',
            'redirect_uri' => 'http://onlineclothestrial.com/'
        ));
        echo '<a href = "'.$loginUrl.'">Login Here </a> ';
    }
	break;
}
}
else
{
    setcookie("error1","The Email & Password combination doesn't match.Please try again.",time()+3);
    header("location:".$_SERVER['HTTP_REFERER']);
}