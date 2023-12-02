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
            <h2>Delete Sub</h2>
        </header>
        <?php
        include 'mainMenu.php';
        ?>

        <div class="w3-container w3-theme-d3">
            <form class="container w3-theme-l1" action="deleteCustomer.php" method="post">

                <fieldset>

                    <label>Sub to Delete</label>
                    <select class="w3-select" name="customer">
                        <option value="" disabled selected>Choose Sub</option>
                        <?php
                        include "connectDatabase.php";

                        $sql = "SELECT c.sub_id, c.name, c.ingredients ";
                        $sql .= "FROM sub c";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0)
                            while ($row = $result->fetch_assoc()) {
                                $subId = $row['sub_id'];
                                $name = $row['name'];
                                $ingredients = $row['ingredients'];

                                echo "<option value='$subId'>$subId-$ingredients, $name</option>";
                            }

                        $conn->close();
                        ?>
                    </select><br>
                    <b>NOTE</b>: Customers with orders can be deleted



                </fieldset>

                <p><input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Delete sub" /></p>
            </form>

            <div class="container">
                <?php
                if (isset($_POST["submit"])) {
                    if (!isset($_POST['sub'])) {
                        echo "<p>You have not entered all the required details.<br>
                                Please go back and try again.</p>";
                        exit;
                    }

                    $sub_id = $_POST['sub'];

                    include "connectDatabase.php";

                    $sql = "DELETE ";
                    $sql .= "FROM sub ";
                    $sql .= "WHERE sub_id = '$sub_id'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Sub record for sub_id=$sub_id succesfully deleted!<br>";

                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }


                    $conn->close();
                }


                ?>


            </div>
        </div>
</body>

</html>