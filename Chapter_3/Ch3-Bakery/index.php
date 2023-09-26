<?php
    $productArray = [
        0 => ['Apple Pie', 12.50], 
        1 => ['Cheesecake', 5.50],
        2 => ['Croissant', 2.50],
        3 => ['Doughnut', .5],
        4 => ['Pastel de Nata', 4]
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    
    <style> 
        .w3-pacifico {font-family: "Pacifico", serif;}
        h1 {font-family: "Pacifico", serif;}

    </style>

</head>
<body>
    <div class="w3-container w3-center w3-pink">
        <h1>CLementine Bakery</h1>
        <h2>Order Form</h2>
        <img src="ChocolateCake.png" width="20%" height="10%" class="w3-display-topleft"> 

        <img src="Croissant_PNG_Clip_Art-2216.png" width="20%" height="10%" class="w3-display-topright"> 

    </div>
    
    <?php include "menu.php"?>

    <form action="ProcessOrder.php" method="POST">
        <label>Select Product</label>
        <select name="product" class="w3-selsct">
            <?php
                foreach($productArray as $key => $value)    
                    echo "<option value='$key'> $value[0]</option><br>";          
            ?>

        </select>

        <label>Enter quantity</label>
        <input type="text" class="w3-input" name="quantity" size="3" maxlength="3">
        <input type="submit" value="Submit order">
    </form>

    <div>
        <table class="w3-table w3-table-all">
            <tr class="w3-blue-grey">
                <th>Item code</th>
                <th>Description</th>
                <th>Unit Price</th>

            </tr>

        </table>

        <?php
            # create rows
            foreach($productArray as $key => $value) {
                echo "<tr>";
                echo "  <td>$key</td>";
                echo "  <td>$value[0]</td>";
                echo "  <td>".number_format($value[1],2)."</td>";
                echo "</tr>";
            }
        ?>
    </div>

</body>
</html>