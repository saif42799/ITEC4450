<?php
    $productArray = [
        0 => ['Honda Accord', 28450],
        1 => ['Toyota Camry', 25050], 
        2 => ['Nissan Altima', 24080], 
        3 => ['Lexus RX', 45570] ,     
        4 => ['Tesla X', 104920],     
    ];
    

    #create short variable names 
    $productIndex = (int) $_POST['product'];
    $productSelected = $productArray[$productIndex];
    $productName = $productSelected[0];
    $productPrice = $productSelected[1];
    $date = date('d/m/Y h:i:s');
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $productPriceWithTax = $productPrice * .06;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Order</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-khaki.css">

    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <style>
      h1 {
        font-family: 'Tangerine', serif;
        font-size: 50px;
        font-weight: bold;
      }
    </style>
</head>

<body class="w3-theme-l4">
    <div class="w3-center w3-display-container w3-blue-grey">
        <h1>Tony Car Dealership</h1>
        <h2>Process Order</h2>
        <img src="carClipart.png" class="w3-display-topright w3-container" style="width:100%;max-width:200px">
    </div>
    
    <?php include "menu.php";?>

    <div class="w3-container w3-light-grey">
        <?php
            if($productPrice < 0) {
                echo "You did not order anuything in the previous page!<br";
                exit;
            }
            
            echo"<br>";
            echo "Order processed at $date<br>";
            echo "Your order is as follows: <br>";
            echo "First Name: $firstName <br>";
            echo "Last Name: $lastName <br>";
            echo "Item Ordered: $productName<br>";
            echo "Unit price: $$productPrice<br>";
            echo "6% sales tax: $$productPriceWithTax<br>";

            $totalAmount = $productPrice + $productPriceWithTax;

            echo "Total: $".number_format($totalAmount, 2)."<br>";

            $outputstring = $date.";".$firstName.";".$lastName.";".$productName.";".$totalAmount."\n"; 
            
            # open file for appending 
            @$fp = fopen("orders.txt", 'ab');

            if(!$fp) {
                echo "Your order cannot be processed at this time. Please try again later<br>";
                exit;
            }

            flock($fp, LOCK_EX);
            fwrite($fp, $outputstring, strlen($outputstring));
            flock($fp, LOCK_UN);
            fclose($fp);
        
            echo"<br>";
            echo "Order written to file<br>";
        ?>
    </div>


</body>
</html>