<?php
    include_once "./database_connect.php";        
    $query = "SELECT fullname, temperature, heart_rate, oxygen_level, time_stamp FROM readings ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo "Full Name: " . $row['fullname'] . "<br>";
    echo "Temperature: " . $row['temperature'] . "<br>";
    echo "Heart Rate: " . $row['heart_rate'] . "<br>";
    echo "Oxygen Level: " . $row['oxygen_level'] . "<br>";
    echo "Time Stamp: " . $row['time_stamp'] . "<br>";

?>