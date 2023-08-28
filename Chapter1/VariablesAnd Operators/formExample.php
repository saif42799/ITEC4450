<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="w3-card-4" style="width:50%">
        <header class="w3-container w3-teal w3-cemter">
            <h1>Student Information</h1>
        </header>

    </div>

    <!-- GET sends data publically  -->
    <!-- POST sends data privately  -->
    <form action="formExample.php" method="GET" class="w3-container">
        First Name<input type='text' name='fName'><br>
        Middle Name<input type='text' name='mName'><br>
        Last Name<input type='text' name='LName'><br>
        Classification
        <select name="classification">
            <option class="freshman">Freshman</option>
            <option class="sophmore">Freshman</option>
            <option class="junior">Freshman</option>
            <option class="senior">Freshman</option>
            <option class="grad">Freshman</option>
        </select><br>
        <input type="submit" name="submit">
    </form>

    <div class="w3-container w3-teal">
        <?php
        if (isset($_GET['submit'])) {
            if (empty($_GET['fName']) || empty($_GET['lName'])) {
                echo "You have not entered all the required info. ";
                echo "Please go back and try again... ";
                exit;
            }

            #everything appears to be fine, then proceed to process the form

            $fName = $_GET['fName'];
            $mName = $_GET['mName'];
            $lName = $_GET['lName'];
            $classification = $_GET['classification'];

            echo "<h3>Form successfully submitted!</h3>";
            echo "First Name: $fName<br>";
            echo "Middle Name: $mName<br>";
            echo "Last Name: $lName";
            echo "Classification: $classification<br>";
        }
        ?>
    </div>





</body>

</html>