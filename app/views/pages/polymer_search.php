<?php 
    include "header.php";
?>
        <header>
            <h1>Search</h1>
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
        <p id="search-description">Enter in a key word to search for such as the polymer name, or the temperature number</p>
        <form class="search-form" action="polymer_search_results.php" method="POST">
            <input type="text" name="search-bar" id="top-search"> 
            <button type="submit" class="btn btn-secondary" name="submit-search">Search</button>
        </form>

        <div class="table-container" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">
            <?php 
                $sql = "SELECT* FROM polymer";
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
            ?>
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>