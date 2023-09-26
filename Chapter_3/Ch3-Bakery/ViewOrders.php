<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>

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
        <h1>CLementine Bakery</h1>
        <h2>View Orders</h2>
        <img src="ChocolateCake.png" width="10%" height="10%" class="w3-display-topleft"> 

        <img src="Croissant_PNG_Clip_Art-2216.png" width="10%" height="10%" class="w3-display-topright"> 

    </div>
    
    <?php include "menu.php";?>

    <div class="w3-container w3-light-grey">
        <?php
            $filename = "orders.txt";
            $orders = file($filename);

            $number_of_orders = count($orders);

            if($number_of_orders < 1) {
                echo "No orders pending. Please try again later<br>";

            } else {
                # display orders
                echo "<table class='w3-table w3-striped w3-border'>";
                echo "  <tr class='w3-blue-grey'>";
                echo "      <th>Datetime</th>";
                echo "      <th>Product</th>";
                echo "      <th>Quantity</th>";
                echo "      <th>Total</th>";
                echo "  </tr>";
                
            

            # Loop through each row 
            for($i = 0; $i < $number_of_orders; $i++) {
                // retrieve current row (current order) from mutli-dim array 
                $curOrder = explode(';', $orders[$i]);

                # begin table row 
                echo "<tr>";

                for($j = 0; $j < count($curOrder); $j++) 
                echo "<td>".$curOrder[$j]."</td><br>";

                # end table row 
                echo "</td>";

            }
            echo "</table>";
            }


        ?>
    </div>


</body>
</html>