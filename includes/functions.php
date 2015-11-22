<?php
//require "../includes/connection.php";
class Users {
	public $tableName = 'user_details';
	
	function __construct(){
		//Database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'mdbrande_admin'; //Define database username
		$dbPassword = '103q0lQgHw'; //Define database password
		$dbName = 'dressapp'; //Define database name

		//Connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
//
//    function checkUser($uid, $oauth_provider, $username)
//    {
//        $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());
//        $result = mysql_fetch_array($query);
//        if (!empty($result)) {
//            # User is already present
//        } else {
//            #user not present. Insert a new Record
//            echo "INSERT INTO `user_details` (oauth_provider, oauth_uid, username) VALUES ('$oauth_provider', '$uid', '$username')"; exit;
//            $query = mysql_query("INSERT INTO `user_details` (oauth_provider, oauth_uid, username) VALUES ('$oauth_provider', '$uid', '$username')") or die(mysql_error());
//            $query = mysql_query("SELECT * FROM `user_details` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
//            $result = mysql_fetch_array($query);
//            return $result;
//        }
//        return $result;
//    }

	function checkUser($oauth_provider,$oauth_uid,$username,$fname,$lname,$locale,$oauth_token,$oauth_secret,$profile_image_url){
        $act_key = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
        $active_user = 'Y';

		$prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET oauth_token = '".$oauth_token."', oauth_secret = '".$oauth_secret."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		}else{
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."',
			oauth_uid = '".$oauth_uid."',username = '".$username."', first_name = '".$fname."', last_name = '".$lname."',
			locale = '".$locale."', oauth_token = '".$oauth_token."',oauth_secret = '".$oauth_secret."', user_image = '".$profile_image_url."',
			act_key = '".$act_key."', active_user = '".$active_user."'") or die(mysqli_error($this->connect));
		}

		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}


    function checkGoogleUser($oauth_provider,$oauth_uid,$username,$fname,$lname,$email,$locale,$profile_image_url){
        $act_key = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
        $active_user = 'Y';
        $prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
        if(mysqli_num_rows($prevQuery) > 0){
            $update = mysqli_query($this->connect,"UPDATE $this->tableName SET act_key = '".$act_key."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
        }else{
            $insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."',
			oauth_uid = '".$oauth_uid."',username = '".$username."', first_name = '".$fname."', last_name = '".$lname."',email = '".$email."',
			locale = '".$locale."',user_image = '".$profile_image_url."',act_key = '".$act_key."', active_user = '".$active_user."'") or die(mysqli_error($this->connect));
        }

        $query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
        $result = mysqli_fetch_array($query);
        return $result;
    }
}
?>