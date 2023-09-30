<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob's Auto Parts-View Orders</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-sand">
    <div class="w3-container w3-center w3-pale-green">
        <h1>Bob's Auto Parts</h1>
        <h2>Customer Orders</h2>
    </div>

    <?php
    include "menu.php";
    ?>

    <div class="w3-container w3-light-grey">
        <?php
        $fileAndPath = "./orders/orders.txt";
        $orders = file($fileAndPath);

        $numberOfOrders = count($orders);

        if ($numberOfOrders == 0) {
            echo "<br>No orders pending. Please try again later";
            exit;
        }
        
        echo "<table class='w3-table w3-table-all w3-border'> ";
        echo "  <tr class='w3-teal'> ";
        echo "      <th>Datetime</th>";
        echo "      <th>Tires</th>";
        echo "      <th>Oil</th>";
        echo "      <th>Sparks</th>";
        echo "      <th>Total</th>";
        echo "      <th>Address</th>";
        echo "  </tr>";

        
        for ($i = 0; $i < $numberOfOrders; $i++) {
            // retrieve current row using ; as delimeter
            $curOrder = explode(';', $orders[$i]);

            // begin table row 
            echo "<tr>";

            for ($j = 0; $j < count($curOrder); $j++)
                echo "<td>".$curOrder[$j]."</td>";

            echo "</tr>";

        }

        echo "</table>";

        $path = "orders/";
        @$fp = fopen($path . "orders.txt", 'rb');


        if (!$fp) {
            echo "<br>No orders pending. Please try again later";
            exit;
        }


        flock($fp, LOCK_UN); //unlock the file
        // fwrite($fp, $outputStr, strlen($outputStr));
        flock($fp, LOCK_UN);
        fclose($fp);


        ?>

    </div>

</body>

</html>