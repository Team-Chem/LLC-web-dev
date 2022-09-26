<?php


$host = "localhost";
$dbname = "polymer";
$username = "root";
$password = "";


$conn = mysqli_connect(hostname: $host,
               username: $username,
               password: $password,
               database: $dbname);


               if (mysqli_connect_errno()) {
    die("There was a connection error: " . mysqli_connect_error());
    exit();
}


$sql = "SELECT * FROM polymer, mobile_phase, stationary_phase, conditions, investigations, document";
$result = mysqli_query($conn, $sql);
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>Polymer Filter</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Poly_Name</th>
                <th>Critical_High</th>
                <th>Critical_Low</th>
                <th>Molar_Masses</th>
                <th>Used_Sample</th>
                <th>Solvent</th>
                <th>NonSolvent</th>
                <th>Particle_Diameter</th>
                <th>Pore_Size</th>
                <th>Column_Dimension</th>
                <th>Temperature</th>
                <th>Pressure</th>
                <th>Flow_Rate</th>
                <th>Inj_Volume</th>
                <th>Detector</th>
                <th>Reference</th>
                <th>DocumentCol</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Poly_Name'];?></td>
                <td><?php echo $rows['Critical_High'];?></td>
                <td><?php echo $rows['Critical_Low'];?></td>
                <td><?php echo $rows['Molar_Masses'];?></td>
                <td><?php echo $rows['Used_Sample'];?></td>
                <td><?php echo $rows['Solvent'];?></td>
                <td><?php echo $rows['NonSolvent'];?></td>
                <td><?php echo $rows['Particle_Diameter'];?></td>
                <td><?php echo $rows['Pore_Size'];?></td>
                <td><?php echo $rows['Column_Dimension'];?></td>
                <td><?php echo $rows['Temperature'];?></td>
                <td><?php echo $rows['Pressure'];?></td>
                <td><?php echo $rows['Flow_Rate'];?></td>
                <td><?php echo $rows['Inj_Volume'];?></td>
                <td><?php echo $rows['Detector'];?></td>
                <td><?php echo $rows['Reference'];?></td>
                <td><?php echo $rows['DocumentCol'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>