<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch3-PHP Arrays</title>
    <style>
        h2 { color: blueviolet;}
    </style>
</head>
<body>
    <h1>CH3-PHP Arrays</h1>

    <?php
        echo "<h2>Numerically Indexed</h2";
        $burgerArray = array("Burger King", "McDonald's", "Wendy's", "Five Guys", "In-N-Out");
        $mexicanFoodArray = array("Taco Bell", "Chipotle", "Dell Taco", "On the Border", "Willy's");
        $pizzaArray = array("Domino's", "Pizza Hut", "Little Caesar", "Papa John's", "Marco's", "Riverside");
        $numbers = range(1, 10);
        $odds = range(1, 10, 2);
        $letters =range('a', 'z');

        echo "<h2>Convert to string and display</h2>";
        # convert array elements to string using implode function
        echo implode(" ", $burgerArray)."<br>";
        echo implode(" ", $mexicanFoodArray)."<br>";
        echo implode(" ", $pizzaArray)."<br>";
        echo implode(" ", $numbers)."<br>";
        echo implode(" ", $odds)."<br>";
        echo implode(" ", $letters)."<br>";
    
        echo "<h2>Accessing Individualk Elements</h2>";
        echo "First buger chain: $burgerArray[0]<br>";
        echo "Second buger chain: $burgerArray[1]<br>";
        echo "Last buger chain: ".end($burgerArray)."<br>";

        echo "<h2>Adding Elements</h2>";
        echo "Append 'Sonic' and 'White castle'  to the end";
        array_push($burgerArray, 'Sonic', 'Whate castle');
        echo implode(" ", $burgerArray)."<br>";

        echo "<h2>Insert ['Fronter', La Bamnb] on the second position</h2>";
        $newMexican = ["Frontera , La Bamba"];
        array_splice($mexicanFoodArray, 2, 0, $newMexican);
        echo implode(" ", $mexicanFoodArray)."<br>";

        echo "<h2>Looping</h2>";
        echo "Using a looping variables<br>";
        // if (is_countable($mexicanFoodArray))
            for($i = 0; $i < count($mexicanFoodArray); $i++)
                echo $mexicanFoodArray[$i].",";
            
        echo "<br>Using a froeach<br>";
        foreach($pizzaArray as $pizza) 
            echo$pizza.",";

        echo "<h2>Associative Arrays</h2>";
        #
        $age = array('Heather' => 20, 'Clariassa' => 21, 'Ken' => 19, 'Marcus' => 18);
        echo "Heather: ".$age['Heather']."<br>";
        echo "Clarissa: ".$age['Clariassa']."<br>";
        echo "Ken: ".$age['Ken']."<br>";
        echo "Marcus: ".$age['Marcus']."<br>";


        echo "<h3>Looping through Associative Arrays</h3>";
        echo "Using a foreach to iterate associate arrays";
        foreach($age as $key => $value)
            echo "$key : $value<br>";

        echo "<h3>Calculate the sum and average age</h3>";
        $sum = array_sum($age);
        $avg = $sum / count($age);
        echo "Sum: $sum<br>";
        echo "Average: $avg<br>";


        echo "<h2>Multidimensional Arrays</h2>";
        $countries = [['a','b','c'],['p','q','r'],['x','y','z']];

        echo "<h3>Accessing Individual Elements</h3>";
        echo "[2][1]: ".$countries[2][1]."<br>";
        echo "[1][4]: ".$countries[1][4]."<br>";
        $numbers = range(20, 30);
        echo $numbers."<br>";
        echo "<h3>Looping with a foreach</h3>";
        
        foreach($countries as $keyRow => $valueList) {
            foreach($valueList as $keyCol => $value)
                echo "[$keyRow] [$keyCol] = $value";

            # display line break after each row 
            echo "<br>";

        }

    ?>


    
</body>
</html>