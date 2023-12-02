<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {font: 14px sans-serif;}
        .wrapper {width: 350px; padding: 20px;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Sign up</h1>
        <p>Please fill out this form to create an account</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST">
            <div class="w3-container <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
                <label>Username</label>
                <input type="text" class="w3-input" name="username" value="<?php echo
                    $username; ?>">
                <span class="w3-red">
                    <?php echo $username_err; ?>
                </span>

        </div>
        </form>


    </div>

    <div class="w3-container <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
        <label>Password</label>
        <input type="password" class="w3-input" name="password">
        <span class="w3-red">
            <?php echo $password_err; ?>
        </span>

    </div>

    <div class="w3-container <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?> ">
            <label>Confirm Password</label>
            <input type="password" class="w3-input" name="password">
            <span class="w3-red">
                <?php echo $confirm_password_err; ?>
            </span>

    </div>

    <div class="w3-container">
        <input type="submit" class="w3-btm" value="Submit"> 
        <input type="reset" class="w3-btm" value="Reset"> 

    </div>
    
</body>
</html>