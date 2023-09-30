<?php
    // create short variable names
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $address = htmlspecialchars($_POST['address']);
    $date =date('m/d/y h:i:s');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob's Auto Parts-Order Results</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
</head>
<body class="w3-sand">
    <div class="w3-container w3-center w3-pale-green">
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
    </div>

    <?php
    include "menu.php";
    ?>


    <div class="w3-container w3-light-grey">
        <?php
            echo "<br>Order processed at ";
            echo date('m/d/y h:i:s')."<br>";
            echo "Your order is as follows:<br>";
            
            echo "<br>";

            $totalqty = 0;
            $totalAmount = 0.0;

            define('TIRE_PRICE', 100);
            define('OIL_PRICE', 10);
            define('SPARK_PRICE', 4);

            $totalqty = $tireqty + $oilqty + $sparkqty;
            echo "Item ordered: $totalqty<br>";

            if($totalqty == 0)
                echo "You did not order anything on the previous page!<br>";
            else{
                if($tireqty > 0){
                    echo htmlspecialchars($tireqty).' tiires<br>';
                }
                if($oilqty > 0){
                    echo htmlspecialchars($oilqty).' bottles of oil<br>';
                }
                if($sparkqty > 0){
                    echo htmlspecialchars($sparkqty).' spark plugs<br>';
                }
            }

            $totalAmount = $tireqty * TIRE_PRICE +
                           $oilqty * OIL_PRICE +
                           $sparkqty * SPARK_PRICE;

          
            echo "Subtotal: $".number_format($totalAmount, 2)."<br>";

            echo "<br>Address to ship to is: ".htmlspecialchars($address)."<br>";

            $outputStr = "$date;$tireqty;$oilqty;$sparkqty;$totalAmount;$address\n";

            // open file for apending
            $myPath = "orders/";
            @$fp = fopen($myPath."orders.txt", 'ab');

            if(!$fp) {
                echo "<br>Your order could not be processed at this time. Please try later<br>";
                exit;
            }

            flock($fp, LOCK_EX);
            fwrite($fp, $outputStr, strlen($outputStr));
            flock($fp, LOCK_UN);
            fclose($fp);

            echo "Order Written...";

        
        ?>
    </div>
</body>
</html>