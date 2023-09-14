<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Tea</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-pink.css">

    <style>
        h1, h2{
            text-shadow: 1px 1px 0 #444;
            font-family: 'Comic Sans MS';
        }
    </style>
</head>
<body>
    <div class="w3-container">
        <header class="w3-display-container w3-theme-l4 w3-center">
            <h1 class="w3-text-red"><b>Red Dragon</b></h1>
            <h2>Bubble Tea</h2>
            <div class="w3-display-topright">
                <img src="BubbleTea.png" alt="" style="width: 15%">
            </div>
        </header>

    <div class="w3-container w3-sand">
        <h2>Order recived!</h2><br>

        <?php
        $size = $_POST['size'];
        $addOn = $_POST['addOn'];
        $flavor = $_POST['flavor'];
        $total = 0;

        echo "<b>Size</b>: $size<br>";
        echo "<b>Add on</b>: $addOn<br>";
        echo "<b>Flavor</b>: $flavor<br>"; 

        switch($size){
            case "Small" : $total += 4; break;
            case "Medium" : $total += 4.5; break;
            case "Large" : $total += 5; break;
        }

        switch($addOn){
            case "Lychee" : $total += .5; break;
            case "TapiocaPearls" : $total += .25; break;
     
        }

        echo "<hr><b>Your total is: $<b>$total</b></b>"
        ?>
        

    </div>



</body>
</html>