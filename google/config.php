<?php
//session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '857448014682-3osdfhnian8d2134fldp93j94qh1vt88.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'qoaHYyhBxwcl1bkuIlWA66N4'; //Google CLIENT SECRET
$redirectUrl = 'http://www.onlineclothestrial.com/';  //return url (url to script)
$homeUrl = 'http://www.onlineclothestrial.com/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to onlineclothestrail.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>