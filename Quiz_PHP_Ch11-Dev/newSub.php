<?php
include "utilFunctions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>727 Subs - About Us</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-cyan.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        h1 {
            font-family: 'Stencil Std', cursive;
            color: yellow;
        }

        h2 {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container w3-theme-d5">
        <header class="w3-container w3-center">
            <h1>727 Subs</h1>
            <h2>New Sub</h2>
        </header>
        <?php
        include 'mainMenu.php';
        ?>

        <div class="w3-container w3-theme-d3">
            <form class="container w3-theme-l1" action="newCustomer.php" method="post">

                <fieldset>
                    <label>Name</label>
                    <input class="w3-input w3-border" type="text" name="name" maxlength="200" size="200">

                    <label>Ingredients</label>
                    <input class="w3-input w3-border" type="text" name="ingredients" maxlength="200" size="200">

                    <label>Bread type</label>
                    <input class="w3-input w3-border" type="text" name="breadType" maxlength="200" size="200">

                    <label>Price</label>
                    <input class="w3-input w3-border" type="text" name="price" maxlength="200" size="200">


                </fieldset>

                <p><input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Add New sub"></p>


            </form>

            <div class="container w3-sand">
                <?php
                if (isset($_POST['submit'])) {
                    if (!isset($_POST['name']) || !isset($_POST['ingredients']) || !isset($_POST['breadType']) || !isset($_POST['price'])) {
                        echo "<p>You have not entered all the required details.<br />
                                          Please go back and try again.</p>";
                        exit;
                    }

                    include "connectDatabase.php";

                    $name = mysqli_real_escape_string($conn, $_POST['$name']);
                    $ingredients = mysqli_real_escape_string($conn, $_POST['$ingredients']);
                    $breadType = mysqli_real_escape_string($conn, $_POST['$breadType']);
                    $price = mysqli_real_escape_string($conn, $_POST['$price']);

                    $sql = "INSERT INFO sub (name, ingredients, breadType, price) 
                                VALUES ('name', 'ingredients', 'breadType', 'price')";

                    if ($conn->query($sql) === TRUE) {

                        echo "Name: $name";
                        echo "Ingredients: $ingredients";
                        echo "BreadType: $breadType";
                        echo "Price: $price";




                    }
                    $conn->close();

                }

                ?>

            </div>
        </div>
    </div>
</body>

</html>