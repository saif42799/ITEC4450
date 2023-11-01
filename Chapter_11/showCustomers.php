<?php 
	include "utilFunctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bookstore - View Customers</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>View All Customers</h2>
		</header>
		<?php
			include 'mainMenu.php';
		?>

		<div class="container w3-sand">
		<?php			
			include "connectDatabase.php";
			
			$sql =  "SELECT * ";
			$sql .= "FROM customer ";
			$sql .= "ORDER BY lastName, firstName ";
			
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				echo "<table class='w3-table w3-striped'>";
				echo "	<tr class='w3-teal'>";
				echo "		<th>ID</th>";
				echo "		<th>First Name</th>";
				echo "		<th>Last Name</th>";		
				echo "		<th>Email</th>";							
				echo "		<th>Phone</th>";		
				echo "		<th>Address</th>";			
				echo "		<th>City</th>";					
				echo "		<th>State</th>";					
				echo "	</tr>";
				
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "	<td>".$row['customer_id']."</td>";
					echo "	<td>".$row['firstName']."</td>";
					echo "	<td>".$row['lastName']."</td>";		
					echo "	<td>".$row['email']."</td>";
					echo "	<td>".$row['phoneNumber']."</td>";		
					echo "	<td>".$row['address']."</td>";						
					echo "	<td>".$row['city']."</td>";						
					echo "	<td>".$row['state']."</td>";						
					echo "</tr>";
				}
				echo "</table>";
			}
			else
				echo "0 results<br>";
			
			$conn->close();
		?>
		</div>
	</div>
</body>
</html>