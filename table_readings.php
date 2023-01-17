<?php
    include_once "./database_connect.php";  

    $query = "SELECT * FROM readings ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($result)) {
        echo "Full Name: " . $row['fullname'] . "<br>";
        echo "Temperature: " . $row['temperature'] . "<br>";
        echo "Heart Rate: " . $row['heart_rate'] . "<br>";
        echo "Oxygen Level: " . $row['oxygen_level'] . "<br>";
        echo "Time Stamp: " . $row['time_stamp'] . "<br>";
        echo "<br>";
    }

?>