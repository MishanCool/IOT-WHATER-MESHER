<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/3_daily_usage.css">
    
</head>
<body>

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
    ?>

    
    <div class="table_background">

        <div class="logo"> 
            <img src="img/Logo_Design.png" alt="Logo" width="500" height="150" >
        </div>
        
        <?php
            
            $date = date('Y-m-d');

            $total=0;
            $count=0;
            $mean=0;

            $sql = "SELECT speed, date FROM iot_water";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    if($date==$row["date"])
                    {
                        $count=$count+1;
                        $total= $total + $row["speed"];
                    }
                }

                $mean=$total/$count;

                echo $mean;

            } 
            else 
            {
                echo "0 results";
            }
            $conn->close();
        ?>

    </div>    
    
</body>
</html>