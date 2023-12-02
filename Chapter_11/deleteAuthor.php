<?php
include "utilFunctions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Delete Author</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container w3-blue-grey">
        <header class="container w3-center">
            <h1>Bookstore</h1>
            <h2>Delete Author</h2>

        </header>

        <?php
        include 'mainMenu.php';
        ?>

        <form class="container w3-sand" action="deleteAuthor.php" method="post">

            <fieldset>

                <p><label>Author</label>
                <select class="w3-select" name="author">
                    <option value="" disabled selected>Choose Author</option>
                    <?php
                    include "connectDatabase.php";

                    $sql = "SELECT * ";
                    $sql .= "FROM author a";

                    $result = $conn->query($sql);

                    if($result->num_rows > 0)
                        while($row = $result->fetch_assoc()) {
                            $author_id = $row['$author_id'];
                            $authorFirstName = $row['$firstName'];
                            $authorLastName = $row['$authorLastName'];

                            echo "<option value='$authorID'>$authorLastName-$authorFirstName</option>";
                            
                        }

                    $conn->close();
                    ?>

                </select>
                </p>

            </fieldset>

            <p><input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Delete author"/></p>

        </form>

        <div class="container">
            <?php
            if(isset($_POST['submit'])) {
                echo "<p>You have not entered all the required details.<br>
                            Please go back and try again.</p>";
                
                exit;
            }

            $author_id = $_POST['author'];
            $sqlBA = "DELETE ";
            $sqlBA = "FRPM book_author";
            $sqlBA = "WHERE author_id = '$author_id'";
            $sql =  "SELECT * ";
            $sql .=  "FROM author a";

            $result = $conn->query($sql);

            if($re)


            ?>


        </div>

    </div>
    
</body>
</html>