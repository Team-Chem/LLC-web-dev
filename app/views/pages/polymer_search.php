<?php
    $title = 'Search';
    include "header.php";
?>
        <header>
            <h1>Polymer Search</h1>
        </header>
        <?php
            if(isset($_SESSION['status'])){
                ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert" id="color">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" color="green" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <?php echo $_SESSION['status'];?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>
        <p id="search-description">Pick something to search by and then search for it!</p>
        <div id="search-center">
            <form class="search-form justify-content-md-center" action="polymer_search_results.php" method="POST">
                <div class="input-group mb-3 w-50 mx-auto p-2 justify-center">
                    <select name="SelectedTable">
                        <option value="" disabled selected>Search By</option>
                        <option value="polymer_name">Polymer Name</option>
                        <option value="temperature">Temperature</option>
                        <option value="pressure">Pressure</option>
                        <option value="flow_rate">Flow Rate</option>
                        <option value="injected_volume">Injected Volume</option>
                        <option value="detector">Detector</option>
                        <option value="solvent">Solvent</option>
                        <option value="email">User's Email</option>
                        <option value="doi">DOI Number/Url</option>
                        <option value="particle_diameter">Particle Diameter</option>
                        <option value="pore_size">Pore Size</option>
                        <option value="column_dimension">Column Length</option>
                        <option value="column_name">Column name</option>
                    </select>
                    <input type="text" class="form-control" name="search-bar" aria-label="Text input with dropdown button">
                    <button type="submit" class="btn btn-primary" name="submit-search">Search</button>
                </div>
            <!--<input type="text" name="search-bar" id="top-search">
                <button type="submit" class="btn btn-secondary" name="submit-search">Search</button>-->
            </form>
        </div>

        <div class="table-container" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">
            <?php 
                $sql = "SELECT* FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
                WHERE user.user_id = polymer.fk_user_polymer_id AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                AND polymer.polymer_id = reference.reference_id;";
                // AND user.id=session variable id
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if($queryResults > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<table class='table table-dark';>
                        <thead>
                          <tr>
                            <th scope='col' colspan='2'>Polymer</th>
                            <th scope='col' colspan='2'>Mobile Phase</th>
                            <th scope='col' colspan='2'>Stationary Phase</th>
                            <th scope='col' colspan='2'>Chromatography Conditions</th>
                            <th scope='col' colspan='2'>DOI</th>
                            <th scope='col' colspan='2'>Documentation</th>
                            <th scope='col' colspan='2'>User</th>
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
                            <th scope='row' rowspan = '6'>Email</th>
                            <td>". $row['email']. "</td>
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
            ?>
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>