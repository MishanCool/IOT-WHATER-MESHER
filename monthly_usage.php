<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/4_monthly_usage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
    <script>
    
        $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
            },
        
        });
        });
    
    </script>

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

    <div class="nav_bar">

        <ul>
            <li><a href="">NOTIFICATION</a></li>
            <li><a href="home.html">BACK</a></li>
            <li><a href="logout.php">LOG OUT</a></li>
        </ul>

    </div>

    <div class="bill_background">

        <div class="logo"> 
            <img src="img/Logo_Design.png" alt="Logo" width="500" height="150" >
        </div>

        <?php

            $time = date('H:i:s');
            $date = date('Y-m-d');


            $total=0;
            $count=0;
            $mean=0;
            $monthly_water_usage=0;
            $pay=0;

            $sql = "SELECT speed, date FROM iot_water where MONTH(CURDATE())";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) 
            {
                
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                
                        $count=$count+1;
                        $total= $total + $row["speed"];
                    
                }

                $mean=$total/$count;

                $monthly_water_usage = round($total/3600,3);

                $pay = sprintf('%0.2f', $monthly_water_usage * 100);


                echo '<div class="bill">';

                    echo '<h3>'.$time.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$date.'<h3>'.'<br><br>';

                    echo '<h2>Daily whater usage = ' .$monthly_water_usage .' Leaters<h2>'.'<br>';

                    echo '<h2>Charge for water consumed = ' . $pay .' Rs<h2>'.'<br>';

                echo'</div>';

            } 
            else 
            {
                echo "0 results";
            }
            $conn->close();


        ?>
        
    </div>

    <div class="container">
        <div id="calendar">
        </div>
    </div>

    
</body>
</html>