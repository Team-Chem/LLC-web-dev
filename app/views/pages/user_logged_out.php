<?php

// Destroys the session for the user when they click sign out button on the navbar.
session_start();

session_destroy();

// Redirect the user back to the sign in page.
header("Location: sign_in.php");
exit();
