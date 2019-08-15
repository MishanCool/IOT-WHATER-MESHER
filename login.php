<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email, password  FROM login";
$result = $conn->query($sql);