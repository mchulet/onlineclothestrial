<?php

$user_name = "mdbrande_admin";
$password = "103q0lQgHw";
$database = "dressapp";
$host_name = "localhost";

$connect_db=mysql_connect($host_name, $user_name, $password);

$find_db=mysql_select_db($database);

if ($find_db) {
//    echo "Database exist";
}
else {
    echo "Database does not exist";
}

?>