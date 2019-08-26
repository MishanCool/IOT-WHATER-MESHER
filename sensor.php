<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "iot_project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $speed
    $date = date('Y-m-d');

    INSERT INTO iot_water (speed , date) VALUES ($speed , $date);

    $conn->close();
?>