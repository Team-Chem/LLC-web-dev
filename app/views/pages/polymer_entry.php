<?php 
    $title = 'Data Entry';
    include "header.php";
?>
        <header>
            <h1>Entry</h1>
        </header>

        <?php
            if(isset($_SESSION['previewStatus'])){
                ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert" id="color">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" color="green" aria-label="Error:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <?php echo $_SESSION['previewStatus'];?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['previewStatus']);
            }
        ?>

        <?php
            if(isset($_SESSION['status'])){
                ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert" id="color">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" color="green" aria-label="Error:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <?php echo $_SESSION['status'];?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>
        <!-- Using the article here for structuring-->
        <main id="start">
            <h2>Polymer Entry</h2>
            <!-- <img class="image-flask" src="../../assets/images/flask.png"> -->

            <form class="polymer-entry border border-dark" action="polymer-preview.php" method="get">
                <p>Please enter the required fields *</p>
                <fieldset class="poly-data">
                    <legend>Polymer Data</legend>
                   <fieldset>
                        <div class="row g-2 align-items-center">
                            <div class="col-5">
                                <label for="polyName" class="col-form-label required">Polymer Name</label>
                                <span id="Description" class="form-text">
                                    Enter in a single polymer 
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="polyName" name="PolyName" class="form-control" aria-describedby="Description" placeholder="Polybutadiene" required>
                            </div>
                        </div>
                        <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                        
                    </fieldset>
                    <fieldset>
                        <div>
                            <label>Molar Mass Range</label>
                        </div>
                        <div class="row g-3 align-items-center" id="no-border">
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
                                    <input type="number" step="any" class="form-control" id="critLow" name="CriticalLow" aria-label="Username" required>
                                    <span class="input-group-text">to</span>
                                    <input type="number" step="any" class="form-control" id="critHigh" name="CriticalHigh" aria-label="Server" required>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in kilograms per mole
                                </span>
                            </div>
                        </div>
                        <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                    </fieldset>
                </fieldset>

                <fieldset class="mobile-data">
                    <legend>Mobile Phase Data</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="solvents" class="col-form-label required">Solvent(s)</label>
                                <span id="Description" class="form-text">
                                    Enter in a solvent or a list seperated by /
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="solvents" name="Solvents" class="form-control" aria-describedby="Description" placeholder="solvent1/solvent2" required>
                            </div>
                     </div>
                     
                     <div id="hideComp">
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="comp" class="col-form-label required">Composition</label>
                                <span id="Description" class="form-text">
                                Enter your composition as a weight or volume
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="comp" name="Composition" class="form-control" aria-describedby="Description" required>
                            </div>
                            <div class="col-auto">
                            <select id="type" name="type">
                                <option value="weight">wt</option>
                                <option value="volume">vol</option>
                            </select>
                            </div>
                     </div>
                    <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                </fieldset>

                <fieldset class="stationary-data">
                    <legend>Stationary Phase Data</legend>
                    <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                    <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="partDiam" class="col-form-label">Particle Diameter</label>
                                <span id="Description" class="form-text">
                                    Enter in Microns
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="partDiam" name="ParticleDiameter" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span> &#xb5;m</span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="poreSize" class="col-form-label">Pore sizes</label>
                                <span id="Description" class="form-text">
                                    Enter in Angstroms
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="poreSize" name="PoreSize" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span>&#8491;</span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="colDim" class="col-form-label">Column Length</label>
                                <span id="Description" class="form-text">
                                    Enter in U l.
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="colDim" name="ColumnDimension" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span>centi</span>
                            </div>
                     </div>
                    <!-- <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="colName" class="col-form-label">Column Name</label>
                                <span id="Description" class="form-text">
                                    Enter where you got your column from.
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="colName" name="ColumnName" class="form-control" aria-describedby="Description">
                            </div>
                     </div>
                    <!-- <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                </fieldset>

                <fieldset class="condition-data">
                    <legend>Chromatography Conditions</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="temp" class="col-form-label required">Temperature</label>
                                <span id="Description" class="form-text">
                                    Please enter in Celsius. 
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="temp" name="Temperature" class="form-control" aria-describedby="Description" required>
                            </div>
                            <div class="col-auto">
                                <span id="Description" step="any" class="form-text">
                                    &#8451;
                                </span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="press" class="col-form-label">Pressure</label>
                                <span id="Description" class="form-text">
                                    Enter in the atmoshperic pressure
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="press" name="Pressure" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    atm
                                </span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="flowRate" class="col-form-label">Flow Rate</label>
                                <span id="Description" class="form-text">
                                    Enter in Millileter/Minutes
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="flowRate" name="FlowRate" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    ml/min
                                </span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="injVol" class="col-form-label">Injection Volume</label>
                                <span id="Description" class="form-text">
                                    Enter in micro liters
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="injVol" name="InjectionVolume" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    <span> &#xb5;l</span>
                                </span>
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                     <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="det" class="col-form-label">Detector(s)</label>
                                <span id="Description" class="form-text">
                                    Enter as a comma seperated list
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="det" name="Detector" class="form-control" aria-describedby="Description">
                            </div>
                     </div>
                     <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                </fieldset>

                <fieldset class="reference-data">
                    <legend>References</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="ref" class="col-form-label">DOI number</label>
                                <span id="Description" class="form-text">
                                    Enter the DOI number or URL
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="ref" name="References" class="form-control" aria-describedby="Description" placeholder="0000000/000000000000">
                            </div>
                     </div>
                    <!--<div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>-->
                </fieldset>

                <fieldset class="upload-data">
                    <legend>Additional Documentation</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-5">
                                <label for="upload" class="col-form-label">Upload</label>
                                <span id="Description" class="form-text">
                                   Enter a doc, pdf, or html document.
                                </span>
                            </div>
                            <div class="col-auto">
                                <input type="file" id="upload" name="Document" class="form-control" aria-describedby="Description" placeholder="0000000/000000000000">
                            </div>
                     </div>
                    <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>
                <div class="text-center">
                    <fieldset class="submitbutton">
                        <legend class="py-2" style="font-size:1.2em">Complete Entry</legend>
                        <label for="submit">
                            <button type="submit" name="Entry" id="submit">Continue</button>
                        </label>
                    </fieldset>
                </div>
            </form>
            
        </main>
        <!--Of course footer is included everywhere.-->
        <?php
            include "footer.php";
        ?>

        <script src="../../javascript/form_display.js"></script>

    </body>
</html>