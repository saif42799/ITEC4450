<?php
    $document_root = $_SERVER['DOCUMENT_ROOT']


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob's Auto Parts - Customer Orders</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-sand">
    <div class="w3-container w3-center">
        <h1>Bob's Auto Parts</h1>
        <h2>Customer Orders</h2>
    </div>  

    <div class="w3-container w3-light-grey">
        <?php
            $path = "orders/";
            @$fp = fopen($path."orders.txt", 'rb');

            if(!$fp) {
                echo "<br>No orders pending. Please try again later";
                exit;
            }

            flock($fp, LOCK_SH);

            flock($fp, LOCK_UN); //lock file for reading

            // loop though all file rows
            while(!feof($fp)) {
                $order = fgets($fp);
                echo htmlspecialchars($order)."<br>";

            }

            flock($fp, LOCK_UN); //unlock the file
            fclose($fp);


        ?>

    </div>
    
</body>
</html>