<?php
session_start();
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "offline-chat-app";
//We log to the DataBase
$con = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die("Could not connect to MYSQL".mysql_error());
$db = mysqli_select_db(mysqli_connect($db_host,$db_username,$db_password,$db_name),$db_name) or die("No such Database!".mysql_error());

// Optional Configuration
$url_home = 'index.php';
?>
