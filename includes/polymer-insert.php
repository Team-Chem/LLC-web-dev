<?php
    include_once 'Connection.php';

    //The Polymer Data Entry names
    $PolymerName = $_POST['PolymerName'];
    $CriticalHigh = $_POST['CriticalHigh'];
    $CriticalLow = $_POST['CriticalLow'];
    $Mass = $_POST['Mass'];
    $UsedSample = $_POST['UsedSample'];
    $PolySolv = $_POST['PolySolv'];

    //The Mobile Phase Data names $_POST[''];
    $Solvent = $_POST['Solvent'];
    $NonSolvent = $_POST['Nonsolvent'];

    //The Stationary Phase names
    $ParticleDiameter = $_POST['ParticleDiameter'];
    $PoreSize = $_POST['PoreSize'];
    $ColumnDimension = $_POST['ColumnDimension'];

    //The Condition names
    $Temperature = $_POST['Temperature'];
    $Pressure = $_POST['Pressure'];
    $FlowRate = $_POST['FlowRate'];
    $InjVolume = $_POST['InjectVolume'];
    $Detector = $_POST['Detector'];

    //The References names
    $Investigations = $_POST['References'];

    //The Upload names
    $UploadDoc = $_POST['FileName'];

    $sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low, Molar_Masses, Used_Sample) 
    VALUES ('$PolymerName', '$CriticalHigh', '$CriticalLow', '$Mass', '$UsedSample');";

    mysqli_query($conn, $sql);

    $sql = "INSERT INTO mobile_phase (Solvent, NonSolvent)
    VALUES ('$Solvent', '$NonSolvent');";

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

    header("Location: ../index.html?polymer-insert=success");

