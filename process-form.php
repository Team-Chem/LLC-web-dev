<?php

# Storing the values into the variables. 
$polyid = $_POST["Polymer_Name"];
$critHigh = filter_input(INPUT_POST, "Critical_High", FILTER_VALIDATE_INT);
$critLow = filter_input(INPUT_POST, "Critical_Low", FILTER_VALIDATE_INT);
$mass = filter_input(INPUT_POST, "Mass", FILTER_VALIDATE_INT);
$samp = $_POST["Used_Sample"];

# Specifies the values for the host, database name, username, and password.
$host = "localhost";
$dbname = "polymer";
$username = "root";
$password = "";

# Using the function to connect to mysql
$conn = mysqli_connect(hostname: $host,
               username: $username,
               password: $password,
               database: $dbname);

# If statement to check if there was an error in the process of conencting.               
if (mysqli_connect_errno()) {
    die("There was a connection error: " . mysqli_connect_error());
}

# Inserts the data into the attribute names specified in the table in PhpmyAdmin. The question marks are placeholders to prevent injection.
$sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low, Molar_Masses, Used_Sample)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

# siiis stand for the datatypes used and uses the variables below to bind the parameters to the SQL query.
mysqli_stmt_bind_param($stmt, "siiis", $polyid, $critHigh, $critLow, $mass, $samp);

mysqli_stmt_execute($stmt);

echo "Record has been saved";