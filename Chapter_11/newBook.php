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
    <div class="w3-container w3-center">
        <header class="w3-container 23-center"> 
            <h1>Bookstore</h1>
            <h2>New Book</h2>
        </header>

        <?php
        include "mainMenu.php";

        ?>
        <form action="newBook.php" class="w3-container w3-sand" method="POST">
            <fieldset>
                <label>Title</label>
                <input type="text" class="w3-input w3-border" name="title" naxlength="200" size="200"><br>

                <label>ISBN</label>
                <input type="text" class="w3-input w3-border" name="isbn" naxlength="60" size="60"><br>

                <label>Price</label>
                <input type="text" class="w3-input w3-border" name="price" naxlength="30" size="30"><br>

                <label>Publication Date</label>
                <input type="date" class="w3-input w3-border" name="publicationDate" naxlength="60" size="60"><br>

                <label>Publisher</label>
                <select name="publisher" class="w3-select">
                    <option value="" disabled selected>Choose Publisher</option>
                    <?php
                    include "connectDatabase.php";

                    $sql = "SELECT * FROM publisher";

                    $result = $conn->query($sql);

                    if($result->num_rows >0) 
                        while($row = $result->fetch_assoc()) {
                            $pubId = $row['publisher_id'];
                            $pubName = $row['name'];

                            echo "<option value='$pubID'>$pubId-$pubName</option>";

                        }
                    $conn->close();

                    ?>
                </select>

                    <label>Book Autor(s)</label>
                    <input name="auSel" id="auSel" value="None" type="hidden">
                    <select name="author[]" id="listAuSel" class="w3-select">

                    </select>
                    <input type="text" class="w3-button w3-teal w3-round-large" value="Remove author" onclick="removeAutor()">

                    <label>Avalable Authors</label>
                    <select id="listAuAv" class="w3-select">
                        <option value="" disabled selected>Choose Author</option>
                        <?php
                        
                        
                        ?>

                    </select>

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