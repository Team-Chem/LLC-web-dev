<?php

$reference = $_POST["References"];


$host = "localhost";
$dbname = "polymer";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
               username: $username,
               password: $password,
               database: $dbname);

if (mysqli_connect_errno()) {
    die("There was a connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO investigations (Reference)
        VALUES (?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $reference);

mysqli_stmt_execute($stmt);

echo "Record has been saved";