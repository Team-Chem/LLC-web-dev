<?php
    // Start the session and include the header
    session_start();
    include('header.php');

    //Get the user ID number from the session variable
    $usr = $_SESSION['user_id_num'];

    // Set the 'polymer_id' session variable to the result of a query that selects the 'polymer_id'
    $_SESSION['polymer_id'] = "SELECT polymer.polymer_id
    FROM user, polymer
    WHERE user_id = fk_user_polymer_id
    AND user_id = '$usr'";

    // from the 'user', 'polymer' tables where the 'user_id' matches the 'fk_user_polymer_id' and
    // the 'user_id' is equal to the current user's ID number
    $query = "SELECT *
              FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
              WHERE user.user_id = polymer.fk_user_polymer_id 
                AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                AND polymer.polymer_id = reference.reference_id
                AND user_id = ?
              ORDER BY polymer_name";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind the $usr variable as a parameter
    mysqli_stmt_bind_param($stmt, "i", $usr);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);
    ?>

    

        <form method="POST">
             <!-- Loop through each record in the result set -->
            <?php  while($row = mysqli_fetch_assoc($result)) {
                // Store the current polymer ID in the $poly_id variable
                $poly_id = $row['polymer_id'];

            // If the request method is POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Store the current polymer ID in the $delete_id variable
                    $delete_id = $poly_id;
                    // Define the query that deletes the record with the matching polymer ID
                    $sql = "DELETE FROM polymer
                            WHERE polymer_id = '$delete_id';";
                    // Execute the query and store the result in the $query_deletion_success variable
                    $query_deletion_success = mysqli_query($conn, $sql);

                    // Check if the delete operation was successful
            if ($query_deletion_success) {
                // Store a success message in the session
                $_SESSION['message'] = "Data deleted successfully";
            } else {
                // Store an error message in the session
                $_SESSION['message'] = "Data deletion failed!";
            }       
                // Redirect to the user_data.php page and pass the message as a query parameter
            header("Location: user_data.php?message=" . urlencode($_SESSION['message']));
            exit;
            }

            // Check if the message query parameter is set
            if (isset($_GET['message'])) {
                // Store the message in the session
                $_SESSION['message'] = $_GET['message'];
            }
                        echo " 
                        <div id='tid$ind_table_id'>
                        <table class='table table-striped table-dark table-responsive p-25'>
                        <thead>
                        
                        <tr>
                            <th scope='col' colspan='2'>Polymer</th>
                            <th scope='col' colspan='2'>Mobile Phase</th>
                            <th scope='col' colspan='2'>Stationary Phase</th>
                            <th scope='col' colspan='2'>Chromatography Conditions</th>
                            <th scope='col' colspan='2'>DOI</th>
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
                            <th scope='row'>URL</th>
                            <td><a href=". $row['doi'] ."> ". $row['doi']. "</a></td>
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
                            <td><button type='submit' class='btn btn-danger' name='$poly_id'>Delete</button></td>
                        <thead>
                            </tr>
                                
                            <tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table></div>";
                    $table_id[$ind_table_id] = 'tid'.$ind_table_id;
                    $ind_table_id = $ind_table_id + 1;
                }
                ?>
            </div>
        </form>

        <!-- Display the message stored in the session, if any -->
        <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo ($_SESSION['message'] == "Data deleted successfully") ? "success" : "danger"; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>

        <?php
            // Clear the message from the session
            unset($_SESSION['message']);
        ?>
        
        <!-- checks if "delete" button is clicked on, if clicked on, deleted polymer_id associated" -->
        <?php
            include "footer.php";
        ?>
    </body>
</html>