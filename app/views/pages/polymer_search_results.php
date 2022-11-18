<?php
    $title = 'Search Results';

    include ("header.php");

    //$_SESSION['submit-search'] = $_POST['submit-search'];


    /*if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 10;
    $start_from = ($page-1)*10; */
    
    ?>
        <!--<div class="table-container" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">-->
            <?php 

                foreach($_POST['multi-search-bar'] as $search_input){
                    $search_input = trim($search_input);
                }

                //This checks for the submission button to be triggered.
                if (isset($_POST['submit-search'])){
                    #$search = mysqli_real_escape_string($conn, $_POST['search-bar']);
                    $sql;
                    $results;
                    #$found_rows = array();
                    $search = $_POST['search-bar'];

                    $sql = "SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND polymer_name LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND temperature LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND pressure LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND flow_rate LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND injected_volume LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND solvent LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND email LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND doi LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND particle_diameter LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND pore_size LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND column_dimension LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND column_name LIKE '%$search%'
                    UNION ALL
                    SELECT*
                    FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                    WHERE user.user_id = polymer.fk_user_polymer_id 
                    AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                    AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                    AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                    AND polymer.polymer_id = reference.reference_id 
                    AND composition LIKE '%$search%'
                    ORDER BY polymer_name 
                    DESC LIMIT $start_from, $num_per_page;";

                    $results = mysqli_query($conn, $sql);

                    $queryResults = mysqli_num_rows($results);

                    echo "<p class='text-center'>
                            There are ".$queryResults." result(s).
                        </p>";

                    if($queryResults > 0) {
                        //echo "Results triggered";
                        while($row = mysqli_fetch_array($results)) {
                            echo " 
                            <div id='tid$ind_table_id'>
                            <table class='table table-striped table-dark table-responsive p-25'>
                            <thead>
                            <tr>
                                <th scope='col' colspan='2'>Polymer</th>
                                <th scope='col' colspan='2'>Mobile Phase</th>
                                <th scope='col' colspan='2'>Stationary Phase</th>
                                <th scope='col' colspan='2'>Chromatography Conditions</th>
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
                            <thead>
                                </tr>
                                    <th scope='col' colspan='2'>DOI</th>
                                    <th scope='col' colspan='2'>Documentation</th>
                                    <th scope='col' colspan='2'>User</th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='row' rowspan = '6'>URL</th>
                                    <td><a href=". $row['doi'] ."> ". $row['doi']. "</a></td>
                                    <th scope='row' rowspan = '6'>Ref</th>
                                    <td>". $row['document']. "</td>
                                    <th scope='row' rowspan = '6'>Email</th>
                                    <td>". $row['email']. "</td>
                                </tr>
                            </tbody>
                        </table></div>";
                        $table_id[$ind_table_id] = 'tid'.$ind_table_id;
                        $ind_table_id = $ind_table_id + 1;
                        }
                    }
                    else {
                        echo "There were no search results.";
                    }
                }
                else if(isset($_POST['submit-multi-search'])){
                    $_array1 = $_POST['multi-SelectedTable'];
                    $_array2 = $_POST['multi-search-bar'];

                    $sql;
                    $results;
                    $found_rows = array();
                    /* This is for debugging purposes.
                    echo "Made it before the query ";
                    echo "$_array1[0] ";
                    echo "$_array2[0] ";
                    */
                    /*echo "Column Name: $_array1[0] ";
                    echo "Column Name2: $_array1[1] ";
                    echo "Search Name: $_array2[0] ";
                    echo "Search Name2: $_array2[1] ";*/

                    for($i = 0; $i < sizeof($_array1); $i++){
                        for($j = 0; $j < sizeof($_array2); $j++){
                            if($i == $j){
                               $sql = "SELECT*
                                FROM polymer, mobile_phase, chromatography_condition, stationary_phase, reference, user 
                                WHERE user.user_id = polymer.fk_user_polymer_id 
                                AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                                AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                                AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                                AND polymer.polymer_id = reference.reference_id
                                AND $_array1[$i] LIKE '%$_array2[$j]%'
                                ORDER BY polymer_name
                                /*DESC LIMIT $start_from, $num_per_page*/;";
                                $results = mysqli_query($conn, $sql);
                            }
                        }
                    }

                    $queryResults = mysqli_num_rows($results);

                    echo "<div class='alert alert-info' role='alert'>
                            There are ".$queryResults." results!
                        </div>";

                    if($queryResults > 0) {
                        //echo " Results triggered";
                        while($row = mysqli_fetch_array($results)) {
                            echo " 
                            <div id='tid$ind_table_id'>
                            <table class='table table-striped table-dark table-responsive p-25'>
                            <thead>
                            <tr>
                                <th scope='col' colspan='2'>Polymer</th>
                                <th scope='col' colspan='2'>Mobile Phase</th>
                                <th scope='col' colspan='2'>Stationary Phase</th>
                                <th scope='col' colspan='2'>Chromatography Conditions</th>
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
                            <thead>
                                </tr>
                                    <th scope='col' colspan='2'>DOI</th>
                                    <th scope='col' colspan='2'>Documentation</th>
                                    <th scope='col' colspan='2'>User</th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='row' rowspan = '6'>URL</th>
                                    <td><a href=". $row['doi'] ."> ". $row['doi']. "</a></td>
                                    <th scope='row' rowspan = '6'>Ref</th>
                                    <td>". $row['document']. "</td>
                                    <th scope='row' rowspan = '6'>Email</th>
                                    <td>". $row['email']. "</td>
                                </tr>
                            </tbody>
                        </table></div>";
                        $table_id[$ind_table_id] = 'tid'.$ind_table_id;
                        $ind_table_id = $ind_table_id + 1;
                        }
                    }
                    else {
                        echo "There were no search results.";
                    }
                }
                else {
                    echo "Something went wrong!";
                }
                //echo "made it here";
            ?>
            <button class="back" style="position: relative; left: 45%; background-color: black; color: white;" type="submit" value="Go Back" onclick="history.back()">Go Back</button>
        <!--</div>-->
       <!-- <div class="prev_next">
            
        </div>-->
        <?php
            include "footer.php";
        ?>
    </body>
</html>