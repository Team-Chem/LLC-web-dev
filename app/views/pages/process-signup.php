<?php
session_start();
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

// Uses the built in password_hash funtion in Php to take the Password attribute in the database and provide the default hash for it.
$hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

#$conn = require __DIR__ . "../../../db/db//connection.php";

$sql = "INSERT INTO user (first_name, last_name, email, password_hash) 
        values (?, ?, ?, ?)";

$stmt = $conn->stmt_init();

// Check to see if there was an error
if (!$stmt->prepare($sql)) {
    die("There was an SQL error: " . $conn->error);
}

// Binds the paramaters to the variable names from the sign-up-insert.php file.
$stmt->bind_param("ssss", $_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $hashed_password);

// If the sign up is successful, then the user will be redirected back to the login page and a green success box will flash.
if ($stmt->execute()) {
    $_SESSION['flash_text'] = "Account has been successfully created!";
    header("Location: sign_in.php");
    echo "success";
    exit();
// Checks to see if there is an 1062 error. Which means an email already exists and cannot be used again.
} else {
    if ($conn->errno === 1062) {
        die("This email has already been taken. Choose another email.");
    } else {
        die($conn->error . " " . $conn->errno);
    }
}



#print_r($_POST);
#var_dump($hashed_password);
