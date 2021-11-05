<?php 
//This is the easiest way to connect to the //database But not the Best Way 
//$connection = //mysqli_connect('localhost','root','','cms');
//if($connection) {echo "We are connected";} 
//The Best way to connect to the database is //below

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";
foreach($db as $key => $value) {
define(strtoupper($key), $value);
}$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//if($connection) {echo "We are connect";} 
?>