<?php
	include "utilFunctions.php";	

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bookstore - New Book Entry</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container w3-blue-grey">
		<header class="container w3-center">
			<h1>Bookstore</h1>
			<h2>New Book</h2>
		</header>
		<?php
			include 'mainMenu.php';
		?>
		<form class="container w3-sand" action="newBook.php" method="post">

			<fieldset>
				<label>Title</label>
				<input  class="w3-input w3-border" type="text" name="title" maxlength="200" size="200" />

				<label>ISBN</label>
				<input  class="w3-input w3-border" type="text" name="isbn" maxlength="60" size="60" />
				
				<label>Price</label>
				<input  class="w3-input w3-border" type="text" name="price" maxlength="60" size="60" />						
				
				<label>Publication Date</label>
				<input  class="w3-input w3-border" type="date" name="publicationDate" maxlength="60" size="60" />				

				<label>Publisher</label>
				<select class="w3-select" name="publisher">
					<option value="" disabled selected>Choose publisher</option>
					<?php
						include "connectDatabase.php";
						
						$sql = "SELECT * FROM publisher";
						
						$result = $conn->query($sql);
			
						if($result->num_rows > 0) 
							while($row = $result->fetch_assoc()) {
								$pubId = $row['publisher_id'];
								$pubName = $row['name'];
								
								echo "<option value='$pubId'>$pubId-$pubName</option>";
							}
							
						$conn->close();	
					?>
				</select>
				
				
				<label>Book Author(s)</label>
				<input name="auSel" id="auSel" value="None" type="hidden">
				<select class="w3-select" name="authors[]" id="listAuSel">

				</select>
				<input class="w3-button w3-teal w3-round-large" value="Remove author" onclick='removeAuthor()'>
				

				<label>Available Author(s)</label>
				<select class="w3-select" id="listAuAv">
					<option value="" disabled selected>Choose author</option>					
					<?php						
							include "connectDatabase.php";
							
							$sql = "SELECT * FROM author";
							
							$result = $conn->query($sql);
				
							if($result->num_rows > 0) 
								while($row = $result->fetch_assoc()) {
									$authorId = $row['author_id'];
									$authorFirstName = $row['firstName'];
									$authorLastName = $row['lastName'];
									
									echo "<option value='$authorId' id='author-$authorId'>$authorId-$authorLastName, $authorFirstName</option>";
								}
								
							$conn->close();				
					?>
				</select>
				<input class="w3-button w3-teal w3-round-large" value="Add author" onclick="addAuthor()">
										

			</fieldset>

			<input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Add New Book" />
		</form>
		<div class="container w3-sand">
		<?php 
		if(isset($_POST['submit'])) {
				if (!isset($_POST['title']) || !isset($_POST['isbn']) || !isset($_POST['publisher']) || !isset($_POST['auSel']) || !isset($_POST['publicationDate']) || !isset($_POST['price'])) {
					 echo "<p>You have not entered all the required details.<br />
								 Please go back and try again.</p>";
					 exit;
				}

				include "connectDatabase.php";
				
				// create short variable names
				$title = mysqli_real_escape_string($conn, $_POST['title']);
				$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
				$price = mysqli_real_escape_string($conn, $_POST['price']);
				$pubDate = mysqli_real_escape_string($conn, $_POST['publicationDate']);
				$publisher = $_POST['publisher'];		
				$authors = $_POST['auSel'];

				
				$sql = "INSERT INTO book (ISBN, title, publicationDate, publisher_id, price) VALUES ('$isbn', '$title', '$pubDate', $publisher, $price)";
				
				if ($conn->query($sql) === TRUE) {
						$book_id = $conn->insert_id;
						echo "<strong>Book created successfully!</strong><br>";						
						echo "Book id: $book_id<br>";
						echo "Title: $title<br>";
						echo "ISBN: $isbn<br>";
						echo "Price: $price<br>";
						echo "Publication Date: $isbn<br>";
						echo "Publisher's ID: $pubDate<br>";
						echo "Authors' ID: $authors<br>";
						echo "<hr>";
						// ---------------------------------------------------
						// -  Create a new record in the book_author table   -
						// -  for each book's author                         -
						// ---------------------------------------------------
						
						//convert string of authors' id to an array
						$authorsIdArray = explode(";", $authors);
						for($i = 0; $i < count($authorsIdArray); $i++) {
								$curAuthorId = $authorsIdArray[$i];
								
								//if the author id is empty, do not create row. 
								//ignore and continue looping the rest of the array
								if(empty($curAuthorId))
									continue;
								
								$sql = "INSERT INTO book_author (book_id, author_id) VALUES ('$book_id', '$curAuthorId')";
								
								if ($conn->query($sql) === TRUE) 									
									echo "AuthorId: $curAuthorId added successfully<br>";								
								else
									echo "Error: " . $sql . "<br>" . $conn->error;	
						}
				} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				$conn->close();					
		}
		?>
		</div>
	</div>
	<script>
		function addAuthor() {
			var listSel = document.getElementById('listAuSel');
			var listAv = document.getElementById('listAuAv');	
			var auSel = document.getElementById('auSel');	
			
			//Make sure there are items to add		
			if(listAv.options.length < 1)
				return;	
				
			var listAvIndex = listAv.selectedIndex;
			var listAvInner = listAv[listAvIndex].innerHTML;
			var listAvVal = listAv[listAvIndex].value;	
			
			listSel.options[listSel.options.length] = new Option(listAvInner, listAvVal);
			
			listAv[listAvIndex] = null;

			sortSelect(listSel);
			
			result="";
			for(i = 0; i < listSel.options.length; i++)
				result += listSel.options[i].value + ";";
				
			auSel.value = result;
		}
		
		function removeAuthor() {
			var listSel = document.getElementById('listAuSel');
			var listAv = document.getElementById('listAuAv');		
			var auSel = document.getElementById('auSel');		

			//Make sure there are items to add		
			if(listSel.options.length < 1)
				return;	
				
			var listSelIndex = listSel.selectedIndex;
			var listSelInner = listSel[listSelIndex].innerHTML;
			var listSelVal = listSel[listSelIndex].value;

			listAv.options[listAv.options.length] = new Option(listSelInner, listSelVal);
			
			listSel[listSelIndex] = null;
			
			sortSelect(listAv);			
			
			result="";
			for(i = 0; i < listSel.options.length; i++)
				result += listSel.options[i].value + ";";
				
			auSel.value = result;			
		}
	</script>
</body>
</html>
