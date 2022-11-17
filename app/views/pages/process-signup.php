<?php
include_once "../../../db/connection.php";

// If name="FirstName" is empty then it will print the message and then exit
// if (empty($_POST['FirstName'])) {
//     die("Must enter a first name");
// }

// if (empty($_POST['LastName'])) {
//     die("Must enter a last name");
// }

// if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
//     die("Must enter a valid email");
// }

// if (strlen($_POST['Password']) < 8) {
//     die("Password must be at least 8 characters long");
// }

// if (!preg_match("/[a-z]/i", $_POST['Password'])) {
//     die("Must contain at least one letter");
// }

// if (!preg_match("/[0-9]/i", $_POST['Password'])) {
//     die("Must contain at least one number");
// }

// if ($_POST['Password'] !== $_POST['Re-Password']) {
//     die("Passwords must match each other");
// }

$hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

#$conn = require __DIR__ . "../../../db/db//connection.php";

$sql = "INSERT INTO user (first_name, last_name, email, password_hash) 
        values (?, ?, ?, ?)";

$stmt = $conn->stmt_init();

if (!$stmt->prepare($sql)) {
    die("There was an SQL error: " . $conn->error);
}

$stmt->bind_param("ssss", $_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $hashed_password);

if ($stmt->execute()) {
    header("Location: sign_in.php?sign-up-insert=success");
    exit();
} else {
    if ($conn->errno === 1062) {
        die("This email has already been taken. Choose another email.");
    } else {
        die($conn->error . " " . $conn->errno);
    }
}



#print_r($_POST);
#var_dump($hashed_password);
