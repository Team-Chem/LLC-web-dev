<?php

$polyName = $_POST["Polymer_Name"];
$critHigh = filter_input(INPUT_POST, "Critical_High", FILTER_VALIDATE_INT);
$critLow = filter_input(INPUT_POST, "Critical_Low", FILTER_VALIDATE_INT);
$mass = filter_input(INPUT_POST, "Mass", FILTER_VALIDATE_INT);
$samp = $_POST["Used_Sample"];
$temp = $_POST["Temperature"];
$press = $_POST["Pressure"];
$flowrate = $_POST["Flow_Rate"];
$injVolume = $_POST["Inject_Volume"];
$detect = $_POST["Detector"];
$doc = $_POST["File_Name"];
$reference = $_POST["References"];
$solv = $_POST["Solvent"];
$nonSolv = $_POST["Nonsolvent"];
$particleDiam = $_POST["Particle_Diameter"];
$poreSize = $_POST["Pore_Size"];
$columnDim = $_POST["Column_Dimension"];


$host = "localhost";
$dbname = "polymer";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $dbname, $username, $password);

if (mysqli_connect_errno()) {
    die("There was a connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low, Molar_Masses, Used_Sample)
        VALUES (?, ?, ?, ?, ?)";

$sql = "INSERT INTO conditions (Temperature, Pressure, Flow_Rate, Inj_Volume, Detector)
VALUES (?, ?, ?, ?, ?)";

$sql = "INSERT INTO document (DocumentCol)
        VALUES (?)";

$sql = "INSERT INTO mobile_phase (Solvent, NonSolvent)
        VALUES (?, ?)";

$sql = "INSERT INTO stationary_phase (Particle_Diameter, Pore_Size, Column_Dimension)
        VALUES (?, ?, ?)";



$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "siiis", $polyName, $critHigh, $critLow, $mass, $samp);
mysqli_stmt_bind_param($stmt, "dddds", $temp, $press, $flowrate, $injVolume, $detect);
mysqli_stmt_bind_param($stmt, "s", $doc);
mysqli_stmt_bind_param($stmt, "s", $reference);
mysqli_stmt_bind_param($stmt, "ss", $solv, $nonSolv);
mysqli_stmt_bind_param($stmt, "ddd", $particleDiam, $poreSize, $columnDim);


mysqli_stmt_execute($stmt);

echo "Record has been saved";