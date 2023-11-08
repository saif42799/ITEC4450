<?php
    function htc($text) {
        return htmlspecialchars($text);
    }

    $fName = $lName = $email = $phone = $street = $city = $state = $zip = $regex1 = $regex2  = $regex3 = "";
    $errors = array('fName'=>'','lName'=>'','email'=>'','phone'=>'','street'=>'','city'=>'','state'=>'',
                    'zip'=>'','regex1'=>'','regex2'=>'','regex3'=>''); 

    if(isset($_POST['submit'])) {
        // check first name
        if(empty($_POST['fName']))
            $errors['fName'] = 'First name is required';
        else {
            $fName = $_POST['fName'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$fName))
                $errors['fName'] = 'First name can only contain letters or spaces';
        }

        // check last name
        if(empty($_POST['lName']))
            $errors['lName'] = 'Last name is required';
        else {
            $lName = $_POST['lName'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$lName))
                $errors['lName'] = 'Last name can only contain letters or spaces';
        }

        // check email
        if(empty($_POST['email']))
            $errors['email'] = 'Email is required';
        else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors['email'] = 'Email Must be valid';
        }

        // check phone
        if(empty($_POST['phoneNumber']))
            $errors['[phone]'] = 'Phone is required';
        else {
            $phone = $_POST['phoneNumber'];
            if(!preg_match('/^\d{3}\-\d{3}\-\d{4}$/',$phone))
                $errors['phone'] = 'Phone must be valid';
        }

        // check street
        if(empty($_POST['street']))
            $errors['street'] = 'Street is required';
        else {
            $street = $_POST['street'];
         
        }

        // check city
        if(empty($_POST['city']))
            $errors['city'] = 'City is required';
        else {
            $city = $_POST['city'];
            if(!preg_match('/^[a-zA-Z\s\.\-]+$/',$city))
                $errors['city'] = 'City name can only contain letters or spaces';
        }

       // check state
        if(empty($_POST['state']))
            $errors['state'] = 'State is required';
        else {
            $state = $_POST['state'];
            if(!preg_match('/[a-zA-Z]{2}$/',$state))
                $errors['state'] = 'State can only contain 2 letters';
        }

        // check zip
        if(empty($_POST['zip']))
            $errors['zip'] = 'Zip is required';
        else {
            $zip = $_POST['zip'];
            if(!preg_match('/^\d{5}(?:-\d{4})?$/',$zip))
                $errors['zip'] = 'zip must be valid';
        }

        // check regex1
        if(empty($_POST['regex1']))
            $errors['regex1'] = 'Regex1 is required';
        else {
            $regex1 = $_POST['regex1'];
            # Student must provide the regular expression to validate regex1
            if(!preg_match('/abc/',$regex1))
                $errors['regex1'] = 'Regex1 must be valid';
        }

        // check regex2
        if(empty($_POST['regex2']))
            $errors['regex2'] = 'Regex2 is required';
        else {
            $regex2 = $_POST['regex2'];
             # Student must provide the regular expression to validate regex2
            if(!preg_match('/\d{3}/',$regex2))
                $errors['regex2'] = 'Regex2 must be valid';
        }

        // check regex3
        if(empty($_POST['regex3']))
            $errors['regex3'] = 'Regex3 is required';
        else {
            $regex3 = $_POST['regex3'];
             # Student must provide the regular expression to validate regex3
            if(!preg_match('/\D*\d\D*\d\D*\d\D*/',$regex3))
                $errors['regex3'] = 'Regex3 must be valid';
        }

        


    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Lab Ch4 Regex</title>
</head>
<body>
    <div class="container w3-blue-grey">
        <header class="container w3-center">
            <h1>Lab Ch4 Regular Expressions (regex)</h1>
            <h1>by Saif Shaikh</h1>
        </header>

        <form class="container w3-sand" action="regexLabCh4.php" method="POST">
            <fieldset>
                <label>First Name</label>
                <input type="text" class="w3-input w3-border" name="fName" value="<?php echo $fName; ?>">
                <div class="w3-red"><?php echo htc($errors['fName']); ?></div>

                <label>Last Name</label>
                <input type="text" class="w3-input w3-border" name="lName" value="<?php echo $lName; ?>">
                <div class="w3-red"><?php echo htc($errors['lName']); ?></div>

                <label>Email</label>
                <input type="text" class="w3-input w3-border" name="email" value="<?php echo $email; ?>">
                <div class="w3-red"><?php echo htc($errors['email']); ?></div>

                <label>Phone Number</label>
                <input type="text" class="w3-input w3-border" name="phoneNumber" value="<?php echo $phone; ?>">
                <div class="w3-red"><?php echo htc($errors['phone']); ?></div>

                <label>Street</label>
                <input type="text" class="w3-input w3-border" name="street" value="<?php echo $street; ?>">
                <div class="w3-red"><?php echo htc($errors['street']); ?></div>

                <label>City</label>
                <input type="text" class="w3-input w3-border" name="city" value="<?php echo $city; ?>">
                <div class="w3-red"><?php echo htc($errors['city']); ?></div>

                <label>State</label>
                <input type="text" class="w3-input w3-border" name="state" value="<?php echo $state; ?>"
                maxlength = "12" >
                <div class="w3-red"><?php echo htc($errors['state']); ?></div>

                <label>Zip</label>
                <input type="text" class="w3-input w3-border" name="zip" value="<?php echo $zip; ?>">
                <div class="w3-red"><?php echo htc($errors['zip']); ?></div>

                <label>Regex1 - All Strings containing 'abc'</label>
                <input type="text" class="w3-input w3-border" name="regex1" value="<?php echo $regex1; ?>">
                <div class="w3-red"><?php echo htc($errors['regex1']); ?></div>

                <label>Regex2 - All strings containing 3 consecutive digits</label>
                <input type="text" class="w3-input w3-border" name="regex2" value="<?php echo $regex2; ?>">
                <div class="w3-red"><?php echo htc($errors['regex2']); ?></div>

                <label>Regex3 - All strings containing 3 non-consecutive digits</label>
                <input type="text" class="w3-input w3-border" name="regex3" value="<?php echo $regex3; ?>">
                <div class="w3-red"><?php echo htc($errors['regex3']); ?></div>

            </fieldset>

            <br><input type="submit" class="w3-btn w3-blue-grey" name="submit" value="submit">

        </form>
        <div class="container w3-sand">
            <?php
                if(isset($_POST['submit']) && !array_filter($errors)) {
                    echo "Success! All data is valid";
                }
            ?> 

        </div>

    </div>
    
</body>
</html>
