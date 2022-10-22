<?php
    session_start();
    include "header.php";
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
    $_SESSION['poly'] = $polyName;
    $_SESSION['critHigh'] = $critHigh;
    $_SESSION['critLow'] = $critLow;
    $_SESSION['solvents'] = $solvents;
    $_SESSION['composition'] = $composition;
    $_SESSION['type'] = $type;
    $_SESSION['particleDiameter'] = $particleDiameter;
    $_SESSION['poreSize'] = $poreSize;
    $_SESSION['columnDimension'] = $columnDimension;
    $_SESSION['columnName'] = $columnName;
    $_SESSION['temperature'] = $temperature;
    $_SESSION['pressure'] = $pressure;
    $_SESSION['flowRate'] = $flowRate;
    $_SESSION['injectionVolume'] = $injectionVolume;
    $_SESSION['Detector'] = $Detector;
    $_SESSION['References'] = $References;
    $_SESSION['document'] = $document;

    
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
            <h2>Polymer Entry</h2>
            <img class="image-flask" src="bubble-2022490_960_720.png">

            <form class="polymer-preview" action="includes/polymer-insert.php" method="get">
                <fieldset class="poly-data  border border-dark">
                    <legend>Polymer Data</legend>
                   <fieldset>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="polyName" class="col-form-label required">Polymer Name</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php
                                        if($polyName > 0){
                                            echo "$polyName"; 
                                        }
                                        else {
                                            $_SESSION['previewStatus'] = "Invalid entry";
                                            header("Location: polymer_entry.php");
                                        } 
                                    ?>
                                <p>
                            </div>
                        </div>                        
                    </fieldset>

                    <fieldset>
                        <legend>Molar Mass Range</legend>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="critLow" class="col-form-label required">Low</label>
                            </div>
                            <div class="col-auto">
                                <span>kd</span>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label">-</label>
                            </div>
                            <div class="col-auto">
                                <label for="critHigh" class="col-form-label required">High</label>
                            </div>
                            <div class="col-auto">
                                <span>kd</span>
                            </div>
                        </div>
                        
                        <div class="row g-3 align-items-center">
                            <div class="input-group mb-3" style="width:45%;">
                                <p>
                                    <?php 
                
                                        if($critHigh > 0){
                                            echo "$critHigh"; 
                                        }
                                        else {
                                            $_SESSION['previewStatus'] = "Invalid entry";
                                            header("Location: polymer_entry.php");
                                        }  
                                    ?>
                                <p>
                                    <p>to</p>
                                <p>
                                    <?php 

                                        if($critLow > 0){
                                            echo "$critLow"; 
                                        }
                                        else {
                                            $_SESSION['previewStatus'] = "Invalid entry";
                                            header("Location: polymer_entry.php");
                                        }
                                    ?>
                                <p>
                            </div>
                        </div>
                    </fieldset>
                </fieldset>

                <fieldset class="mobile-data">
                    <legend>Mobile Phase Data</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="solvents" class="col-form-label required">Solvent(s)</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($solvents > 0){
                                            echo "$solvents"; 
                                        }
                                        else {
                                            $_SESSION['previewStatus'] = "Invalid entr";
                                            header("Location: polymer_entry.php");
                                        } 
                                    ?>
                                <p>
                            </div>
                     </div>
                     
                     <div id="hideComp">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="comp" class="col-form-label required">Composition</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 

                                        if($composition > 0 ) {
                                            echo "$composition";
                                        }
                                        else {
                                            echo "N/A";
                                            $type = "";
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <p><?php echo "$type" ?><p>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="stationary-data">
                    <legend>Stationary Phase Data</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="partDiam" class="col-form-label">Particle Diameter</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($particleDiameter > 0 ) {
                                            echo "$particleDiameter";
                                        }
                                        else {
                                            echo "N/A";
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span> &#xb5;m</span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="poreSize" class="col-form-label">Pore sizes</label>
                            </div>
                            <div class="col-auto">
                                 <p><?php echo "$poreSize" ?><p>
                            </div>
                            <div class="col-auto">
                                <span>&#8491;</span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colDim" class="col-form-label">Column Dimension</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php
                                        if($columnDimension > 0 ) {
                                            echo "$columnDimension";
                                        }
                                        else {
                                            echo "N/A";
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span>centi</span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colName" class="col-form-label">Column Name</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 

                                        if($columnName > 0){
                                            echo "$columnName";
                                        }
                                        else {
                                            echo "N/A";
                                        }

                                    ?>
                                <p>
                            </div>
                     </div>
                </fieldset>

                <fieldset class="condition-data">
                    <legend>Chromatography Conditions</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="temp" class="col-form-label required">Temperature</label>
                            </div>
                            <div class="col-auto">
                                 <p>
                                    <?php 
                                        if($temperature > 0){
                                            echo "$temperature"; 
                                        }
                                        else {
                                            $_SESSION['previewStatus'] = "Invalid entry";
                                            header("Location: polymer_entry.php");
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span id="Description" step="any" class="form-text">
                                    &#8451;
                                </span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="press" class="col-form-label">Pressure</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php
                                        if($pressure > 0){
                                            echo "$pressure";
                                        }
                                        else {
                                            echo "N/A";
                                        }
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    atm
                                </span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="flowRate" class="col-form-label">Flow Rate</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($flowRate > 0){
                                            echo "$flowRate";
                                        }
                                        else {
                                            echo "N/A";
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    ml/min
                                </span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="injVol" class="col-form-label">Injection Volume</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($injectionVolume > 0){
                                            echo "$injectionVolume";
                                        }
                                        else {
                                            echo "N/A";
                                        } 
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    <span> &#xb5;l</span>
                                </span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="det" class="col-form-label">Detector(s)</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($Detector > 0){
                                            echo "$Detector";
                                        }
                                        else {
                                            echo "N/A";
                                        }
                                    ?>
                                <p>
                            </div>
                     </div>
                </fieldset>

                <fieldset class="reference-data">
                    <legend>References</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="ref" class="col-form-label">DOI number</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($References > 0){
                                            echo "$References";
                                        }
                                        else {
                                            echo "N/A";
                                        } 
                                    ?>
                                <p>
                            </div>
                     </div>
                </fieldset>

                <fieldset class="upload-data">
                    <legend>Additional Documentation</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="upload" class="col-form-label">Upload</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                                        if($document > 0){
                                            echo "$document";
                                        }
                                        else {
                                            echo "N/A";
                                        }
                                    ?>
                                <p>
                            </div>
                     </div>
                </fieldset>
                     
                <fieldset id="options">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <input type="submit" name="Complete" id="submit" value="Submit">
                        </div>
                        <div class="col-auto">
                            <input type="submit" name="Complete" id="submit" value="New"  formaction="includes/polymer-insert.php">
                        </div>
                        <div class="col-auto">
                            <input type="button" name="Complete" id="submit" value="Edit" onclick="history.go(-1)">
                        </div>
                     </div>
                </fieldset>
            </form>
            
        </main>
        <!--Of course footer is included everywhere.-->
        <footer>
            <h2>This is for contact information</h2>
        </footer>
        

        <!-- Performing in file operations on the items from the in class id's and items from local storage. -->
    </body>
</html>