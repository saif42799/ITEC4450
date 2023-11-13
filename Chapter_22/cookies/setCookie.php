<?php

// 86400 seconds in a day
$seconds_in_a_day = 60*60*24;
setcookie("favColor", "green", time() + 30*$seconds_in_a_day,"/"); // 30 days
setcookie("favAnimalr", "horse", time() + $seconds_in_a_day,"/"); // 1 day
setcookie("favSchool", "GGC", time() + 60*60,"/"); // 1 hour
setcookie("favTeam", "Atlanta Falcons", time() + 60,"/"); // 1 minute


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-cyan.css">
</head> 
<body class="w3-theme-l5">
    <div class="w3-container w3-theme-l1 w3-center">
        <h1>Cookies Example</h1>
        <h2>Setting Cookies</h2>

    </div>

    <div>
        <?php include "mainMenu.php"?>
    </div>

    <div class="w3-container w3-theme-l4">
        <?php
        if(isset($_COOKIE['favColor'])) {
            echo"Cookies names favColor is not set!<br>";
        }else{
            echo "Cookie favColor set!<br>";
            echo"Value is: ".$_COOKIE['favColor']."<br><br>";
        }

        if(isset($_COOKIE['favAnimal'])) {
            echo"Cookies names favAnimal is not set!<br>";
        }else{
            echo "Cookie favAnimal set!<br>";
            echo"Value is: ".$_COOKIE['favAnimal']."<br><br>";
        }

        if(isset($_COOKIE['favSchool'])) {
            echo"Cookies names favSchool is not set!<br>";
        }else{
            echo "Cookie favSchool set!<br>";
            echo"Value is: ".$_COOKIE['favSchool']."<br><br>";
        }

        if(isset($_COOKIE['favTeam'])) {
            echo"Cookies names favTeam is not set!<br>";
        }else{
            echo "Cookie favTeam set!<br>";
            echo"Value is: ".$_COOKIE['favTeam']."<br><br>";
        }

        ?>

    </div>
    
</body>
</html>