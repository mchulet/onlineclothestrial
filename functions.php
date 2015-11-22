<?php
session_start();
require 'includes/connection.php';

class User {

    function checkUser($uid, $oauth_provider, $username,$fname,$lname,$location,$profile_image_url)
	{
        $act_key = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
        $active_user = 'Y';
        $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());
        $result = mysql_fetch_array($query);
        if (!empty($result)) {
            # User is already present
        } else {
            #user not present. Insert a new Record
//            echo "INSERT INTO `user_details` (oauth_provider, oauth_uid,locale,oauth_token,oauth_secret,first_name,last_name,username,
//              user_image,act_key,active_user) VALUES ('$oauth_provider', '$uid','$location','".$_SESSION['oauth_token']."','".$_SESSION['oauth_token_secret']."',
//               '$fname', '$lname', '$username', '$profile_image_url','$act_key','$active_user')"; exit;
            $query = mysql_query("INSERT INTO `user_details` (oauth_provider, oauth_uid,locale,oauth_token,oauth_secret,first_name,last_name,username,
              user_image,act_key,active_user) VALUES ('$oauth_provider', '$uid','$location','".$_SESSION['oauth_token']."','".$_SESSION['oauth_token_secret']."',
               '$fname', '$lname', '$username', '$profile_image_url','$act_key','$active_user')") or die(mysql_error());

            $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
            $result = mysql_fetch_array($query);
            return $result;
        }
        return $result;
    }

    

}

?>
