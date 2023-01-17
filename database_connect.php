<?php
    // date_default_timezone_set('Europe/Paris');
    $dbServername = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'covid_tester';

    // $dbServername = 'sql301.epizy.com';
    // $dbUsername = 'epiz_33393290';
    // $dbPassword = 'SO6fcBp4SZZx3C';
    // $dbName = 'epiz_33393290_covid_tester';
    
    $connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>