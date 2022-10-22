<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../stylesheets/styles.css">

</head>
<body>

<!--This is for the sign up portion of the modal sign up pop up-->
<div class="sign-up-div">
    <img class="image-flask" src="bubble-2022490_960_720.png">
<form class="sign_up-form" action="sign-up-insert.php" method="POST">
    <h1>Sign Up</h1>
    <div class="container">
            
    <label class="label_first" for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="First Name" id="first_name" name="FirstName" required>

    <label class="label_last" for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" id="last_name" name="LastName" required>

    <label class="label_email" for="email"><b>Email</b></label>
<input type="text" placeholder="Email" id="email" name="Email" required>

<label class="label_password" for="password"><b>Password</b></label>
<input type="password" id="password" placeholder="Password" name="Password" required>

<label class="label_re-pass" for="re-enter-password"><b>Re-enter password</b></label>
<input type="password" placeholder="Re-enter Password" id="re-password" name="Re-Password" required>
    
        <input style="width:100px;margin:0 50%;position:relative;left:-50px;" type="submit" id="submit" value="Submit">
</form>

<hr>
        <p> Already have an account? <a href="sign_in.html">Sign In</a></p>

        <hr>
        <input type="button" value="Go Back" onclick="history.back()">

</div>
</div>

</body>
</html>