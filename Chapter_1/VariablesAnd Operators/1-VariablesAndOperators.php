
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables and Operations</title>
</head>
<body>

<?php

// This is comment in PHO
# comment
/* Multiline Comment */

# Variables are defined the forst time they are used 
$a = 8;
$b = 4;

echo = "<h2>Variables</h2>";
echo = "a = $a<br>";
echo = "a = $a<br>";

echo "<h2>Basic Operations</h2>";
echo "$a +$b = ".($a+$b). "<br>";
echo "$a +$b = ".($a-$b). "<br>";
echo "$a +$b = ".($a*$b). "<br>";
echo "$a +$b = ".($a/$b). "<br>";


echo "<h2>Increment/Decrement Operators</h2>";
echo "a = $a<br>";
echo "b = $b<br>";
echo "<ul>";
echo    "<li>Post increment. Value of a = ".($a++)." </li>";
echo    "<li>After post increment, value of a = $a </li>";
echo    "<li>Pre increment. Value of a = ".(++$a)." </li>";
echo    "<li>Pre increment, value of a = $a </li>";
echo "/ul>"

echo "<h2>Casting</h2>";
$quantity = 9; // Integer
$price = 4.25; //float
$total - $price * $quantity; //total will be float
$totalInt = (int)total; //casting to int 

echo "quantity = $quantity<br>";
echo "price = $price<br>";
echo "total = quantity * price = $total<br>";
echo "total = total with no cents = $totalInt<br>";

$paidwithCreditCard = $total >= 10;
if($paidwithCreditCard) {
    echo "You are allowed to pay with credit card<br>";
}
else{
    echo "You have to pay cash";
}

echo "<h2><Constants/h2>";
define('TAX_RATE', .065);
define('STUDENT_DISCOUNT', .065);
define('MILITARY_DISCOUNT', .065);

echo "Tax rate: ".(TAX_RATE * 100)."%<br>";
echo "Student discount ".(STUDENT_DISCOUNT * 100)."%<br>";
echo "Military discount: ".(MILITARY_DISCOUNT * 100)."%<br>";

echo "<h2>Reference Operators</h2>";
$a = 5; $b = 6;
echo "a = $a<br>";
echo "Lets's make b = a<br>";
$b = $a;
echo "Now b = a = $b<br>";
echo "Let's increment b by 1<br>";
$b++;
echo "Now, b = $b<br>";
echo "Notice that a kept its original value of $a<br>";

echo "Let's use the reference operand &<br>";
$a = 8;
echo "Let's make a = $a<br>";
echo "Let's make b = &a<br>";
$b = $a;
echo "Let's increment b by 1<br>";
$b++;
echo "Now, b = $b<br>";
echo "And a = $a. Notice that the value of a has also changed to $a<br>";
echo "This is because a and b now point to the same position in memory<br>";
echo "Use unset() function to break the link";
unset($a);




?>
    
</body>
</html>
