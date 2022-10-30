<?php 
include "nav.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>

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
        <form class="sign-in-form" action="sign-in-insert.php" method="POST">
            <span class="material-symbols-outlined" style="font-size: 60px; color:black">person</span>
            <div class="container">
            
        <label style="position: relative; right: 225px;" for="email"><b>Email</b></label>
        <input type="text" class="email-user" placeholder="Email" name="email" required>

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