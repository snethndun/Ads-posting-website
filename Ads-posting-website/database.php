<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "ads";

//connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn) {
    die("Database connection failed!");
}

?>