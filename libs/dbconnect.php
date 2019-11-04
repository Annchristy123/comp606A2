<?php

error_reporting(0);


$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$database = 'safetrade';

$db = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $database);
if ($db == false) {
  header("location: sitedown.php");
}
