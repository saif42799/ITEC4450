<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leonardo Pizza Order</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        h1, h2{
            text-shadow: 1px 1px 0 #444;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>

</head>
<body>
    <div class="w3-container w3-sand">
        <header class="w3-display-container w3-blue" style="height: 130px">
            <div class="w3-display-topmiddle" style="text-align:center">
                <h1>Leonardo Pizza</h1>
                <h2>Order</h2>

            </div>
        </header>
        <nav class="w3-bar w3-border w3-light-grey">
            <a href="LeonardoPizza-Order.php" class="w3-bar-item w3-button">Order</a>
            <a href="LeonardoPizza-ShowOrders.php" class="w3-bar-item w3-button">Show Order</a>
        </nav>

        <form action="LeonardoPizza-Order.php" class="w3-container" method="POST">
            <label>First Name</label>
            <input type="text" class="w3-input" name="fName"> 

            <label>Last Name</label>
            <input type="text" class="w3-input" name="lName"> 

            <label>Pizza Name</label>
            <select name="pizzaName" class="w3-select">
                <option value="gardenFresh">Garden Fresh</option>
                <option value="hawaiin">Hawaiin</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="sausage">Sausage</option>
            </select>

            <label>Size</label>
            <select name="pizzaSize" class="w3-select">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>

            <input type="submit" value="submit" name="submit" class="w3-btn w3-green">

        </form>

        <div class="w3-container">
            <?php
                if(isset($_POST['submit'])) {
                    if(empty($_POST['fName']) || empty($_POST['lName'])) {
                        echo "Plaese enter all the required infromation and try again";
                        exit;
                    }

                    $fName = $_POST['fName'];
                    $lName = $_POST['lName'];
                    $pizzaName = $_POST['pizzaName'];
                    $pizzaSize = $_POST['pizzaSize'];

                    $total = 0;

                    switch($pizzaSize){
                        case "small" : $total += 8; break;
                        case "medium" : $total += 9; break;
                        case "large" : $total += 10; break;
                    }

                    echo "<h3>Order Successfull!!!</h3>";
                    echo date("Y-m-d H:i:s")."<br>";
                    echo "<b>First Name</b>: $fName<br>";
                    echo "<b>Last Name</b>: $lName<br>";
                    echo "<b>Pizza Name</b>: $pizzaName<br>";
                    echo "<b>Pizza size</b>: $pizzaSize<br>";
                    echo "<b>Total</b>: $total<br>";

                    # Write to file
                    $outputStr = date("Y-m-d H:i:s").","; // booking
                    $outputStr .= $fName.',';
                    $outputStr .= $lName.',';
                    $outputStr .= $pizzaName.',';
                    $outputStr .= $pizzaSize.',';
                    $outputStr .= $total;
                 

                    $fileName = 'pizzaOrder.csv';
                    @$fp = fopen($fileName, 'a');

                    if(!$fp) {
                        echo "Your order could not be processed at this time. Please try again later";

                        exit;
                    }

                    # lock the file for writeing 
                    flock($fp, LOCK_EX);

                    # write data line ot file
                    fwrite($fp, $outputStr, strlen($outputStr));

                    # unlock the file after writing
                    flock($fp, LOCK_UN);                   

                }

            ?>
        </div>

    </div>
    
</body>
</html>