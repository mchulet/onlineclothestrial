<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mdbrande_admin');
define('DB_PASSWORD', '103q0lQgHw');
define('DB_DATABASE', 'dressapp');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
