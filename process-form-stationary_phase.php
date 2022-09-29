<?php

$particleDiam = $_POST["Particle_Diameter"];
$poreSize = $_POST["Pore_Size"];
$columnDim = $_POST["Column_Dimension"];


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

$sql = "INSERT INTO stationary_phase (Particle_Diameter, Pore_Size, Column_Dimension)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ddd", $particleDiam, $poreSize, $columnDim);

mysqli_stmt_execute($stmt);

echo "Record has been saved";