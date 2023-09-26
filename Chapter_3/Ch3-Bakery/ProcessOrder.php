<?php
    $productArray = [
        0 => ['Apple Pie', 12.50], 
        1 => ['Cheesecake', 5.50],
        2 => ['Croissant', 2.50],
        3 => ['Doughnut', .50],
        4 => ['Pastel de Nata (Egg Tart)', 4]
    ];
    

    #create short variable names 
    $productIndex = (int) $_POST['product'];
    $productSelected = $productArray[$productIndex];
    $productName = $productSelected[0];
    $productPrice = $productSelected[1];
    $quantity = (int) $_POST['quantity'];
    $date = date('d/m/Y h:i:s');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Results</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    
    <style> 
        .w3-pacifico {font-family: "Pacifico", serif;}
        h1 {font-family: "Pacifico", serif;}

    </style>

</head>
<body class="w3-pale-red">
    <div class="w3-container w3-center w3-pink">
        <h1>Clementine Bakery</h1>
        <h2>Order Form</h2>
        <img src="ChocolateCake.png" width="10%" height="10%" class="w3-display-topleft"> 

        <img src="Croissant_PNG_Clip_Art-2216.png" width="10%" height="10%" class="w3-display-topright"> 

    </div>
    
    <?php include "menu.php";?>



    <div class="w3-container w3-light-grey">
        <?php
            if($quantity < 0) {
                echo "You did not order anuything in the previous page!<br";
                exit;
            }
            
            echo "Order processed at $date<br>";
            echo "Your order is: <br>";
            echo "Item Ordered: $productName<br>";
            echo "Quantity: $quantity<br>";
            echo "Unit price: $productPrice<br>";

            $totalAmount = $quantity * $productPrice;

            echo "Total: $".number_format($totalAmount, 2)."<br>";

            $outputstring = $date.";".$productName.";".$quantity.";".$totalAmount."\n"; 
            
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
        
            echo "Order written to file<br>";
        ?>
    </div>


</body>
</html>