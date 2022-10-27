<?php


$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "polymer";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

// Will show the last connection attempt error and return the connection
if ($conn->connect_errno) {
    die("There was a connection error: " . $conn->connect_error); 
}

return $conn;
