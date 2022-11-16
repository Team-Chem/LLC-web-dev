<?php 

include "header.php";

// Non signed in user will be redirected back to location if not signed in.
if (isset($_SESSION['user_id_num'])) {
    header("location: profile.php");
}

?>

<?php

    $invalid_user = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $conn = require __DIR__ . "/../../../db/connection.php";

        $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                        $conn->real_escape_string($_POST['email']));

                        $result = $conn->query($sql);
                        $user = $result->fetch_assoc();

            if ($user) {

                if (password_verify($_POST['password'], $user['password_hash'])) {
                    
                    session_start();

                    session_regenerate_id();

                    $_SESSION["user_id_num"] = $user['user_id'];

                header("Location: polymer_search.php");
                exit();
            }

            $invalid_user = true;
}
    }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <!-- <link rel="stylesheet" href="../../assets/stylesheets/styles.css"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />




<!-- <body> -->
        
        <!--This is for the sign in portion of the modal sign up pop up--> 
        <div class="sign-in-div">
          <!--  <img class="image-flask" src="../../assets/images/flask.png">  -->
          <h1 style="color: black;">Sign In</h1>
          <hr>

          <span class="material-symbols-outlined" style="font-size: 60px; color:black">person</span>

          <form class="sign-in-form" method="POST">

          <?php if ($invalid_user): ?>
                <em class="invalid-user" style="position: relative; right: 200px;">Invalid Login</em>
            <?php endif; ?>

            <div class="container">

        <label style="position: relative; right: 225px;" for="email"><b>Email</b></label>
        <input type="text" class="email-user" placeholder="Email" id="input-email-user" name="email" value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" required>

        <label style="position: relative; right: 210px;" class="label_password" for="password"><b>Password</b></label>
        <input type="password" placeholder="Password" name="password" required>

        <a style="position: relative; right: 170px;" href="#">Forgot your password</a>
        
        <p class="check-box">
            <input type="checkbox" id="remember-user">
            <label for="remember-user">Remember me</label>
        </p>
        
        <!-- <input class="sign-in-submit" style="position: relative; left: 190px;" class="sub-button" type="submit" id="submit-sign-in" value="Submit"> -->

        <button style="position: relative; left: 0px;" type="submit">Sign In</button>
        </form>

        <hr>
        <p><b>Don't have an account?</b> <a href="sign_up.php">Sign Up</a></p>

        <hr>
        <!-- <input style="position: relative; left: 190px;"  type="button" value="Go Back" onclick="history.back()"> -->

        <button style="position: relative; left: 0px;" type="submit" value="Go Back" onclick="history.back()">Go Back</button>

    </div>
    </div>

    <style>
.sign-in-div {
    width: 675px;
    box-shadow: 0 0 3px 0 rgb(106, 13, 212);
    background: 25px;
    padding: 75px;
    text-align: center;
    margin: 8% auto 0;
    background-color: rgb(255, 255, 255);
    display: block;
    margin-top: 125px;
}

.sign-in-form {
    color: rgb(13, 13, 14);
    margin-bottom: 30px;
}

#input-email-user {
    margin-left: 0px;
    border-radius: 7px;
    width: 215px;

}

#submit-sign-in{
    background-color: black;
}

    </style>
<?php
            include "footer.php";
        ?>

</body>
</html> 