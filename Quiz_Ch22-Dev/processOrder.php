<?php

# student cod
# begin session

$productsArray = [
    0 => ['Basic', 'Exterior machine wash', 10],
    1 => ['Tire Shine', 'Basic + tire shine', 20],
    2 => ['Hot Wax', 'Basic + interior hand wash', 25],
    3 => ['Ceramic Sea Gloss', 'Hot Wax + Glossy finish', 40]
];
# student code
# set $productsArray equal to the session variable productsArray

// create short variable names
$productIndex = (int) $_POST['product'];
$productSelected = $productsArray[$productIndex];
$productName = $productSelected[0];
$productDescription = $productSelected[1];
$productPrice = $productSelected[2];
$quantity = (int) $_POST['quantity'];
$document_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('d/m/Y h:i:s'); //date('H:i, jS F Y');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Results</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-deep-purple.css">
    <style>
        h1 {
            font-family: 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body class="w3-theme-l4">
    <div class="w3-container w3-center w3-theme-d3">
        <h1>Larry Car Wash</h1>
        <h2>Order Form</h2>
        <img src="Car-High-Quality.png" width="30%" height="20%" class="w3-display-topright" />
    </div>
    <?php include "menu.php"; ?>

    <div class="w3-container w3-light-gray">
        <?php

        if ($quantity <= 0) {
            echo "You did not order anything on the previous page!<br/>";
            exit;

        }

        echo "Order processed at " . date('H:i, jS F Y') . "<br>";
        echo "Your order is as follows: <br>";

        echo "Item ordered: $productName<br/>";
        echo "Item description: $productDescription<br/>";
        echo "Quantity: ".$quantity."<br/>";
        echo "Unit price: $productPrice<br/>";

        $totalAmount = $quantity * $productPrice;

        echo "Total: $".number_format($totalAmount, 2)."<br/>";

        $outputstring = $date.";".$productName.";".$productDescription.";".$quantity.";".$productPrice."\n";

        // open file for appending
        @$fp = fopen("orders.txt", 'ab');

        if (!$fp) {
            echo "<p><strong> Your order could not be processed at this time.
              Please try again later.</strong></p>";
            exit;
        }

        flock($fp, LOCK_EX);
        fwrite($fp, $outputstring, strlen($outputstring));
        flock($fp, LOCK_UN);
        fclose($fp);

        echo "<p>Order written.</p>";

        ?>
    </div>

</body>

</html>