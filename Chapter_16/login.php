<?php

// Initilaize the session 
session_start();

// check if the user is logged in, if not then redirects her to login page 
if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
}

// include config file
require_once "config.php";

$username = $password =  '';
$username = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body { font: 14px sans-serif; text-align: center; }
        .wrapper { width: 350px; padding: 20px; }
    </style>
</head>
<body class="w3-light-grey">
    <div class="wrapper w3-sand w3-border">
        <h2>Login</h2>
        Please fill in your credentials to login.<br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST"></form>

        <div class="w3-container <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
            <label>Username</label>
            <input type="text" class="w3-input" name="username" value="<?php echo 
            $username; ?>">
            <span class="w3-red"><?php echo $username_err ; ?></span>
        
        </div>

        <div class="w3-container <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
            <label>Password</label>
            <input type="text" class="w3-input" name="password">
            <span class="w3-red"><?php echo $password_err ; ?></span>
     
        </div>

        <div class="w3-container">
            <input type="submit" class="w3-btn w3-purple" value="login">
        </div>
        // missinf stuff here

    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset your password</a>
        <a href="logout.php" class="btn btn-danger">Sign out of your account</a>
    </p>
    
</body>
</html>