<?php
include "utilFunctions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Show Author</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container w3-blue-grey">
        <header class="container w3-center">
            <h1>Bookstore</h1>
            <h2>Veiw All Author</h2>

        </header>

        <?php
        include 'mainMenu.php';
        ?>

        <form class="container w3-sand" action="newPublisher.php" method="post">

			<fieldset>
				<label for="name">Name</label>
				<input  class="w3-input w3-border" type="text" name="title"/>

				<label for="email">Email</label>
				<input  class="w3-input w3-border" type="text" name="isbn"  />
				
				<label for="phone">Phone</label>
				<input  class="w3-input w3-border" type="text" name="price" />						
            
            </fieldset>
            <input class="w3-button w3-blue-grey" type="submit" name="submit" value="Add new publisher"><br>
        </form>

        <div class="container w3-sand">
        <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['phoneNumber'])) {
                    echo "You have not entered all the required information. Please complete that and try again.<br>";
                    exit;
                }

                include 'mainMenu.php';

                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "INSERT INTO publisher (name, email, phoneNumber) VAlUES ('$name','$email','$phoneNumber')";

                if($conn->query($sql) == TRUE) {
                    echo "<b>New record created successfully!</b><br>";
                    echo "Name: ".htc($name)."<br>";
                    echo "Email: ".htc($email)."<br>";
                    echo "Phone: ".htc($phoneNumber)."<br>";

                }
                else {
                    echo "Error: ".$sql."<br>";
                    echo $conn->error."<br>";
                }



                $conn->close();
            }
        ?>

        </div>

	

    </div>
    
</body>
</html>