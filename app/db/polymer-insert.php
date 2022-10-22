<?php
    session_start();
    include_once 'Connection.php';
    include 'polymer_entry.php';

    session_start();
    //The Polymer Data Entry names
    $PolymerName = $_GET['PolyName'];
    $CriticalHigh = $_POST['CriticalHigh'];
    $CriticalLow = $_POST['CriticalLow'];

    //The Mobile Phase Data names $_POST[''];
    $space = " ";
    $Solvent = $_POST['Solvents'];
    $Composition = $_POST['Composition'] .= $space .= $_POST['type'];

    //The Stationary Phase names
    $ParticleDiameter = $_POST['ParticleDiameter'];
    $PoreSize = $_POST['PoreSize'];
    $ColumnDimension = $_POST['ColumnDimension'];
    $ColumnName = $_POST['ColumnName'];

    //The Condition names
    $Temperature = $_POST['Temperature'];
    $Pressure = $_POST['Pressure'];
    $FlowRate = $_POST['FlowRate'];
    $InjVolume = $_POST['InjectionVolume'];
    $Detector = $_POST['Detector'];

    //The References names
    $Investigations = $_POST['References'];

    //The Upload names
    $UploadDoc = $_POST['Document'];

    $sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low) 
    VALUES ('$PolymerName', '$CriticalHigh', '$CriticalLow');";

    $query_success1 = mysqli_query($conn, $sql);

    $sql = "INSERT INTO mobile_phase (Solvent, NonSolvent)
    VALUES ('$Solvent', '$Composition');";

    mysqli_query($conn, $sql);

    $sql = "INSERT INTO stationary_phase (Particle_Diameter, Pore_Size, Column_Dimension)
    VALUES ('$ParticleDiameter', '$PoreSize', '$ColumnDimension');";

    mysqli_query($conn, $sql);

    $sql = "INSERT INTO conditions (Temperature, Pressure, Flow_Rate, Inj_Volume, Detector)
    VALUES ('$Temperature', '$Pressure', '$FlowRate', '$InjVolume', '$Detector');";

    mysqli_query($conn, $sql);

    $sql = "INSERT INTO investigations (Reference)
    VALUES ('$Investigations');";

    mysqli_query($conn, $sql);

    $sql = "INSERT INTO document (DocumentedCol)
    VALUES ('$UploadDoc');";

    mysqli_query($conn, $sql);
    if(CriticalHigh < CriticalLow){
        echo "The Molar high can not be smaller than the molar low";
        header("Location: ../polymer_entry.php");
    }

    if($query_success1) {
        $_SESSION['status'] = "Data inserted successfully";
        header("Location: ../index.php");
    }
    else {
        echo "Something went wrong";
        header("Location: ../polymer_entry.php");
    }


