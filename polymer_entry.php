<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data entry page</title>
        <!-- 
            LCCC - Data Entry
            Filename: polymer_entry.html

            Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
            Date: 9/19/2022
            References: HTML5 and CSS3 Illustrated, W3 Schools
        -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <script src="respond.min.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="icon" sizes="192x192" href="images/android.png">

    </head>

    <body>

        <nav class="default-style">
            <ul>
                <li><a href="default.asp">Home</a></li>
                <li><a href="polymer_search.html" target="_blank">Search</a></li>
                <li><a href="entry.html">New Entry</a></li>
                <li><a href="about.asp">About</a></li>
                <li><a href="sign_in.html">Account</a></li>
            </ul>
        </nav>
        <header>
            <h1>LCCC</h1>
        </header>

        <!-- Using the article here for structuring-->
        <maine id="start">
            <h2>Polymer Entry</h2>
            <!-- Nesting everything in a wrapper just in case I need outside styling. -->
            <div id="form-wrapper">
                <!--Start of Forms-->
                <form id="for-submit" action="includes/polymer-insert.php" method="POST">
                    <!-- This is the first form option. The action is supposed to post this form information into the database. -->
                    <fieldset id="polymer-data-form">
                        <p class="form-instruction">Please enter the required fields</p>
                        <fieldset class="polymerEntry">
                            <legend>Polymer Data</legend>
                            <label for="polyName" class="required">
                                Polymer Name
                                <input type="text" name="PolymerName" id="polyName" placeholder="Polybutadiene" required>
                            </label>
                            <!--Pretty standard input tactics.-->
                            <label for="critHigh" class="required">
                                Critical High
                                <input type="number" step="0.000000001" name="CriticalHigh" id="critHigh" required>
                            </label>
                            <label for="critLow" class="required">
                                Critical Low
                                <input type="number" step="0.000000001" name="CriticalLow" id="critLow" required>
                            </label>
                            <label for="mass">
                                Molar Masses
                                <input type="number" step="0.000000001" name="Mass" id="mass">
                            </label>
                            <label for="samp">
                                Used Sample
                                <input type="text" name="UsedSample" id="samp">
                            </label>
                            <label for="polySolv" class="required">
                                Polymer Solvent
                                <input type="text" name="PolySolv" id="polySolv" required>
                            </label>
                        </fieldset>
                    </fieldset>

                    <!--Form 2-->
                    <fieldset id="Mobile-phase-form">
                        <fieldset class="MobileEntry">
                            <legend>Mobile Phase Data</legend>
                            <label for="solv" class="required">
                                Solvent
                                <input type="text" name="Solvent" id="solv" required>
                            </label>
                            <label for="nonSolv" class="required">
                                Nonsolvent
                                <input type="text" name="Nonsolvent" id="nonSolv" required>
                            </label>
                        </fieldset>
                    </fieldset>

                    <!--Form 3-->
                    <fieldset id="stationary-phase-form">
                        <fieldset class="staionaryEntry">
                            <legend>Stationary Phase Data</legend>
                            <label for="particlediam">
                                Particle Diameter
                                <input type="number" step="0.000000001" name="ParticleDiameter" id="particlediam">
                            </label>
                            <label for="poreSize">
                                Pore sizes
                                <input type="number" step="0.000000001" name="PoreSize" id="poreSize">
                            </label>
                            <label for="columnDim">
                                Column Dimension
                                <input type="number" step="0.000000001" name="ColumnDimension" id="columnDim">
                            </label>
                        </fieldset>
                    </fieldset>

                    <!--Form 4-->
                    <fieldset id="condition-form">
                        <fieldset class="conditions">
                            <legend>Polymer Conditions</legend>
                            <label for="temp" class="required">
                                Temperature
                                <input type="number" step="0.000000001" name="Temperature" id="temp" required>
                            </label>
                            <label for="press">
                                Pressure
                                <input type="number" step="0.000000001" name="Pressure" id="press">
                            </label>
                            <label for="flowRate">
                                Flow Rate
                                <input type="number" step="0.000000001" name="FlowRate" id="flowRate">
                            </label>
                            <label for="injVolume" class="required">
                                Injection Volume
                                <input type="number" step="0.000000001" name="InjectVolume" id="injVolume" required>
                            </label>
                            <label for="detect">
                                Detector
                                <input type="text" name="Detector" id="detect" requred>
                            </label>
                        </fieldset>
                    </fieldset>

                    <!-- Form 5-->
                    <fieldset id="investigation-form">
                        <fieldset class="investigation">
                            <legend>Researchers</legend>
                            <label for="reference">
                                References: 
                                <textarea name="References" id="reference" row="10" cols="30" placeholder="First name Last name"></textarea>
                            </label>
                        </fieldset>
                    </fieldset>

                    <!-- Form 6-->
                    <fieldset id="upload-form">
                        <fieldset class="docUpload">
                            <legend>Additional Documentation</legend>
                            <label for="doc">
                                Upload Document
                                <input type="file" name="FileName" id="doc" accept=".pdf, .doc, .html">
                            </label>
                        </fieldset>
                    </fieldset>
                    <!--Submit Button-->
                    <fieldset class="submitbutton">
                        <input type="submit" id="submit" value="Submit">
                    </fieldset>
                    <!--End of Form-->
                </form>
            </div>
            <div id="prev">
                <h2>Data Preview</h2>
            </div>

            <!-- Start of preview tables -->
            <table class="polymer-data-preview">
                <thead>
                    <tr>
                        <th colspan="2">Polymer Data Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Polymer Name</td>
                        <td class="request-polyName"></td>
                    </tr>
                    <tr>
                        <td>Critical High</td>
                        <td class="request-critHigh"></td>
                    </tr>
                    <tr>
                        <td>Critical Low</td>
                        <td class="request-critLow"></td>
                    </tr>
                    <tr>
                        <td>Molar Mass</td>
                        <td class="request-mass"></td>
                    </tr>
                    <tr>
                        <td>Used Sample</td>
                        <td class="request-samp"></td>
                    </tr>
                    <tr>
                        <td>Polymer Solvent</td>
                        <td class="request-poly-solv"></td>
                    </tr>
                </tbody>
            </table>
            <table class="mobile-phase-preview">
                <thead>
                    <tr>
                        <th colspan="2">Mobile Phase Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Solvent</td>
                        <td class="request-solv"></td>
                    </tr>
                    <tr>
                        <td>Non-Solvent</td>
                        <td class="request-nonsolv"></td>
                    </tr>
                </tbody>
            </table>
            <table class="stationary-phase-preview">
                <thead>
                    <tr>
                        <th colspan="2">Stationary Phase Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Particle Diameter</td>
                        <td class="request-diam"></td>
                    </tr>
                    <tr>
                        <td>Pore Size</td>
                        <td class="request-poresize"></td>
                    </tr>
                    <tr>
                        <td>Column Dimension</td>
                        <td class="request-ColumnDiam"></td>
                    </tr>


                </tbody>
            </table>
            <table class="conditions-preview">
                <thead>
                    <tr>
                        <th colspan="2">Conditions Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Temperature</td>
                        <td class="request-temp"></td>
                    </tr>
                    <tr>
                        <td>Pressure</td>
                        <td class="request-pressure"></td>
                    </tr>
                    <tr>
                        <td>Flow Rate</td>
                        <td class="request-flow"></td>
                    </tr>
                    <tr>
                        <td>Injection Volume</td>
                        <td class="request-inj"></td>
                    </tr>
                    <tr>
                        <td>Detector</td>
                        <td class="request-detect"></td>
                    </tr>
                </tbody>
            </table>

            <table class="reference-preview">
                <thead>
                    <tr>
                        <th colspan="2">Researchers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Names</td>
                        <td class="request-ref"></td>
                    </tr>

                </tbody>
            </table>
            <table class="document-preview">
                <thead>
                    <tr>
                        <th colspan="2">Research Document</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PDF/Doc</td>
                        <td class="request-upload"></td>
                    </tr>
                </tbody>
            </table>
        </maine>
        <!--Of course footer is included everywhere.-->
        <footer>
            <h2>This is for contact information</h2>
        </footer>
        <!--Scripting in my JavaScript file for page functionality. -->
        <script src="forms.js"></script>
    </body>
</html>