

<!-- <!DOCTYPE html>
<html lang="en"> -->

<?php 
include "header.php";
?>

<!-- <head> -->
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="stylesheet" href="../../assets/stylesheets/styles.css">
  <!-- Used to connect to the google reCAPTCHA V2 -->  
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <!-- Stylesheet imported from jsdeliver.net. No CSS stylesheet for the form page -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <!-- Imported to allow the use of symbols for the form -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Imported to allow the use of symbols for the form -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- JustValidate is used to validate the page. Faster to use then using regular JavaScript -->
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <!-- <script src="../views/pages/form_validation.js" defer></script> -->

    <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>   -->

    <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
-->



    <?php

    if (isset($_POST['submit'])) {
        
 // $secret_key variable, which contains the secret key for the website's reCAPTCHA account.
        $secret_key = "6LemIYAiAAAAALOdrYe-rZOw49Osieqmh8Z6C4It";
        
// Gets the g-recaptcha-response value from the $_POST array, which contains the response from the reCAPTCHA challenge that the user completed.        
        $response = $_POST['g-recaptcha-response'];
        
 // Get the user's IP address       
        $remote_addr = $_SERVER['REMOTE ADDR'];
        
 // Build the URL for the reCAPTCHA API       
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&remoteip=$remote_addr";
        
  // Send the request to the API      
        $data = file_get_contents($url);
        
  // Decode the JSON response      
        $row = json_decode($data, true);

// Check if the user passed the challenge        
        if ($row['success'] == "true") {
            echo "Success!";
        } else {
            echo "Failure!";
        }
    }

?>


<!-- </head>
<body> -->


<!--This is for the sign up portion of the modal sign up pop up-->
<div class="sign-up-div">
  <!--  <img class="image-flask" src="../../assets/images/flask.png"> -->
    <h1 style="color: black;">Sign Up</h1>
    <hr>
<form class="sign_up-form" id="sign-up-form" action="process-signup.php" method="POST" novalidate>
<span class="fa fa-solid fa-user-plus" style="font-size: 60px; color:black"></span>
    <div class="form-field success">      
        <label style="position: relative; right: 207px;" class="label_first_sign_up" generated="true" for="first_name"><b>First Name</b></label>
        <input type="text" placeholder="First Name" id="first_name_sign_up" name="FirstName" >
    </div>

    <div class="form-field success"> 
        <label style="position: relative; right: 207px;" class="label_last_sign_up" for="last_name"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name" id="last_name_sign_up" name="LastName">
    </div>
    
    <div class="form-field success">
        <label style="position: relative; right: 227px;" class="label_email_sign_up" for="email"><b>Email</b></label>
        <input type="email" placeholder="Email" id="email_sign_up" name="Email">

    </div>

    <div class="form-field success">
        <label style="position: relative; right: 213px;" class="label_password_sign_up" for="password"><b>Password</b></label>
        <input type="password" id="password_sign_up" placeholder="Password" name="Password">
        <small></small>

    </div>

    <div class="form-field success">
        <label style="position: relative; right: 178px;" class="label_re-pass_sign_up" for="re-enter-password"><b>Re-enter password</b></label>
        <input type="password" placeholder="Re-enter Password" id="re-password_sign_up" name="Re-Password">
        <small></small>

    </div>
     
        <!--reCAPTCHA key -->
        <div id="recaptcha-sign_up" class="g-recaptcha" data-sitekey="6LemIYAiAAAAAN7dsn6digu1hltW9LANmmBQKSoo"></div>
        <span id="captcha" style="color:red"></span>

        <!-- <input style="position: relative; left: 190px;" type="submit" name="submit" id="submit-sign-up" value="Submit"> -->

        <button style="position: relative; left: 0px;" type="submit">Sign up</button>

</form>

<hr>
        <p style="color:black;"><b>Already have an account?</b> <a href="sign_in.php">Sign In</a></p>

        <hr>
        <!-- <input style="position: relative; left: 190px;" type="button" value="Go Back" onclick="history.back()"> -->

        <button style="position: relative; left: 0px;" type="submit" value="Go Back" onclick="history.back()">Go Back</button>

</div>

<!-- Adds the following CSS to the fields to make it look more organized -->
    <style>

    /* Sign up*/

.sign-up-div {
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

.sign_up-form {
    color: rgb(13, 13, 14);
    margin-bottom: 30px;
}

#first_name_sign_up {
    margin-left: 10px;
    border-radius: 7px;
    width: 215px;
}

#last_name_sign_up {
    margin-left: 10px;
    border-radius: 7px;
    width: 215px;
}

#email_sign_up {
    margin-left: 10px;
    border-radius: 7px;
    width: 215px;
}

#password_sign_up {
    margin-left: 10px;
    border-radius: 7px;
    width: 215px;
}

#re-password_sign_up {
    margin-left: 10px;
    border-radius: 7px;
    width: 215px;
}

#submit-sign-up{
    background-color: black;
}

    </style>

<?php
            include "footer.php";
        ?>

<!-- Uses the javascript file to pass form validation on the fields -->
<script src="form_validation.js" defer></script>

</body>
</html>


