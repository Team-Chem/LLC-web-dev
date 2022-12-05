
<?php

$conn = require __DIR__ . "/../../../db/connection.php";

/* Selects the email attribute from the database */
$sql = sprintf("SELECT * FROM user WHERE email = '%s'", $conn->real_escape_string($_GET['email']));

$result = $conn->query($sql);

// Stores the $results value into another variable
$available_email = $result->num_rows === 0;

header("Content-Type: application/json");

// Echos back the value to determine if the email is available or not
echo json_encode(["available" => $available_email]);

?>
