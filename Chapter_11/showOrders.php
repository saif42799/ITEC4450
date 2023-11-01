<?php 
	include "utilFunctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bookstore - Show Orders</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>View All Orders</h2>
		</header>
		<?php
			include 'mainMenu.php';
		?>

		<div class="container w3-sand">
		<?php			
			include "connectDatabase.php";
			
			$sql =  "SELECT c.customer_id, c.firstName, c.lastName, bo.bookOrder_id, o.order_id, o.orderDate, o.shipDate, bo.quantity, bo.paidEach, bo.book_id, b.ISBN, b.title, o.shipCost ";
			$sql .= "FROM book_order bo, customer c, orders o, book b ";
			$sql .= "WHERE c.customer_id = o.customer_id AND o.order_id = bo.order_id AND b.book_id = bo.book_id ";
			$sql .= "ORDER BY o.order_id";
			
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				echo "<table class='w3-table w3-striped'>";
				echo "	<tr class='w3-teal'>";
				echo "		<th>Order ID</th>";
				echo "		<th>Date</th>";
				echo "		<th>Last Name</th>";					
				echo "		<th>First Name</th>";					
				echo "		<th>Book Title</th>";					
				echo "		<th>Qty</th>";					
				echo '		<th>$/Unit</th>';					
				echo '		<th>Shipping Cost</th>';					
				echo "	</tr>";
				
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "	<td>".$row['order_id']."</td>";
					echo "	<td>".$row['orderDate']."</td>";
					echo "	<td>".$row['lastName']."</td>";		
					echo "	<td>".$row['firstName']."</td>";
					echo "	<td>".$row['title']."</td>";
					echo "	<td>".$row['quantity']."</td>";
					echo "	<td>".$row['paidEach']."</td>";
					echo "	<td>".$row['shipCost']."</td>";					
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