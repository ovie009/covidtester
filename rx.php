<?php
    include_once "./database_connect.php";        
    if (isset($_GET['temperature'])) {
        # code...
        $temperature = $_GET['temperature'];
        $heartRate = $_GET['heartRate'];
        $oxygenLevel = $_GET['oxygenLevel'];
        $patientName = $_GET['patientName'];

        $sql = "INSERT INTO `readings` (`fullname`, `temperature`, `heart_rate`, `oxygen_level`, `time_stamp`) VALUES ('".$patientName."', '".$temperature."', '".$heartRate."', '".$oxygenLevel."', current_timestamp())";
        mysqli_query($connect, $sql);
        echo "Data uploaded to database Successfully!";
    } else {
        # code...
    }
    

?>