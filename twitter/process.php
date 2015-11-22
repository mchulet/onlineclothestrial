<?php
session_start();
include_once("twitter_config.php");
include_once("inc/twitteroauth.php");
include "../includes/functions.php";
//echo $_REQUEST['oauth_token'];
//print_r($_SESSION);
//exit;
if(isset($_REQUEST['token_secret']) && $_SESSION['token'] == $_REQUEST['oauth_token']) {

	// everything looks good, request access token
	//successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	if($connection->http_code=='200')
	{
        //Insert user into the database
        $user_info = $connection->get('account/verify_credentials');
        $name = explode(" ",$user_info->name);
        $fname = isset($name[0])?$name[0]:'';
        $lname = isset($name[1])?$name[1]:'';
        $db_user = new Users();
        $db_user->checkUser('twitter',$user_info->id,$user_info->screen_name,$fname,$lname,$user_info->lang,$access_token['oauth_token'],$access_token['oauth_token_secret'],$user_info->profile_image_url);

		//redirect user to twitter
		$_SESSION['status'] = 'verified';
		$_SESSION['request_vars'] = $access_token;

		// unset no longer needed request tokens
		unset($_SESSION['token']);
		unset($_SESSION['token_secret']);
		header('Location: ./index.php');
	}else{
		die("error, try again later!");
	}
		
}else{

	if(isset($_GET["denied"]))
	{
		header('Location: ./index.php');
		die();
	}

	//fresh authentication
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

	//received token info from twitter
	$_SESSION['token'] 			= $request_token['oauth_token'];
	$_SESSION['token_secret'] 	= $request_token['oauth_token_secret'];
    // any value other than 200 is failure, so continue only if http code is 200
	if($connection->http_code=='200')
	{
//        echo 'Fresh verified';exit;
		//redirect user to twitter
		$twitter_url = $connection->getAuthorizeURL($request_token['oauth_token']);
		header('Location: ' . $twitter_url);
	}else{
		die("error connecting to twitter! try again later!");
	}
}
?>

