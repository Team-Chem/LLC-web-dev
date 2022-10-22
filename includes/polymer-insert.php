<?php
    session_start();
    include_once 'Connection.php';
    
    /*
        All of the variables that were assigned on the polymer-preview page.

        $_SESSION['poly']
        $_SESSION['critHigh']
        $_SESSION['critLow']
        $_SESSION['solvents']
        $_SESSION['composition']
        $_SESSION['type']
        $_SESSION['particleDiameter']
        $_SESSION['poreSize']
        $_SESSION['columnDimension']
        $_SESSION['columnName']
        $_SESSION['temperature']
        $_SESSION['pressure']
        $_SESSION['flowRate']
        $_SESSION['injectionVolume']
        $_SESSION['Detector']
        $_SESSION['References']
        $_SESSION['document']

    */

    $PolymerName = $_SESSION['poly'];
    $MolarHigh = $_SESSION['critHigh'];
    $MolarLow = $_SESSION['critLow'];
    $Solvents = $_SESSION['solvents'];
    $Composition = $_SESSION['composition'];
    $ParticleDiameter = $_SESSION['particleDiameter'];
    $PoreSize = $_SESSION['poreSize'];
    $ColumnDimension = $_SESSION['columnDimension'];
    $ColumnName = $_SESSION['columnName'];
    $Temperature = $_SESSION['columnName'];
    $Pressure = $_SESSION['pressure'];
    $FlowRate = $_SESSION['flowRate'];
    $InjVolume = $_SESSION['injectionVolume'];
    $Detector = $_SESSION['Detector'];
    $DOI = $_SESSION['References'];
    $Upload = $_SESSION['document'];
    $Type = $_SESSION['type'];



    //Checking if we got the value with the crud method.
    /*if(isset($PolymerName)){
        echo "[$PolymerName was set with the post]\n";
    }
    else{
        echo "[The variables are not setting!]\n";
    }

    //This is to test the connection status of the server.
    switch (connection_status())
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

    //This should insert into the db it has before.
    $sql = "INSERT INTO polymer (Poly_Name, Critical_High, Critical_Low, Molar_Masses, Used_Sample) 
    VALUES ('$PolymerName', '12', '1', '7889', 'Night');";

    $query_success1 = mysqli_query($conn, $sql);


    //The following items are for if you are having problems with entering the data into the db.
    //Checking if the insert errored or not.
   /*if(isset($sql)){
        echo "[The insert statement was successfully assigned to sql variable.]\n";
    }*/

    //Double checking the connecion by checking the connection variable that should have been included in this file.
    /*if(isset($conn)){
        echo "[The connection variable should be usable.]\n";
    }
    else {
        echo "[There is something wrong with the connection variable.]\n";
    }

    mysqli_query($conn, $sql);*/

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
    /*if(isset($query1)) {
        echo "Connection and Query were both successfull.\n";
    }
    else {
        echo "The query with connection is not working!\n";
    }*/

    if($query_success1) {
        $_SESSION['status'] = "Data inserted successfully";
        header("Location: ../polymer_search.php");
    }
    else {
        echo "Something went wrong";
        header("Location: ../polymer_entry.php");
    }


