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

    $sql = "INSERT INTO iot_water (
    VALUES ('John', 'Doe', 'john@example.com')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>