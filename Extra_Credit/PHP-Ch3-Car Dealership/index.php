<?php
    $productsArray = [
        0 => ['Honda Accord', 28450],
        1 => ['Toyota Camry', 25050], 
        2 => ['Nissan Altima', 24080], 
        3 => ['Lexus RX', 45570] ,     
        4 => ['Tesla X', 104920],        
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <header class="w3-center w3-display-container w3-blue-grey">
        <h1>Tony Car Dealership</h1>
        <h2>Order Form</h2>
        <img src="carClipart.png" class="w3-display-topright w3-container" style="width:100%;max-width:200px">
    </header>

    <?php include "menu.php" ?>

    <form action="processOrder.php" method="post" class="w3-theme-l4">

        <label>First Name</label>  
        <input class="w3-input" type="text" name="firstName" size="3" maxlength="99">

        <label>Last Name</label>  
        <input class="w3-input" type="text" name="lastName" size="3" maxlength="99">


        <label>Select Product</label>        
        <select class="w3-select" name="product">	
            <?php
				# write your code here
                foreach($productsArray as $key => $value)
                    echo "<option value='$key'> $value[0]</option>";
            ?>  
        </select>

        <input type="submit" name="submit" value = "Submit Order" />
    </form>
    <br>
    <div class="w3-container">
        <table class="w3-table w3-table-all">
            <tr class="w3-blue-grey">
                <th>Item Code</th>
                <th>Description</th>
                <th>Unit Price</th>
            </tr>
            <?php                            
                # write your code here  
                foreach($productsArray as $key => $value) {
                    echo "<tr>";
                    echo "<td>$key</td>";
                    echo "<td>$value[0]</td>";
                    echo "<td>$".number_format($value[1],2)."</td>";
                    echo "</tr>";
                } 
            ?>               
        </table>        
    </div>
    
</body>
</html>