<?php 
    include "header.php";
?>
        <header>
            <h1>Search Results</h1>
        </header>
        <div id="needABack">
            <button type="button" class="back btn btn-danger" onclick="history.go(-1)">Back</button>
        </div>
        <div class="table-container" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">
            <?php
                //echo $_POST['search-bar'];
                $value = $_POST['SelectedTable'];
                if ($value == "polymer_name") {
                    $table_column = "polymer_name";
                    echo "Got the name!";
                }
                else if ($value == "temperature") {
                    $table_column = "temperature";
                }
                else if ($value == "pressure") {
                    $table_column = "pressure";
                }
                else if ($value == "flow_rate") {
                    $table_column = "flow_rate";
                }
                else if ($value == "injected_volume") {
                    $table_column = "injected_volume";
                }
                else if ($value == "detector") {
                    $table_column = "detector";
                }
                else if ($value == "solvent") {
                    $table_column = "solvent";
                }
                else if ($value == "user") {
                    $table_column = "email";
                }
                else if ($value == "particle_diameter") {
                    $table_column = "particle_diameter";
                }
                else if ($value == "pore_size") {
                    $table_column = "pore_size";
                }
                else if ($value == "column_dimension") {
                    $table_column = "column_dimension";
                }
                else if ($value == "column_name") {
                    $table_column = "column_name";
                }
                else if ($value == "doi") {
                    $table_column = "doi";
                }
                
                if (isset($_POST['submit-search']) && trim($_POST['search-bar']) != ""){
                    $search = mysqli_real_escape_string($conn, $_POST['search-bar']);
                    $sql = " SELECT * FROM polymer, mobile_phase, chromatography_condition, stationary_phase,
                    reference, user WHERE user.user_id = polymer.fk_user_polymer_id AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id AND $table_column LIKE '%$search%';";
                    $results = mysqli_query($conn, $sql); 

                    $queryResults = mysqli_num_rows($results);

                    echo "<div class='alert alert-info' role='alert'>
                            There are ".$queryResults." results!
                        </div>";

                    //echo "Made it here";

                    if($queryResults > 0) {
                        while($row = mysqli_fetch_assoc($results)) {
                            echo "<table class='table table-dark';>
                            <thead>
                              <tr>
                                <th scope='col' colspan='2'>Polymer</th>
                                <th scope='col' colspan='2'>Mobile Phase</th>
                                <th scope='col' colspan='2'>Stationary Phase</th>
                                <th scope='col' colspan='2'>Chromatography Conditions</th>
                                <th scope='col' colspan='2'>DOI</th>
                                <th scope='col' colspan='2'>Documentation</th>
                              </tr>
                            </thead>
                            <tbody class='table-group-divider'>
                              <tr>
                                <th scope='row'>Name</th>
                                <td>". $row['polymer_name']. "</td>
                                <th scope='row'>Solvent(s)</th>
                                <td>". $row['solvent']."</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['particle_diameter']. "</td>
                                <th scope='row'>Temperature</th>
                                <td>". $row['temperature']. "</td>
                                <th scope='row' rowspan = '6'>URL</th>
                                <td><a href=". $row['doi'] ."> ". $row['doi']. "</a></td>
                                <th scope='row' rowspan = '6'>Ref</th>
                                <td>". $row['document']. "</td>
                             </tr>
                             <tr>
                                <th scope='row' rowspan='5'>Molar High-Low</th>
                                <td rowspan='5'>". $row['molar_mass_low']. "kD - ". $row['molar_mass_high'] ."kD</td>
                                <th scope='row' rowspan='5'>Composition</th>
                                <td rowspan='5'>". $row['composition']. "</td>
                                <th scope='row'>Pore Size</th>
                                <td>". $row['pore_size']. "</td>
                                <th scope='row'>Pressure</th>
                                <td>". $row['pressure']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Column Dimension</th>
                                <td>". $row['column_dimension']. "</td>
                                <th scope='row'>Flow Rate</th>
                                <td>". $row['flow_rate']. "</td>
                            </tr>
                            <tr>
                                <th scope='row' rowspan='3'>Column Name</th>
                                <td rowspan='3'>". $row['column_name']. "</td>
                                <th scope='row'>Injected Volume</th>
                                <td>". $row['injected_volume']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Detector</th>
                                <td>". $row['detector']. "</td>
                            </tr>
                            </tbody>
                          </table>"; 
                        }
                    }
                    else {
                        echo "There were no search results. $table_column";
                    }
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'>
                            There are 0 results!
                        </div>";
                }
            ?>
        </div>
        <div id="needABack">
            <button type="button" class="back btn btn-danger" onclick="history.go(-1)">Back</button>
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>