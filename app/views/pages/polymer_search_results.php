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
                if (isset($_POST['submit-search'])){
                    $search = mysqli_real_escape_string($conn, $_POST['search-bar']);
                    $sql = " SELECT * FROM polymer WHERE Poly_Name LIKE '%$search%'";
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
                                <th scope='col' colspan='2'>DOI Number</th>
                                <th scope='col' colspan='2'>Documentation</th>
                              </tr>
                            </thead>
                            <tbody class='table-group-divider'>
                              <tr>
                                <th scope='row'>Name</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Solvents</th>
                                <td>". $row['Poly_Name']."</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                             </tr>
                             <tr>
                                <th scope='row'>Molar High-Low</th>
                                <td>". $row['Critical_Low']. "kD - ". $row['Critical_High'] ."kD</td>
                                <th scope='row'>Composition</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                            </tr>
                            <tr>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                                <th scope='row'>Particle Diameter</th>
                                <td>". $row['Poly_Name']. "</td>
                            </tr>
                            </tbody>
                          </table>"; 
                        }
                    }
                    else {
                        echo "There were no search results.";
                    }
                }
            ?>
        </div>
        <div id="needABack">
            <button type="button" class="back btn btn-danger" onclick="history.go(-1)">Back</button>
        </div>
    </body>
</html>