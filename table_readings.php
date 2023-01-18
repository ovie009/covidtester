<?php
    include_once "./database_connect.php";  

    $query = "SELECT * FROM readings ORDER BY time_stamp DESC LIMIT 10";
    $result = mysqli_query($connect, $query);

    ?><tr>
        <th>Patient</th>
        <th>Heart Rate (BPM)</th>
        <th>Oxygen Level (%0) </th>
        <th>Temperature (<sup>0</sup>C) </th>
        <th>Datetime</th>
    </tr><?php
    while($row = mysqli_fetch_assoc($result)) {
        $fullName = $row['fullname'];
        $temperature = $row['temperature'];
        $heartRate = $row['heart_rate'];
        $oxygenLevel = $row['oxygen_level'];
        $timeStamp = $row['time_stamp'];
        ?><tr>
            <td> <?php echo $fullName; ?> </td>
            <td> <?php echo $heartRate; ?> </td>
            <td> <?php echo $oxygenLevel; ?> </td>
            <td> <?php echo $temperature; ?> </td>
            <td> <?php echo $timeStamp; ?> </td>
        </tr><?php
    }

?>