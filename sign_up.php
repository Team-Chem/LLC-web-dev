


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>   -->

    <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
-->

    <?php

    if (isset($_POST['submit'])) {
        $secret_key = "6LemIYAiAAAAALOdrYe-rZOw49Osieqmh8Z6C4It";
        $response = $_POST['g-recaptcha-response'];
        $remote_addr = $_SERVER['REMOTE ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&remoteip=$remote_addr";
        $data = file_get_contents($url);
        $row = json_decode($data, true);

        if ($row['success'] == "true") {
            echo "Success!";
        } else {
            echo "Failure!";
        }
    }

?>


</head>
<body>

<!--This is for the sign up portion of the modal sign up pop up-->
<div class="sign-up-div">
    <img class="image-flask" src="bubble-2022490_960_720.png">
<form class="sign_up-form" id="form" action="sign-up-insert.php" method="POST">
    <h1>Sign Up</h1>
    <div class="form-field success">      
        <label class="label_first" generated="true" for="first_name"><b>First Name:</b></label>
        <input type="text" placeholder="First Name" id="first_name" name="FirstName" >
        <small></small>
    </div>

    <div class="form-field success"> 
        <label class="label_last" for="last_name"><b>Last Name:</b></label>
        <input type="text" placeholder="Last Name" id="last_name" name="LastName" required>
        <small></small>
    </div>
    
    <div class="form-field success">
        <label class="label_email" for="email"><b>Email:</b></label>
        <input type="email" placeholder="Email" id="email" name="Email" required>
        <small></small>

    </div>

    <div class="form-field success">
        <label class="label_password" for="password"><b>Password:</b></label>
        <input type="password" id="password" placeholder="Password" name="Password" required>
        <small></small>

    </div>

    <div class="form-field success">
        <label class="label_re-pass" for="re-enter-password"><b>Re-enter password:</b></label>
        <input type="password" placeholder="Re-enter Password" id="re-password" name="Re-Password" required>
        <small></small>

    </div>
     
        <!--reCAPTCHA key -->
        <div id="recaptcha-sign_up" class="g-recaptcha" data-sitekey="6LemIYAiAAAAAN7dsn6digu1hltW9LANmmBQKSoo"></div>
        <span id="captcha" style="color:red"></span>

        <input style="width:100px;margin:0 50%;position:relative;left:-50px;" type="submit" name="submit" id="submit" value="Submit">

</form>

<hr>
        <p> Already have an account? <a href="sign_in.html">Sign In</a></p>

        <hr>
        <input type="button" value="Go Back" onclick="history.back()">

<!--
    <script src="form_validation.js"></script>

-->

</body>
</html>


