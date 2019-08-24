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

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    	if ($row["email"]==$email && $row["password"]==$password) 
        {
            include 'home.html';
        } 

        else 
        {
            include 'login.html';
            
        }

    }
} 
else 
{
    echo "0 results";
}
$conn->close();

?>