<?php
    session_start();
    include('header.php');

    $usr = $_SESSION['user_id_num'];

    $_SESSION['polymer_id'] = "SELECT polymer.polymer_id
    FROM user, polymer
    WHERE user_id = fk_user_polymer_id
    AND user_id = '$usr'";

    $query = "SELECT* 
              FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
              WHERE user.user_id = polymer.fk_user_polymer_id 
              AND polymer.polymer_id = mobile_phase.mobile_phase_id 
              AND polymer.polymer_id = stationary_phase.stationary_phase_id 
              AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
              AND polymer.polymer_id = reference.reference_id
              AND user_id = '$usr'
              ORDER BY polymer_name;";

    $result = mysqli_query($conn,$query);
    ?>

    <form method='POST'>
        <?php  while($row = mysqli_fetch_assoc($result)) {
            $poly_id = $row['polymer_id'];
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
                            <td></td>
                            <td><button type='submit' class='btn btn-danger' name='$poly_id'>Delete</button></td>
                        </tr>
                    </tbody>
                </table></div>";
                $table_id[$ind_table_id] = 'tid'.$ind_table_id;
                $ind_table_id = $ind_table_id + 1;

            }
            ?>
        </div>
        </form>
        
        <!-- checks if "delete" button is clicked on, if clicked on, deleted polymer_id associated" -->
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $delete_id = $poly_id;
                    $sql = "DELETE FROM polymer
                            WHERE polymer_id = '$delete_id';";
                    $query_deletion_success = mysqli_query($conn, $sql);
                    header("user_data");

                    if ($query_deletion_success) {
                        $_SESSION['poly_id'] = "Data deleted successfully";
                        }
                        else {
                            $_SESSION['poly_id'] = "Data deletion failed!";
                        }
                    }
        ?>
        <?php
            include "footer.php";
        ?>
    </body>
</html>