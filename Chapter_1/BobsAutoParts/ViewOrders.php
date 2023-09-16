<?php
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    
    // shorthand for htmlspecialchars
    function hsc($text) {
        return htmlspecialchars($text);
    }

    //convert array to table row
    function toTablerow($myArray){
        // retrieve number of elements of $myArray
        $n = is_countable($myArray)? count($myArray) : 0;

        // begin now
        $result = "<tr>";

        // loop through all elements of $myArray and add a column for each
        for($i = 0; $i < $n; $i++)
            $result .= "<td>".hsc($myArray[$i])."</td";


        // end now 
        $result .= "</tr>";

        return $result;
    }

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

            echo "<table class='w3-table w3-table-all'> ";
            echo "  <tr class='w3-blue-grey'> ";
            echo "      <th>Date</th>";
            echo "      <th>Num Tires</th>";
            echo "      <th>Num oil</th>";
            echo "      <th>Num sparks</th>";
            echo "      <th>Total</th>";
            echo "      <th>Address</th>";
            echo "  </tr>";
            

            // flock($fp, LOCK_UN); //lock file for reading

            // loop though all file rows
            while(!feof($fp)) {
                $order = fgetcsv($fp, 0, "\t");

                echo toTablerow($order)."<br>";

            }

            echo "</table>";

            echo "<hr/ >";
            echo "Final postion of the file pointer is ".(ftell($fp));
            echo "<br>";
            rewind($fp); 
            echo "After rewind, the postion of the file pointer is ".(ftell($fp));

            flock($fp, LOCK_UN); //unlock the file
            fclose($fp);


        ?>

    </div>
    
</body>
</html>