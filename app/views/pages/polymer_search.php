<?php 

    include "header.php";

    //These file uses the concept of pagination to allow the page to only display 10 items per page.
    //I also allow the user to have a next and previous option.
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 10;
    $start_from = ($page-1)*10;
    
    

    #$query = "select * from polymer limit $start_from,$num_per_page";
    //This just queries entry out of the db and orders them by polymer name and has a descending limit
    //using the pagination php variables.
    $query = "SELECT* 
              FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
              WHERE user.user_id = polymer.fk_user_polymer_id 
              AND polymer.polymer_id = mobile_phase.mobile_phase_id 
              AND polymer.polymer_id = stationary_phase.stationary_phase_id 
              AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
              AND polymer.polymer_id = reference.reference_id
              ORDER BY polymer_name 
              DESC LIMIT $start_from, $num_per_page;";

    #This second query is just so that I can the total amount of rows from the db.
    $query2 = "SELECT* 
        FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
        WHERE user.user_id = polymer.fk_user_polymer_id 
        AND polymer.polymer_id = mobile_phase.mobile_phase_id 
        AND polymer.polymer_id = stationary_phase.stationary_phase_id 
        AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
        AND polymer.polymer_id = reference.reference_id;";

    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    $total = mysqli_num_rows($result2);
    //I used this table id to test that tables were actually the correct ones.
    $table_id = array();
    $ind_table_id = 0;

?>

<header>
    <h1>Polymer Search</h1>
</header>
    <?php
        //This condition responds to the status on the polymer insert file.
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
        <!--Not currently in use FIXME -->
        <!-- this is supposed to be the response from the polymer search results page but this is the only session status
        that has refused to work properly. I believe it has something to do with communicating with too many pages. -->
        <?php
            if(isset($_SESSION['search-status'])){
                ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert" id="color">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" color="green" aria-label="Error:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <?php echo $_SESSION['search-status'];?>
                        </div>
                    </div>
                <?php
                unset($_SESSION['search-status']);
            }
        ?>  

<form class="search-form" action="polymer_search_results.php" method="POST">
    <!--This uses a form to submit a general keyword search -->
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" name="search-bar" placeholder="Enter keyword" required>
                <button type="submit" class="button-x btn btn-primary" name="submit-search">Search</button>
            </div>
        </div>
    </div>
</form>

<div class="box">
    <p class="float-right" style="margin-right: 25%;">Use this feature to create more advanced searches. <a class="button" href="#popup1">Advanced</a></p>
    <p class="float-left" style="margin-left: 15%;" >Search total <?php echo "$total"; ?></p>
</div>
<!--This section is for the more advanced search which allows the user to try and narrow there search by 12 different inputs -->
<div id="popup1" class="overlay">
    <div class="popup text-center">
        <h2>Advanced Search Inputs</h2>
        <a class="close" href="#">&times;</a>
        <div class="content text-center">
            <form class="search-form text-center" action="polymer_search_results.php" method="POST">
                <p class="text-center" style="color: #202b38;">Add additional search fields!</p>
                    <div id="inputs" class="text-center">
                        <div class="input-group w-50" style="margin: 12px auto;">
                            <select class="" name="multi-SelectedTable[]" style="background-color: #161f27; color: white;" required>
                                <option value="" disabled selected>Field</option>
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
                                <input type="text" class="form-control m-input" name="multi-search-bar[]" style="background-color: #161f27; color: white;" required> 
                                <!--<button class="btn btn-danger" id="DeleteRow" type="button">-->
                                <!--<i class="bi bi-trash"></i> Delete</button>-->
                        </div>
                    </div>
                    <div id="newinput"></div>
                    <button id="rowAdder" type="button"
                        class="btn btn-secondary">
                        <span class="bi bi-plus-square-dotted">
                        </span> ADD
                    </button>
                            <!--<input type="text" name="search-bar" id="top-search">-->
                    <button type="submit" class="btn btn-primary" name="submit-multi-search">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="search-page-container">
    <div class="entries">
        <?php  while($row = mysqli_fetch_assoc($result)) {
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

            </div>
            <div class="prev_next">
            <?php 
                    //This is to get the query for the following pages.
                    $pr_query = "SELECT* 
                                FROM user, polymer, mobile_phase, stationary_phase, chromatography_condition, reference
                                WHERE user.user_id = polymer.fk_user_polymer_id 
                                AND polymer.polymer_id = mobile_phase.mobile_phase_id 
                                AND polymer.polymer_id = stationary_phase.stationary_phase_id 
                                AND polymer.polymer_id = chromatography_condition.chromatography_condition_id
                                AND polymer.polymer_id = reference.reference_id;";

                    $pr_result = mysqli_query($conn,$pr_query);
                    $total_record = mysqli_num_rows($pr_result);
                    
                    $total_page = ceil($total_record/$num_per_page);

                    if($page>1)
                    {
                        echo "<a href='polymer_search.php?page=".($page-1)."' class='btn btn-secondary mx-1'>Previous</a>";
                    }

                    /*$j = 0;
                    $k = 1;
                    for($i=1;$i<$total_page;$i++)
                    {*/
                    echo "<a href='polymer_search.php?page=1' class='btn btn-secondary mx-1'>First</a>";
                        /*}
                        $j = $j + 1;
                        $k = $k + 1;
                    }*/
                    echo "<a href='polymer_search.php?page=".$total_page."' class='btn btn-secondary mx-1'>Last</a>";

                    if($page != $total_page)
                    {
                        echo "<a href='polymer_search.php?page=".($page+1)."' class='btn btn-secondary mx-1'>Next</a>";
                    }
            
            ?>
            </div>
            <?php 
                include "footer.php";
            ?>
        </div>
        <script>
            //This is uses JQuery to add and delete the input boxes for the multi search option.
            let iteration = 0;
            let num = document.querySelectorAll("#inputs").length;
            $("#rowAdder").click(function () {
                if(iteration < 11){
            newRowAdd =
            " <div id='row' class='input-group w-50' style='margin: 12px auto;'>" +
                            "<select class='' name='multi-SelectedTable[]' style='background-color: #161f27; color: white;'>" +
                                "<option value='' disabled selected>Field</option>" +
                                "<option value='polymer_name'>Polymer Name</option>" +
                                "<option value='temperature'>Temperature</option>" +
                                "<option value='pressure'>Pressure</option>" +
                                "<option value='flow_rate'>Flow Rate</option>" +
                                "<option value='injected_volume'>Injected Volume</option>" +
                                "<option value='detector'>Detector</option>" +
                                "<option value='solvent'>Solvent</option>" +
                                "<option value='email'>User's Email</option>" +
                                "<option value='doi'>DOI Number/Url</option>" +
                                "<option value='particle_diameter'>Particle Diameter</option>" +
                                "<option value='pore_size'>Pore Size</option>" +
                                "<option value='column_dimension'>Column Length</option>" +
                                "<option value='column_name'>Column name</option>" +
                            "</select>" +
                                "<input type='text' class='form-control m-input' name='multi-search-bar[]' style='background-color: #161f27; color: white;'>" +
                                "<button class='btn btn-danger' id='DeleteRow' type='button'>" +
                                "<!--<i class='bi bi-trash'></i>--> Delete</button>";
            $('#newinput').append(newRowAdd);
            iteration = iteration + 1;
                }
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
            iteration = iteration - 1;
        })
        
        </script>
    </body>
</html>