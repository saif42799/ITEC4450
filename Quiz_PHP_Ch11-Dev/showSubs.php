<?php 
	include "utilFunctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>727 Subs - Show Sub</title>	
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
			<h2>Show Subs</h2>
		</header>
		<?php
			include 'mainMenu.php';
		?>
		
		<div class="w3-container w3-center">
			<div class="w3-card-4" style="width:100%">
            <?php
			    include 'connectDatabase.php';

                
		    ?>
			
			</div>
		</div>
	</div>	
</body>
</html>