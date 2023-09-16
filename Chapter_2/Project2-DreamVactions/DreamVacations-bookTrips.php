<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream vacation Booking</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        h1, h2{
            text-shadow: 1px 1px 0 #444;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>

</head>
<body>
    <div class="w3-container w3-sand">
        <header class="w3-display-container w3-green" style="height: 130px;">
            <div class="w3-display-topright">
                <img src="planeSmall.png" alt="">
            </div>

            <div class="w3-display-topmiddle" style="text-align: center;">
                <h1>Dream Vacation</h1>
                <h2>Trip Booking</h2>

            </div>
        </header>
        <nav class="w3-bar w3-border w3-light-grey">
            <a href="DreamVations-bookTrips.php" class="w3-bar-item w3-button">Booking</a>
            <a href="DreamVations-showReservation.php" class="w3-bar-item w3-button">Show Reservation</a>
        </nav>

        <form action="DreamVacations-bookTrips.php" class="w3-container" method="POST">
            <label>First Name</label>
            <input type="text" class="w3-input" name="fName"> 

            <label>Last Name</label>
            <input type="text" class="w3-input" name="lName"> 

            <label>Destination</label>
            <select name="destination" class="w3-select" > 
                <option value="PEK">Beijing-PEK</option>
                <option value="CAI">Cairo-CAI</option>
                <option value="JFK">New York-JFK</option>
                <option value="CDG">Paris-CDG</option>
                <option value="NRT">Tokyo</option>
                <option value="GIG">Rio de Janeiro-GIG</option>
            </select>

            <label>Number of Passengers</label>
            <select name="numberOfPassengers" class="w3-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <label>Data From</label>
            <input type="date" class="w3-input" name="dateFrom">

            <label>Data two</label>
            <input type="date" class="w3-input" name="dateTo">

            <input type="submit" value="submit" name="submit" class="w3-btn w3-green">

        </form>

        <div class="w3-container">
            <?php
                if(isset($_POST['submit'])) {
                    if(empty($_POST['fName']) || empty($_POST['lName'])) {
                        echo "Plaese enter all the required infromation and try again";
                        exit;
                    }

                    $allDestinations = array(
                        'PEK' => 'Beijing', 'CAI' => 'Cario', 'JFK' => 'New York',
                        'CDG' => 'Paris', 'NRT' => 'Tokyo', 'GIG' => 'Rio de Janeiro'
                    );

                    $fName = $_POST['$fName'];
                    $lName = $_POST['$lName'];
                    $destination = $_POST['$destination'];
                    $numberOfPassengers = $_POST['numberOfPassengers'];
                    $dataForm = $_POST['dataForm'];
                    $dateTo = $_POST['dateTo'];

                    echo "<h3>Booking Successfull!!!</h3>";
                    echo "<b>First Name</b>: $fName<br>";
                    echo "<b>Last Name</b>: $lName<br>";
                    echo "<b>Destination</b>: ".$allDestinations[$destination]."($destination)<br>";
                    echo "<b>Number of passengers</b>: $numberOfPassengers<br>";
                    echo "<b>Date from</b>: $dateFrom<br>";
                    echo "<b>Date to</b>: $dateTo<br>";

                    # Write to file
                    $outputStr = date("Y-m-d H:i:s").","; // booking
                    $outputStr .= $fName.',';
                    $outputStr .= $lName.',';
                    $outputStr .= $destination.',';
                    $outputStr .= $numberOfPassengers.',';
                    $outputStr .= $dateFrom.',';
                    $outputStr .= $dateTo.PHP_EOL;

                    $fileName = 'bookings.csv';
                    @$fp = fopen($fileName, 'a');

                    if(!$fp) {
                        echo "Your order could not be processed at this time. Please try again later.";
                        exit;
                    }

                    # lock the file for writeing 
                    flock($fp, LOCK_EX);

                    # write data line ot file
                    fwrite($fp, $outputStr, strlen($outputStr));

                    # unlock the file after writing
                    flock($fp, LOCK_UN);                   

                }

            ?>
        </div>

    </div>
    
</body>
</html>