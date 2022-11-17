<?php
    session_start();
    include_once 'connection.php';

    $PolymerName = $_SESSION['poly'];
    $MolarHigh = $_SESSION['critHigh'];
    $MolarLow = $_SESSION['critLow'];
    $Solvents = $_SESSION['solvents'];

    //Need to be changed FIXME!
    $Composition = $_SESSION['composition'];

    $ParticleDiameter = $_SESSION['particleDiameter'];
    $PoreSize = $_SESSION['poreSize'];
    $ColumnDimension = $_SESSION['columnDimension'];
    $ColumnName = $_SESSION['columnName'];
    $Temperature = $_SESSION['temperature'];
    $Pressure = $_SESSION['pressure'];
    $FlowRate = $_SESSION['flowRate'];
    $InjVolume = $_SESSION['injectionVolume'];
    $Detector = $_SESSION['Detector'];

    //Needs to be fixed in the db to a varchar
    $DOI = $_SESSION['References'];
    $Upload = $_SESSION['document'];
    $Type = $_SESSION['type'];

    //User id. Need to get the current user
    $id = $_SESSION["user_id_num"];

    //Checking if we got the value with the crud method.
    /*if(isset($PolymerName)){
        echo "[$PolymerName was set with the post]\n";
    }
    else{
        echo "[The variables are not setting!]\n";
    }*/

    //This is to test the connection status of the server.
    /*switch (connection_status())
    {
    case CONNECTION_NORMAL:
      $txt = '[Connection is in a normal state]';
      break;
    case CONNECTION_ABORTED:
      $txt = '[Connection aborted]';
      break;
    case CONNECTION_TIMEOUT:
      $txt = '[Connection timed out]';
      break;
    case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
      $txt = '[Connection aborted and timed out]';
      break;
    default:
      $txt = '[Unknown]';
      break;
    }*/

    //This should insert into the db.
    $sql = "INSERT INTO polymer (polymer_name, molar_mass_high, molar_mass_low, fk_user_polymer_id) 
    VALUES ('$PolymerName', '$MolarHigh', '$MolarLow', $id);";

    $query_success1 = mysqli_query($conn, $sql);
    echo "success on query 1";

    $id = "LAST_INSERT_ID()";

    echo "$Temperature, $Pressure";
    /*if(isset($Pressure) && trim($Pressure) == ''){
        $Pressure = NULL;
        echo " $Pressure";
    }
    if(isset($FlowRate) && trim($FlowRate) == ''){
        $FlowRate = NULL;
        echo " $FlowRate";
    }
    if(isset($InjVolume) && trim($InjVolume) == ''){
        $InjVolume = NULL;
        echo " $InjVolume";
    }
    if(isset($Detector) && trim($Detector) == ''){
        $Detector = NULL;
        echo " $Detector";
    }*/

    $sql = "INSERT INTO chromatography_condition(chromatography_condition_id, temperature, pressure, flow_rate, injected_volume, detector)
    VALUES ($id, '$Temperature', NULLIF('$Pressure', ''), NULLIF('$FlowRate', ''), NULLIF('$InjVolume', ''), NULLIF('$Detector', ''));";

    mysqli_query($conn, $sql);
    echo " success on query 2";

    //echo " $id, $Solvents, $Composition";

    $sql = "INSERT INTO mobile_phase (mobile_phase_id, solvent, composition)
    VALUES ($id, '$Solvents', NULLIF('$Composition', ''));";

    mysqli_query($conn, $sql);

    echo " success on query 3";


    $sql = "INSERT INTO stationary_phase (stationary_phase_id, particle_diameter, pore_size, column_dimension, column_name)
    VALUES ($id, NULLIF('$ParticleDiameter', ''), NULLIF('$PoreSize', ''), NULLIF('$ColumnDimension', ''), NULLIF('$ColumnName', ''));";

    mysqli_query($conn, $sql);

    echo " success on query 4";

    $sql = "INSERT INTO reference (reference_id, document, doi)
    VALUES ($id, 'blob', '$DOI');";

    mysqli_query($conn, $sql);

    echo " success on query 5";

    //The following items are for if you are having problems with entering the data into the db.
    //Checking if the insert errored or not.
   /*if(isset($sql)){
        echo "[The insert statement was successfully assigned to sql variable.]\n";
    }

    else {
        echo "[insert statement did not work]";
    }

    //Double checking the connecion by checking the connection variable that should have been included in this file.
    if(isset($conn)){
        echo "[The connection variable should be usable.]\n";
    }
    else {
        echo "[There is something wrong with the connection variable.]\n";
    }*/

    //mysqli_query($conn, $sql);*/

    //Possibly getting null returns from this connection and query.
    /*if(mysqli_query($conn, $sql) != null){
        echo "[Data should have been entered.]\n";
    }
    else {
        echo "[Data is not being entered through php query function.]";
    }

    mysqli_close($conn);*/

    //FIXME
    //Some probelm here
    /*if(isset($query_success1)) {
        echo "Connection and Query were both successfull.\n";
    }
    else {
        echo "The query with connection is not working!\n";
    }*/

    if($query_success1) {
        $_SESSION['status'] = "Data inserted successfully";
        header("Location: ../app/views/pages/polymer_search.php"); // This line 
    }
    else {
        $_SESSION['status'] = "Data entry failed!";
        header("Location: ../app/views/pages/polymer_entry.php");
    }


