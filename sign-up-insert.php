<?php
    include_once 'includes/Connection.php';

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Re_Password = $_POST['Re-Password'];

    $sql = "INSERT INTO user (Fname, Lname, Email, Pass_word, Re_enter_pass) 
    VALUES ('$FirstName', '$LastName', '$Email', '$Password', '$Re_Password');";

    mysqli_query($conn, $sql);

    header("Location: sign_in.html?sign-up-insert=success");