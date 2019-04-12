<?php

if (!isset($_SESSION)) {
    session_start();
}

$server = "localhost";
$username = "root";
$password = "";
$datbase = "master_php_mysql_blog";

$db = mysqli_connect($server,$username,$password,$datbase);

mysqli_query($db, "SET NAMES 'utf8");

