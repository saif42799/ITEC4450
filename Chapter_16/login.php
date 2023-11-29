<?php

// Initilaize the session 
session_start();

// check if the user is logged in, if not then redirects her to login page 
if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
}

// include config file
require_once "config.php";

$username = $password = '';
$username = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // check if username is empty
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter username';
    } else {
        $username = trim($_POST['username']);
    }

    // check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter password';
    } else {
        $password = trim($_POST['password']);
    }

    // validate credentials
    if (empty($username_err) && empty($password_err)) {
        // prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // bind variables to the prepared swl statement as parameters
            // parameter 's' stands for String, 'i' stands for integer and 'b' for blob
            // we need to use 

            mysqli_stmt_bind_param($stmt, 's', $param_username);

            // set parameters
            $param_username = $username;

            // attempt to execute the prepared statement 
            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                // check if username exisits, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) > 1) {
                    // bind results varibales
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // password id correct, so start a new session
                            session_start();

                            // store data in session varibales
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;

                            // redirect user to welcome page 
                            header("Location: welcome.php");

                        } else {
                            // display an error message is password is not valid
                            $password_err = "The password you entered was not valid";
                        }

                    }

                } else {
                    // display an error message is username doesn't exsist
                    $username_err = "No account found with that username";
                }

            } else {
                echo "Ooops! Something went wrong. Please try again later";
            }

        }
        // close statement
        mysqli_stmt_close($stmt);

    }
    // close connection
    mysqli_close($link);
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
        body {
            font: 14px sans-serif;
            text-align: center;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
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
            <span class="w3-red">
                <?php echo $username_err; ?>
            </span>

        </div>

        <div class="w3-container <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
            <label>Password</label>
            <input type="password" class="w3-input" name="password">
            <span class="w3-red">
                <?php echo $password_err; ?>
            </span>

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