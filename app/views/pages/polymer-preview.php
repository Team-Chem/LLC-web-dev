<?php
    $title = 'Preview';
    include "header.php";


    if(!(isset($_GET['Entry']))) {
        $_SESSION['previewStatus'] = "Error: invalid entry";
        header("Location: polymer_entry.php");
    }

    if($_GET['CriticalHigh'] < $critLow = $_GET['CriticalLow']){
        $_SESSION['previewStatus'] = "Error: Molar High is lower than the molar Low";
        header("Location: polymer_entry.php");
    }

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

    //Concatenating the url part to make the DIO number a url link.
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
    
    $_SESSION['document'] = $document;

    
?>
      <header>
            <h1>Entry Preview</h1>
        </header>

        <!-- Using the article here for structuring-->
        <main id="start">
            <h2>Polymer Entry</h2>
            <img class="image-flask" src="../../assets/images/flask.png">

            <form class="polymer-preview" action="../../../db/polymer-insert.php" method="get">
                <fieldset class="poly-data">
                    <legend>Polymer Data</legend>
                   <fieldset>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="polyName" class="col-form-label required">Polymer Name</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php
                                        if(isset($polyName) && (trim($polyName) != "")){
                                            echo "$polyName"; 
                                        }
                                        else {
                                            echo "N/A";
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
                                <p>
                                    <?php 
                                        if(isset($critLow) && (trim($critLow) != "")){
                                            echo "$critLow<span>kD<span>"; 
                                        }
                                        else {
                                            echo "N/A";
                                        }  
                                    ?>
                                <p>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label">-</label>
                            </div>
                            <div class="col-auto">
                                <label for="critHigh" class="col-form-label required">High</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 
                
                                        if(isset($critHigh) && (trim($critHigh) != "")){
                                            echo "$critHigh<span>kD<span>"; 
                                        }
                                        else {
                                            echo "N/A";
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
                                        if(isset($solvents) && (trim($solvents) != "")){
                                            echo "$solvents"; 
                                        }
                                        else {
                                            echo "N/A";
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

                                        if(isset($composition) && (trim($composition) != "")) {
                                            $composition .= " ";
                                            $composition .= $type;
                                            echo "$composition";
                                            $_SESSION['composition'] = $composition;
                                        }
                                        else {
                                            echo "Not needed";
                                            $type = "";
                                        } 
                                    ?>
                                <p>
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
                                        if(isset($particleDiameter) && (trim($particleDiameter) != "")) {
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
                                 <p>
                                     <?php 
                                        
                                        if(isset($poreSize) && (trim($poreSize) != "")) {
                                            echo "$poreSize";
                                        }
                                        else {
                                            echo "N/A";
                                        }
                                     ?>
                                  <p>
                            </div>
                            <div class="col-auto">
                                <span>&#8491;</span>
                            </div>
                     </div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colDim" class="col-form-label">Column Length</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php
                                        if(isset($columnDimension) && (trim($columnDimension) != "")) {
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
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colName" class="col-form-label">Column Name</label>
                            </div>
                            <div class="col-auto">
                                <p>
                                    <?php 

                                        if((isset($columnName)) && (trim($columnName) != "")){
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
                                        if(isset($temperature) && (trim($temperature) != "")){
                                            echo "$temperature"; 
                                        }
                                        else {
                                            echo "N/A";
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
                                        if(isset($pressure) && (trim($pressure) != "")){
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
                                        if(isset($flowRate) && (trim($flowRate) != "")){
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
                                        if(isset($injectionVolume) && (trim($injectionVolume) != "")){
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
                                        if(isset($Detector) && (trim($Detector) != "")){
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
                                        if(isset($References) && (trim($References) != "")){
                                            if(strpos($References, 'https') !== false){
                                                $_SESSION['References'] = $References;
                                                echo "<a href='$References'> " . $References . "</a>";
                                            }
                                            else {
                                                $References = "https://doi.org/" . $References;
                                                $_SESSION['References'] = $References;
                                                echo "<a href='$References'> " . $References . "</a>";
                                            }
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
                                        if(isset($document) && (trim($document) != "")){
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
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="form-control mr-5" name="SubmitComplete" id="submit" value="Submit">Submit</button>
                        <button type="submit" class="form-control mr-5" name="NewComplete" id="new" value="New">New</button>
                        <button type="button" class="form-control" name="Complete" id="edit" value="Edit" onclick="history.go(-1)">Edit</button>
                    </div>
                </fieldset>
            </form>
            
        </main>
        <!--Of course footer is included everywhere.-->
        <?php
            include "footer.php";
        ?>

        <script src="../../javascript/form_display_comp_on_prev.js"></script>
    </body>
</html>