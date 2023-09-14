<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Students' File</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container w3-sand">
        <header class="w3-container w3-center">
            <h1>Student's Information</h1>
        </header>
        <div class="w3-container">
            <?php
            $myFile = fopen('inputData.csv', 'r') or die("Unable to open file!");
            
            $outTable = "<table class='w3-table w3-striped w3-border w3-light-blue'>";
            $outTable .= "<tr class='w3-teal'>";
            $outTable .= "   <th>First Name</th>";
            $outTable .= "   <th>Last Name</th>";
            $outTable .= "   <th>Age</th>";
            $outTable .= "   <th>Classification</th>";
            $outTable .= "</tr>";
            
            # Loop through all file rows
            while(!feof($myFile)) {
                $curLineArray = fgetcsv($myFile, 0, ',');

                # Begin current table row
                $outTable .= "<tr>";

                # Loop through all elements od the current line
                if(is_countable($curLineArray))
                    for($i = 0; $i < count($curLineArray); $i++)
                        $outTable .= "<td>".$curLineArray[$i]."</td>";

                #close current table row
                $outTable .= "</tr>";

            }

            $outTable .= "</table>";
            fclose($myFile);

            echo $outTable;
            ?>
        </div>

    </div>
    
</body>
</html>