<?php
    $productsArray = [
      0 => ['Grilled chicken', 12.50], 
      1 => ['Chicken tenders', 5.50], 
      2 => ['Chicken parmesan', 14.25],
      3 => ['Chicken sandwich', 8]      
  ];

  // retrieve POST paramaters and store values in php variablea
  $productIndex = (int) $_POST['product'];
  $productSelected = $productsArray[$productIndex];
  $productName = $productSelected[0];
  $productPrice = $productSelected[1];
  $quantity = (int) $_POST['quantity'];
  $date = date('H:i, jS F Y'); //date('H:i, jS F Y');  

?>
<!DOCTYPE html>
<html>
  <head>
  <title>Order Results</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-amber.css">   
	</style>    
  </head>
  <body class="w3-theme">
  <header class="w3-center w3-display-container">
        <h1 class="w3-cursive">Los Pollos Hermanos</h1>
        <h2>Order Results</h2>
        <img src="Los_Pollos_Hermanos_logo.png" class="w3-display-topright w3-container" style="width:100%;max-width:200px">
    </header>
    <?php include "menu.php" ?>   
    
    <div class="w3-container w3-theme-l2">
    <?php

		      if($quantity < 0) {
              echo "You did not order anuything in the previous page!<br";
              exit;
           }
          
          echo "Order processed at $date<br>";
          echo "Your order is as follws: <br>";
          echo "Item Ordered: $productName<br>";
          echo "Quantity: $quantity<br>";
          echo "Unit price: $productPrice<br>";
  
          $totalAmount = $quantity * $productPrice;
  
          echo "Total: $".number_format($totalAmount, 2)."<br>";
          echo "<br>";
          
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
          
          echo "Order written<br>";


    ?>
    </div>
    <br><br>
    <footer class="w3-theme-l2">
      Logo from <a href="https://en.wikipedia.org/wiki/Los_Pollos_Hermanos">Wikipedia</a>
    </footer>
 
  </body>
</html>

