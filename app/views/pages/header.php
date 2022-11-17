<?php
    session_start();
    include_once "../../../db/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php if(isset($title)) {echo $title;} else {echo "LCCC";} ?></title>
        <!-- 
            LCCC
            Filename: header.php

            Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
            Date: 9/19/2022
            References: HTML5 and CSS3 Illustrated, W3 Schools
        -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/stylesheets/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="path_to/jquery.js"></script>
        <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
        <link type="text/css" rel="stylesheet" href="path_to/simplePagination.css"/>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="icon" sizes="192x192" href="images/android.png">

    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<?php



?>
        <!-- Image and text -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="top" style="background-color: #000000;" style="border-bottom: 1px solid #333333;">
            <a class="navbar-brand d-lg-none" href="#"><img src="flask.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7"
                aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbarToggler7">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="polymer_search.php">Polymers</a>
                    </li>
                    <?php

                    if (isset($_SESSION['user_id_num'])) {
                        echo '<li class="nav-item">
                              <a class="nav-link" href="polymer_entry.php">New Polymer Entry</a>
                              </li>';
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION['user_id_num'])) {
                        echo '<li class="nav-item">
                              <a class="nav-link" href="profile.php">Profile</a>
                              </li>';
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user_id_num'])) {
                        echo '<li class="nav-item">
                              <a class="nav-link" href="user_logged_out.php">Sign Out</a>
                              </li>';
                    }

                    ?>

                    <?php
                    if (!isset($_SESSION['user_id_num'])) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="sign_in.php">Sign In</a>
                    </li>';
                    }

                    ?>
                </ul>
            </div>
        </nav>