<?php 

include "nav.php";

?>

<?php

$invalid_user = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn = require __DIR__ . "/../../../db/db/connection.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                    $conn->real_escape_string($_POST['email']));

                    $result = $conn->query($sql);
                    $user = $result->fetch_assoc();

        if ($user) {

            if (password_verify($_POST['password'], $user['password_hash'])) {
                session_start();

                $_SESSION["user_id_num"] = $user['id'];

                header("Location: user_logged_in.php");
                exit();
            }
        }

        $invalid_user = true;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../assets/stylesheets/sign_in_out.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />



</head>
<body>
        
        <!--This is for the sign in portion of the modal sign up pop up--> 
        <div class="sign-in-div">
          <!--  <img class="image-flask" src="../../assets/images/flask.png">  -->
          <h1 style="color: black;">Sign In</h1>
          <hr>

          <span class="material-symbols-outlined" style="font-size: 60px; color:black">person</span>

          <form class="sign-in-form" method="POST" novalidate>

          <?php if ($invalid_user): ?>
                <em class="invalid-user" style="position: relative; right: 200px;">Invalid Login</em>
            <?php endif; ?>

            <div class="container">

        <label style="position: relative; right: 225px;" for="email"><b>Email</b></label>
        <input type="text" class="email-user" placeholder="Email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" required>

        <label style="position: relative; right: 210px;" class="label_password" for="password"><b>Password</b></label>
        <input type="password" placeholder="Password" name="password" required>

        <a style="position: relative; right: 170px;" href="#">Forgot your password</a>
        
        <p class="check-box">
            <input type="checkbox" id="remember-user">
            <label for="remember-user">Remember me</label>
        </p>
        
        <input style="position: relative; left: 190px;" class="sub-button" type="submit" id="submit" value="Submit">
        </form>

        <hr>
        <p><b>Don't have an account?</b> <a href="sign_up.php">Sign Up</a></p>

        <hr>
        <input style="position: relative; left: 190px;"  type="button" value="Go Back" onclick="history.back()">
    </div>
    </div>


</body>
</html>