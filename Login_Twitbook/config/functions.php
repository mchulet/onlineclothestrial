<?php

require 'dbconfig.php';

class User {

    function checkUser($uid, $oauth_provider, $username) 
	{
        $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());
        $result = mysql_fetch_array($query);
        if (!empty($result)) {
            # User is already present
        } else {
            #user not present. Insert a new Record
            echo "INSERT INTO `user_details` (oauth_provider, oauth_uid, username) VALUES ('$oauth_provider', '$uid', '$username')"; exit;
            $query = mysql_query("INSERT INTO `user_details` (oauth_provider, oauth_uid, username) VALUES ('$oauth_provider', '$uid', '$username')") or die(mysql_error());
            $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
            $result = mysql_fetch_array($query);
            return $result;
        }
        return $result;
    }

    

}

?>
