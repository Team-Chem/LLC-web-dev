<?php

session_start();

session_destroy();

header("Location: polymer_search.php");
exit();