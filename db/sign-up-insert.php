<?php
// session_start();
    include_once 'connection.php';

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Re_Password = $_POST['Re-Password'];

    $sql = "INSERT INTO user (first_name, last_name, email, password) 
    VALUES ('$FirstName', '$LastName', '$Email', '$Password');";

    mysqli_query($conn, $sql);

    // if ($run_query) {
    //     $_SESSION['flash_text'] = "Succasdasafafasfasfafasfasfasfasfasf";
    //     header("Location: sign_in.php?sign-up-insert=success");
    // } else {
    //     echo "There was a problem";
    // }

    // header("Location: sign_in.php?sign-up-insert=success");