<?php 
	include "utilFunctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bookstore - Delete Customers</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>Delete Customers</h2>
		</header>

		<?php
			include 'mainMenu.php';
		?>

        	
		<form class="container w3-sand" action="deleteCustomer.php" method="post">

			<fieldset>
			
				<label>Customer</label>
				<select class="w3-select" name="customer">
					<option value="" disabled selected>Choose Customer</option>
					<?php
						include "connectDatabase.php";
						
						$sql  = "SELECT c.customer_id, c.firstName, c.lastName ";
						$sql .= "FROM customer c LEFT JOIN orders o";
                        $sql .= "on c.customer_id = o.customer_id";
                        $sql .= "WHERE o.order_id IS NULL";
												
						$result = $conn->query($sql);
			
						if($result->num_rows > 0) 
							while($row = $result->fetch_assoc()) {
								$customerId = $row['customer_id'];
								$customerFirstName = $row['firstName'];
                                $customerLastName = $row['lastName'];
								
								echo "<option value='$customerId'>$customerId-$customerLastName, $customerFirstName</option>";
							}
							
						$conn->close();	
					?>
				</select><br>
                <b>NOTE</b>: Only customers with no orders can be deleted
				
					

			</fieldset>

			<p><input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Delete customer" /></p>
		</form>

        <div class="container">
            <?php
            if(isset($_POST["submit"])) {
                if(!isset($_POST['customer'])) {
                    echo "<p>You have not entered all the required details.<br>
                                Please go back and try again.</p>";
                    exit;
                }

                $customer_id = $_POST['customer'];

                include "connectDatabase.php";

                $sql  = "DELETE ";
				$sql .= "FROM customer ";
				$sql .= "WHERE customer_id = '$customer_id'";

                if($conn->query($sql) === TRUE) {
                    echo "Customer record for cutomer_id=$customer_id succesfully deleted!<br>";

                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


                $conn->close();
            }
            
            
            ?>
                        


        </div>

	
	</div>
</body>
</html>