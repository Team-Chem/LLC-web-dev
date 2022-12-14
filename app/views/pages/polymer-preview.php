<?php
//Getting the appropriate title for the page.
    $title = 'Preview';
    include "header.php";

    //Condition for checking whether or not the user is trying to skip to this page.
    if(!(isset($_GET['Entry']))) {
        //Setting the text to be displayed as an alert.
        $_SESSION['previewStatus'] = "Error: invalid entry";
        //This redirects the user back to the entry page. This wipes the users inputed data.
        //Mostly a troll thing because they are trying to break my website.
        header("Location: polymer_entry.php");
    }
    //Checking that the critical hish value inputed is not lower than the critical low value.
    //NOTE: these names came from chemistry terms do not worry about them too much.
    if($_GET['CriticalHigh'] < $critLow = $_GET['CriticalLow']){
        //This is setting the text to be displayed as an alert.
        $_SESSION['previewStatus'] = "Error: Molar High is lower than the molar Low";
        //This redirects the user back to the entry page but retains their inputed data.
        ?><script type="text/javascript">history.back()</script><?php
    }

    //This is a giant mess of me assigning php values from the data that was inputed from the form on the 
    //polymer entry page. The reasoning is to be able to run comparisons for display.
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

            <!--This form is the one that will actually submit the data into the db-->
            <form class="polymer-preview" action="../../../db/polymer-insert.php" method="POST">
                <!--all of thee following blocks follow this methedology-->
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
                                    //Pretty much run these conditions for all of the php variables.
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
                                        //This one is a bit more complicated because the user specifies not only the composition
                                        //but a type as well in which both need to be stored into the db.
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
                                    //This is another complicated one. This has to run conditions on what the user entered in for the DOI.
                                    //They could just ener in a bunch of numbers or they could have entered in the full url. If they enter in 
                                    //a string not containing the https then add it.
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
                
                <!--
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
                                    -->
                <!--This is giving the user multiple options for completing the data entry -->
                <fieldset id="options">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <!--This button contains an on click which gives the user multiple options upon submission. -->
                        <button type="button" class="form-control w-50" style="margin: 10px 10px;" name="SubmitComplete" id="submit" value="Submit" onclick="submissionFunction()">Submit</button>
                        <p id="invalid"></p>
                        <!--<button type="submit" class="form-control w-50" style="margin: 10px 10px;" name="NewComplete" id="new" value="New">New</button>-->
                        <!--This allows the user to be able to edit the entry.-->
                        <button type="button" class="form-control w-50" style="margin: 10px 10px;" name="Complete" id="edit" value="Edit" onclick="history.back()">Edit</button>
                    </div>
                </fieldset>
            </form>
            <!--This script is meant to detect if the composition input field was filled out or not and then display appropriately.-->
        <script src="../../javascript/form_display_comp_on_prev.js"></script>
        <script>
            /* Essentially this is grabbing the button with the id submit and if then prompts the user with a text box
            if the user enters in yes then change the name of the input box for validation on the polymer insert page. if the user
            enters in no then just keep the name then same and do the normal submssion taking the user to the polymer search apge.
            If the user said yes it will just redirect back to the entery page after submitting the data to the db.*/
            function submissionFunction() {
                let decision = document.getElementById("submit");
                let text;
                let new_entry = prompt("Would you like to enter another entry form? yes or no", "no");
                switch(new_entry){
                    case "yes":
                        decision.setAttribute("name", "NewComplete");
                        decision.setAttribute("type", "submit");
                        break;
                    case "no":
                        decision.setAttribute("name", "SubmitComplete");
                        decision.setAttribute("type", "submit");
                        break;
                    //Could not figure out why this field will not work. Think it something to do with where I was trying
                    //to change the inner html at.
                    default:
                        text = "Invalid please try again.";
                        docuemnt.getElementById("invalid").innerhtml = text;
                }
            }
        </script>
    </body>
</html>