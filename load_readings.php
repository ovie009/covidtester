<?php
    include_once "./database_connect.php"; 
    
    if (isset($_GET['id'])) {
        # code...
        $query = "SELECT fullname, temperature, heart_rate, oxygen_level, time_stamp FROM readings ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        // $fullName = $row['fullname'];
        $temperature = $row['temperature'];
        $heartRate = $row['heart_rate'];
        $oxygenLevel = $row['oxygen_level'];
        $timeStamp = $row['time_stamp'];

        ?>
        <li>
            <img src="./images/heart-beats.png" alt="heart rate icon">
            <strong> Heart Rate: </strong>
            <span>
                <?php echo $heartRate; ?><sup>BPM</sup>
            </span>
        </li>
        <li>
            <img src="./images/oxygen-saturation.png" alt="oxygen level icon">
            <strong>Oxygen Levels: </strong>
            <span>
            <?php echo $oxygenLevel; ?><sup>%</sup> 
            </span>
        </li>
        <li>
            <img src="./images/hot.png" alt="temperature icon">
            <strong>Temperature:</strong>  
            <span>
            <?php echo $temperature; ?><sup>0</sup>C 
            </span>
        </li>
        <li class="datetime_indicator"><?php echo $timeStamp; ?></li>
        <?php
    } else {
        # code...
        echo 'invalid backdoor';
    }

?>