<?php
	include "utilFunctions.php";	

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bookstore - New Customer Entry</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>New Customer</h2>
		</header>
		
		<?php
			include 'mainMenu.php';
		?>
		
        <form action="newAuthor.php" class="w3-container w3-sand" method="POST">
            <fieldset>
                <label>First Name</label>
                <input class="w3-input w3-border" type="text" name="fName" maxlength="200" size="200">

                <label>Last Name</label>
                <input class="w3-input w3-border" type="text" name="lName" maxlength="200" size="200">

                <label>Email</label>
                <input class="w3-input w3-border" type="text" name="email" maxlength="200" size="200">

                <label>Phone Number</label>
                <input class="w3-input w3-border" type="text" name="phoneNumber" maxlength="200" size="200">

                <label>Address</label>
                <input class="w3-input w3-border" type="text" name="address" maxlength="200" size="200">

                <label>City</label>
                <input class="w3-input w3-border" type="text" name="city" maxlength="200" size="200">

                <label>State</label>
                <input class="w3-input w3-border" type="text" name="state" maxlength="200" size="200">

                <label>Zip</label>
                <input class="w3-input w3-border" type="text" name="zip" maxlength="200" size="200">




            </fieldset>
            <input type="submit" name="submit" class="w3-btn w3-blue-grey" value="Add new Customer">

        </form>
        <?php
        if (isset($_POST["submit"])) {
            if (!isset($_POST["fName"]) || !isset($_POST["lName"]) || !isset($_POST["email"]) || !isset($_POST["phoneNumber"])
            || !isset($_POST["address"]) || !isset($_POST["city"]) || !isset($_POST["state"]) || !isset($_POST["zip"]) ) {
                echo"You have not entered all the required details.<br>
                 Please complete that and try again.<br>";
                exit;
            }

            include "connectDatabase.php";

            $fName = mysqli_real_escape_string($conn, $_POST["fName"]);
            $lName = mysqli_real_escape_string($conn, $_POST["lName"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);
            $address = mysqli_real_escape_string($conn, $_POST["address"]);
            $city = mysqli_real_escape_string($conn, $_POST["city"]);
            $state = mysqli_real_escape_string($conn, $_POST["state"]);
            $zip  = mysqli_real_escape_string($conn, $_POST["zip"]);

            $sql = "INSERT INTO customer (firstName, lastName, email, phoneNumber, address, city, state, zip) 
            VALUES ('$fName', '$lName', '$email', '$phoneNumber', '$address', '$city', '$state', '$zip')";

            if($conn->query($sql) === TRUE) {
                $author_id = $conn->insert_id;
                echo"<strong>Customer created successfully!</strong><br>";
                echo"Customer ID: $customer_id<br>";
                echo"First Name: $fName<br>";
                echo"Last Name: $lName<br>";
                echo"Email: $email<br>";
                echo"Phone Number: $phoneNumber<br>";
                echo"Address: $address<br>";
                echo"City: $city<br>";
                echo"State: $state<br>";
                echo"Zip: $zip<br>";
                

            } 

            $conn->close();
        }
        ?>

	</div>
</body>
</html>
