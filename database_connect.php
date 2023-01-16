<?php
    // date_default_timezone_set('Europe/Paris');
    $dbServername = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'covid_tester';
    
    $connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>