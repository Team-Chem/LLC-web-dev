<?php
    session_start();
    $polyName = $_GET['PolyName'];
    $critHigh = $_GET['CriticalHigh'];
    $critLow = $_GET['CriticalLow'];
    $solvents = $_GET['Solvents'];
    $composition = $_GET['Composition'];
    $type = $_GET['type'];
    $particleDiameter = $_GET['ParticleDiameter'];
    $poreSize = $_GET['PoreSize'];
    $columnDimension = $_GET['ColumnDimension'];
    $columnName = $_GET['ColumnName'];
    $temperature = $_GET['Temperature'];
    $pressure = $_GET['Pressure'];
    $flowRate = $_GET['FlowRate'];
    $injectionVolume = $_GET['InjectionVolume'];
    $Detector = $_GET['Detector'];
    $References = $_GET['References'];
    $document = $_GET['Document'];
    
    //Defining the sessions variables to be stored into the database.
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $url_a="http"?>
        <title>Data Preview Page</title>
        <!-- 
            LCCC - Data Entry
            Filename: polymer_entry.html

            Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
            Date: 9/19/2022
            References: HTML5 and CSS3 Illustrated, W3 Schools
        -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../stylesheets/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="icon" sizes="192x192" href="images/android.png">

    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5d8799;">
            <a class="navbar-brand d-lg-none" href="#"><img src="logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7"
                aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbarToggler7">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="polymer_search.php">Polymer Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="polymer_entry.php">New Polymer Entry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign_in.html">Account</a>
                    </li>
                </ul>
            </div>
        </nav>

        <header>
            <h1>LCCC</h1>
        </header>

        <!-- Using the article here for structuring-->
        <main id="start">
            <h2>Polymer Entry Preview</h2>
            <img class="image-flask" src="bubble-2022490_960_720.png">

            <form class="polymer-preview" action="includes/polymer-insert.php" method="get">
                <fieldset class="poly-data">
                    <legend>Polymer Data</legend>
                    <fieldset>
                        <label for="pName">
                            Polymer Name:
                            <a name="PolyName"><?php echo $polyName ?></a>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>Molar Mass Range</legend>
                        <label for="critHigh">
                            High
                            <p id="high" name="PolyName"><?php echo $critHigh ?></p>
                        </label>
                        <label for="critLow">
                            Low
                            <p id="low"><?php echo $critLow ?></p>
                        </label>
                    </fieldset>
                </fieldset>

                <fieldset class="mobile-data">
                    <legend>Mobile Phase Data</legend>
                    <label for="solvents">
                        Solvents(s)
                        <p id="solv"><?php echo $solvents ?></p>
                    </label>
                    <fieldset class="possible-composition">
                    <label for="comp">
                        Composition
                        <p id="comp"><?php echo $composition ?></p>
                    </label>
                </fieldset>

                <fieldset class="stationary-data">
                    <legend>Stationary Phase Data</legend>
                    <label for="partDiam">
                        Particle Diameter
                        <p id="partD"><?php echo $particleDiameter ?></p>
                    </label>
                    <label for="poreSize">
                        Pore sizes
                        <p id="poreS"><?php echo $poreSize ?></p>
                    </label>
                    <label>
                        Column Dimension
                        <p id="colD"><?php echo $columnDimension ?></p>
                    </label>
                    <label>
                        Column name
                        <p id="ColName"><?php echo $columnName ?></p>
                    </label>
                </fieldset>

                <fieldset class="condition-data">
                    <legend>Chromatography Conditions</legend>
                    <label for="temp">
                        Temperature
                        <p id="temperature"><?php echo $temperature ?></p>
                    </label>
                    <label for="press">
                        Pressure
                        <p id="pressure"><?php echo $pressure ?></p>
                    </label>
                    <label for="flowRate">
                        Flow Rate
                        <p id="flow"><?php echo $flowRate ?></p>
                    </label>
                    <label for="injVol">
                        Injection Volume
                        <p id="inj"><?php echo $injectionVolume ?></p></p>
                    </label>
                    <label for="det">
                        Detector(s)
                        <p id="detect"><?php echo $Detector ?></p>
                    </label>
                </fieldset>

                <fieldset class="reference-data">
                    <legend>References</legend>
                    <label for="ref">
                        DOI number
                        <p id="reference"><?php echo $References ?></p>
                    </label>
                </fieldset>

                <fieldset class="upload-data">
                    <legend>Additional Documentation</legend>
                    <label for="upload">
                        <p id="do"><?php echo $document ?></p>
                    </label>
                </fieldset>

                <fieldset class="submitbutton2">
                    <legend>Complete Entry</legend>
                    <label for="submit">
                        <input type="submit" name="Complete" id="fullSubmission" value="Submit">
                    </label>
                    <label for="submit">
                        <input type="submit" name="Complete" id="submit" value="New"  formaction="includes/polymer-insert.php">
                    </label>
                    <label for="submit">
                        <input type="button" name="Complete" id="submit" value="Edit" onclick="history.go(-1)">
                    </label>
                </fieldset>
            </form>
            
        </main>
        <!--Of course footer is included everywhere.-->
        <footer>
            <h2>This is for contact information</h2>
        </footer>
        

        <!-- Performing in file operations on the items from the in class id's and items from local storage. -->
        <?php
            session_destroy();
        ?>
    </body>
</html>