<?php 

    include ("header.php");

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 5;
    $start_from = ($page-1)*5;
    
    

    #$query = "select * from polymer limit $start_from,$num_per_page";
    $query = "SELECT* 
              FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
              WHERE user.user_id = polymer.fk_user_polymer_id 
              AND polymer.polymer_id = mobile_phase.mobile_phase_id 
              AND polymer.polymer_id = stationary_phase.stationary_phase_id 
              AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
              AND polymer.polymer_id = reference.reference_id
              ORDER BY polymer_name 
              DESC LIMIT $start_from, $num_per_page;";

    $result = mysqli_query($conn,$query);

?>
      <?php  while($row = mysqli_fetch_assoc($result)) {
                echo "<table class='table table-striped bg-white';>
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
                            ?>

        <?php 
        
                $pr_query = "SELECT* 
                             FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
                             WHERE user.user_id = polymer.fk_user_polymer_id 
                             AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                             AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                             AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                             AND polymer.polymer_id = reference.reference_id;";

                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);

                if($page>1)
                {
                    echo "<a href='TestPagination.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='TestPagination.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='TestPagination.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
        
    </body>
</html>