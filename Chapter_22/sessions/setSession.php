<?php
// begins session and allows access to the $_SESSION array superglobal
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Set</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-cyan.css">
</head> 
<body class="w3-theme-l5">
    <div class="w3-container w3-theme-l1 w3-center">
        <h1>Session Example</h1>
        <h2>Setting Session Variables</h2>

    </div>

    <div>
        <?php include "mainMenu.php"?>
    </div>

    <div class="w3-container w3-theme-l4">
        <?php
        $_SESSION['id'] = rand(0,1000);
        $_SESSION['fName'] = "Heather";
        $_SESSION['lName'] = "Wilson";

        echo"Values set to:<br>";
        echo"Session id: ".$_SESSION['id']."<br>";
        echo"First Name: ".$_SESSION['fName']."<br>";
        echo"Last name: ".$_SESSION['lName']."<br>";
        ?>

    </div>
    
</body>
</html>