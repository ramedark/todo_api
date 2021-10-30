<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dbaselink= mysqli_connect($host,$username,$password,$database) or die 
("couldn't connect to the database");
echo mysqli_error($dbaselink);
set_time_limit(60);