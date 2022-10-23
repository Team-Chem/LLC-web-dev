<?php 
    include "header.php";
?>
        <header>
            <h1>LCCC</h1>
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
        <!-- Using the article here for structuring-->
        <main id="start">
            <h2>Polymer Entry</h2>
            <img class="image-flask" src="../../assets/images/flask.png">

            <form class="polymer-entry" action="polymer-preview.php" method="get">
                <p>Please enter the required fields *</p>
                <fieldset class="poly-data">
                    <legend>Polymer Data</legend>
                   <fieldset>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="polyName" class="col-form-label required">Polymer Name</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="polyName" name="PolyName" class="form-control" aria-describedby="Description" placeholder="Polybutadiene" required>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in a single polymer 
                                </span>
                            </div>
                        </div>
                        <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                        
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
                        <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                    </fieldset>
                </fieldset>

                <fieldset class="mobile-data">
                    <legend>Mobile Phase Data</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="solvents" class="col-form-label required">Solvent(s)</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="solvents" name="Solvents" class="form-control" aria-describedby="Description" placeholder="solvent1/solvent2" required>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in a solvent or a list seperated by /
                                </span>
                            </div>
                     </div>
                     
                     <div id="hideComp">
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="comp" class="col-form-label required">Composition</label>
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
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter your composition as a weight or volume
                                </span>
                            </div>
                     </div>
                    <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>

                <fieldset class="stationary-data">
                    <legend>Stationary Phase Data</legend>
                    <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="partDiam" class="col-form-label">Particle Diameter</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="partDiam" name="ParticleDiameter" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span> &#xb5;m</span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in Microns
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="poreSize" class="col-form-label">Pore sizes</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="poreSize" name="PoreSize" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span>&#8491;</span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in Angstroms
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colDim" class="col-form-label">Column Dimension</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="colDim" name="ColumnDimension" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span>centi</span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in U l.
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="colName" class="col-form-label">Column Name</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="colName" name="ColumnName" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter where you got your column from.
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>

                <fieldset class="condition-data">
                    <legend>Chromatography Conditions</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="temp" class="col-form-label required">Temperature</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="temp" name="Temperature" class="form-control" aria-describedby="Description" required>
                            </div>
                            <div class="col-auto">
                                <span id="Description" step="any" class="form-text">
                                    &#8451;
                                </span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    Please enter in Celsius. 
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="press" class="col-form-label">Pressure</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="press" name="Pressure" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    atm
                                </span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in the atmoshperic pressure
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="flowRate" class="col-form-label">Flow Rate</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="flowRate" name="FlowRate" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    ml/min
                                </span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter in Millileter/Minutes
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="injVol" class="col-form-label">Injection Volume</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" step="any" id="injVol" name="InjectionVolume" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    <span> &#xb5;l</span>
                                </span>
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    Enter in whatever
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                     <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="det" class="col-form-label">Detector(s)</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="det" name="Detector" class="form-control" aria-describedby="Description">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                Enter as a comma seperated list
                                </span>
                            </div>
                     </div>
                     <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>

                <fieldset class="reference-data">
                    <legend>References</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="ref" class="col-form-label">DOI number</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="ref" name="References" class="form-control" aria-describedby="Description" placeholder="0000000/000000000000">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                    Enter the DOI number or URL
                                </span>
                            </div>
                     </div>
                    <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>

                <fieldset class="upload-data">
                    <legend>Additional Documentation</legend>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="upload" class="col-form-label">Upload</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" id="upload" name="Document" class="form-control" aria-describedby="Description" placeholder="0000000/000000000000">
                            </div>
                            <div class="col-auto">
                                <span id="Description" class="form-text">
                                   Enter a doc, pdf, or html document.
                                </span>
                            </div>
                     </div>
                    <div class="helptip" data-bs-toggle="tooltip" data-bs-placement="top" title="This is in units kilograms per mole">?</div>
                </fieldset>
                <fieldset class="Submitbutton">
                    <legend>Complete Entry</legend>
                    <label for="submit">
                        <input type="submit" name="Entry" id="submit" value="Submit">
                    </label>
                </fieldset>
            </form>
            
        </main>
        <!--Of course footer is included everywhere.-->
        <footer>
            <h2>This is for contact information</h2>
        </footer>

        <script src="../../javascript/form_display.js"></script>

    </body>
</html>