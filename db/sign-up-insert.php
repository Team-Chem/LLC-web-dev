<?php
// session_start();

// Contains the code to establish a connection to the database. This allows the script to access the database and insert the user's data.
    include_once 'connection.php';

// Stores the data from the sign-up form into individual PHP variables. This includes the user's first name, last name, email address, and password.
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Re_Password = $_POST['Re-Password'];

/* insert the data from these variables into the user table in the database. This creates a new record in the table with the user's information, 
   allowing them to log in and access the site.
*/
    $sql = "INSERT INTO user (first_name, last_name, email, password) 
    VALUES ('$FirstName', '$LastName', '$Email', '$Password');";

    mysqli_query($conn, $sql);

    // if ($run_query) {
    //     $_SESSION['flash_text'] = "Succasdasafafasfasfafasfasfasfasfasf";
    //     header("Location: sign_in.php?sign-up-insert=success");
    // } else {
    //     echo "There was a problem";
    // }

// Redirect the user to the sign-in page with a success message in the URL bar.
    // header("Location: sign_in.php?sign-up-insert=success");
