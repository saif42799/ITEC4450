<?php
	include "utilFunctions.php";	

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bookstore - Delete Book</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>Delete Book</h2>
		</header>
		
		<?php
			include 'mainMenu.php';
		?>
		
		<form class="container w3-sand" action="deleteBook.php" method="post">

			<fieldset>
			
				<p><label>Book</label>
				<select class="w3-select" name="book">
					<option value="" disabled selected>Choose Book</option>
					<?php
						include "connectDatabase.php";
						
						$sql  = "SELECT * ";
						$sql .= "FROM book b";
												
						$result = $conn->query($sql);
			
						if($result->num_rows > 0) 
							while($row = $result->fetch_assoc()) {
								$bookId = $row['book_id'];
								$bookTitle = $row['title'];
								
								echo "<option value='$bookId'>$bookId-$bookTitle</option>";
							}
							
						$conn->close();	
					?>
				</select>
				</p>
					

			</fieldset>

			<p><input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Delete Book" /></p>
		</form>
		<div class="container">
			<?php
			if(isset($_POST['submit'])) {
				if (!isset($_POST['book'])) {
					 echo "<p>You have not entered all the required details.<br />
								 Please go back and try again.</p>";
					 exit;
				}
				
				$book_id = $_POST['book'];
				$sqlBA  = "DELETE ";
				$sqlBA .= "FROM book_author ";
				$sqlBA .= "WHERE book_id = '$book_id'";
								
				include "connectDatabase.php";
				
				if ($conn->query($sqlBA) === TRUE) {
					echo "Book_author record(s) for book_id=$book_id removed succesfully!<br>";
				}
			  else 
					echo "Error: " . $sqlBA . "<br>" . $conn->error;					
				
				$sql  = "DELETE ";
				$sql .= "FROM book ";
				$sql .= "WHERE book_id = '$book_id'";
				
				if ($conn->query($sql) === TRUE) {
					echo "Book record for book_id=$book_id removed succesfully!<br>";
				}
			  else 
					echo "Error: " . $sql . "<br>" . $conn->error;
				
				$conn->close();					
			}	
			?>
		</div>
	</div>
	
</body>
</html>
