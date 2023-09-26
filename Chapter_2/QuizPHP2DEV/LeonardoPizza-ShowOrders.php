<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leonardo Pizza All Order</title>
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
        <header class="w3-display-container w3-blue" style="height: 130px">
            <div class="w3-display-topmiddle" style="text-align: center">
                <h1>Dream Vacation</h1>
                <h2>Reservation List</h2>

            </div>
        </header>
        <nav class="w3-bar w3-border w3-light-grey">
            <a href="LeonardoPizza-Order.php" class="w3-bar-item w3-button">Order</a>
            <a href="LeonardoPizza-ShowOrders.php" class="w3-bar-item w3-button">Show Order</a>
        </nav>

        <div class="w3-container">
            <?php
                $myFile = fopen('pizzaOrder.csv', 'r') or die('Unable to open file!');

                $outTable = "<table class='w3-table w3-striped w3-border'>";
                $outTable .= "<tr class='w3-teal'>";
                $outTable .= "  <th>Date</th>";
                $outTable .= "  <th>First Name</th>";
                $outTable .= "  <th>Last Name</th>";
                $outTable .= "  <th>Pizza Name</th>";
                $outTable .= "  <th>Pizza Size</th>";
                $outTable .= "  <th>Total</th>";
                $outTable .= "</tr>";

                # loop through all reservation rows
                while(!feof($myFile)) {
                    $curLineArray = fgetcsv($myFile, 0, ',');

                    $outTable .= "<tr>";

                    foreach ((array) $curLineArray as $value){
                        $outTable .= "<td>$value</td>";

                    }
                    $outTable .= "</tr>";

                }

                $outTable .= "</table>";
                fclose($myFile);

                echo $outTable;
                

           ?>
        
        </div>

    </div>
    
</body>
</html>