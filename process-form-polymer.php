<?php

$polyid = $_POST["Polymer_Name"];
$critHigh = filter_input(INPUT_POST, "Critical_High", FILTER_VALIDATE_INT);
$critLow = filter_input(INPUT_POST, "Critical_Low", FILTER_VALIDATE_INT);
$mass = filter_input(INPUT_POST, "Mass", FILTER_VALIDATE_INT);
$samp = $_POST["Used_Sample"];


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

$sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low, Molar_Masses, Used_Sample)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "siiis", $polyid, $critHigh, $critLow, $mass, $samp);

mysqli_stmt_execute($stmt);

echo "Record has been saved";