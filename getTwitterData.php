<?php

require("twitter/inc/twitteroauth.php");
require 'twitter/twitter_config.php';
include_once "functions.php";
session_start();

if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
    // We've got everything we need
    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
// Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
    $_SESSION['access_token'] = $access_token;
// Let's get the user's info
    $user_info = $twitteroauth->get('account/verify_credentials');
// Print user's info
//    echo '<pre>';
//    print_r($user_info);
//    echo '</pre><br/>';
    if (isset($user_info->error)) {
        // Something's wrong, go back to square 1  
        header('Location: twitter/login_twitter.php');
    } else {
//        echo 'here';exit;
        $uid = $user_info->id;
        $username = $user_info->screen_name;
        $name = explode(" ",$user_info->name);
        $fname = isset($name[0])?$name[0]:'';
        $lname = isset($name[1])?$name[1]:'';
        $location = trim($location, ',');
        $location = $user_info->location;
        $profile_image_url = $user_info->profile_image_url;

        $user = new User();
        $userdata = $user->checkUser($uid, 'twitter', $username,$fname,$lname,$location,$profile_image_url);
        if(!empty($userdata)){
            session_start();
            $_SESSION['id'] = $userdata['id'];
            $_SESSION['oauth_id'] = $uid;
            $_SESSION['username'] = $userdata['username'];
            $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
            header("Location: index.php?oauth_provider=twitter");
        }
    }
} else {
    // Something's missing, go back to square 1
    header('Location: twitter/login_twitter.php');
}
?>
