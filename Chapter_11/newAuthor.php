<?php
include "utilFunctions.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Author</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container w3-blue-grey">
        <header class="container w3-center"> 
            <h1>Bookstore</h1>
            <h2>New Author</h2>
        </header>

        <?php
        include "mainMenu.php";

        ?>
        <form action="newAuthor.php" class="w3-container w3-sand" method="POST">
            <fieldset>
                <label>First Name</label>
                <input type="text" class="w3-input w3-border" name="fName">

                <label>Last Name</label>
                <input type="text" class="w3-input w3-border" name="lName">
            </fieldset>
            <input type="submit" name="submit" class="w3-btn w3-blue-grey" value="Add new Author">

        </form>
        <?php
        if (isset($_POST["submit"])) {
            if (!isset($_POST["fName"]) || !isset($_POST["lName"])) {
                echo"You have not entered all the required information. Please complete that and try again.<br>";
                exit;
            }

            include "connectDatabase.php";

            $fName = mysqli_real_escape_string($conn, $_POST["fName"]);
            $lName = mysqli_real_escape_string($conn, $_POST["lName"]);

            $sql = "INSERT INTO author (lastName, firstName) VALUES ('$lName', $fName)";

            if($conn->query($sql) === TRUE) {
                $author_id = $conn->insert_id;
                echo"<b>New author created successfully!</b><br>";
                echo"Author ID: $author_id<br>";
                echo "First Name: ".htc($fName)."<br>";
                echo "Last Name: ".htc($lName)."<br>";
            } else {
                echo "Error: ".$sql."<br>";
                echo $conn->error."<br>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>