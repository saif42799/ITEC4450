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
                <img src="BubbleTea.png" alt="" style="width: 15%;">
            </div>
        </header>

        <form action="receiveOrder.php" method="POST" class="w3-container w3-sand">
            <label>Size</label>
            <select name="size" id="" class="w3-select">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select><br>

            <label>Add-on</label>
            <select name="addOn" class="w3-select">
                <option value="None">None</option>
                <option value="Lychee">Lychee</option>
                <option value="TapiocaPearls">Tapioca Pearls</option>
            </select><br>

            <label>Flavor</label>
            <select name="flavor" class="w3-select">
                <option value="Honeydew">Honeydew</option>
                <option value="Lychee">Lychee</option>
                <option value="Mango">Mango</option>
                <option value="Matcha">Matcha</option>
                <option value="PassionFruit">Passion Fruit</option>
                <option value="Taro">Taro</option>

            </select><br>
            <input type="submit" name="Submit">

        </form><br>
        <div class="w3-container">
            <table class="w3-table">
                <tr class="w3-theme-l1">
                    <th>Item</th>
                    <th>Price</th>
                </tr>
                <tr class="w3-theme-l5">
                    <td>Small</td>
                    <td>$4.00</td>
                </tr>
                <tr class="w3-theme-l5">
                    <th>Medium</th>
                    <th>$4.50</th>
                </tr>
                <tr class="w3-theme-l5">
                    <th>Large</th>
                    <th>$5.00</th>
                </tr>
                <tr class="w3-theme-l4">
                    <th>Lychee</th>
                    <th>$0.50</th>
                </tr>
                <tr class="w3-theme-l4">
                    <th>Tapioca Pearls</th>
                    <th>$0.50</th>
                </tr>
            </table>

        </div>

    </div>
    


</body>
</html>