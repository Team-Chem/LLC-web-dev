<?php

session_start();

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

<h1>User Page</h1>

<?php if (isset($_SESSION["user_id_num"])): ?>
    
    <p>Successfully Logged On</p>
    
    <?php else: ?>

        <p><a href="sign_in.php"></a></p>
        <p><a href="sign_up.php"></a></p>

        <?php endif; ?>
</body>

</html>