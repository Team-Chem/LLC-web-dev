<?php
session_start(); // to ensure you are using the same session
session_destroy();
header("location:/index.php"); // redirect back to "index.php" after logging out
?>