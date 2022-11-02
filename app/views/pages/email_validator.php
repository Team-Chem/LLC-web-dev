<?php

$conn = require __DIR__ . "/../../../db/connection.php";

$sql = sprintf("SELECT * FROM user WHERE email = '%s'", $conn->real_escape_string($_GET['email']));

$result = $conn->query($sql);

$available_email = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $available_email]);

?>