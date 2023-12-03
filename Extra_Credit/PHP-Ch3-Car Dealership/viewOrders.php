<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiw Order</title>
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
        $filename = "orders.txt";
        $orders = file($filename);

        $number_of_orders = count($orders);

        if($number_of_orders < 1) {
            echo "<p><strong>No orders pending.<br/>
            Please try again later.</strong></p>";

        } else {
            # display orders
            echo "<table class='w3-table w3-striped w3-border'>";
            echo "  <tr class='w3-blue-grey'>";
            echo "      <th>Datetime</th>";
            echo "      <th>First Name</th>";
            echo "      <th>Last Name</th>";
            echo "      <th>Product</th>";
            echo "      <th>Total</th>";
            echo "  </tr>";     

            # Loop through each row 
            for($i = 0; $i < $number_of_orders; $i++) {
                // retrieve current row (current order) from mutli-dim array 
                $curOrder = explode(';', $orders[$i]);

                # begin table row 
                echo "<tr>";

                for($j = 0; $j < count($curOrder); $j++) 
                echo "<td>".$curOrder[$j]."</td>";

                # end table row 
                echo "</td>";

            }
            echo "</table>";
            }


    ?>
    </div>


</body>
</html>