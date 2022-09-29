<?php

$temp = $_POST["Temperature"];
$press = $_POST["Pressure"];
$flowrate = $_POST["Flow_Rate"];
$injVolume = $_POST["Inject_Volume"];
$detect = $_POST["Detector"];


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

$sql = "INSERT INTO conditions (Temperature, Pressure, Flow_Rate, Inj_Volume, Detector)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "dddds", $temp, $press, $flowrate, $injVolume, $detect);

mysqli_stmt_execute($stmt);

echo "Record has been saved";