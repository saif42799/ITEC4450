<?php

// Initialize the session

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome. php");
    exit;
}
    // Include config file
    require_once "config.php";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";

        } else {
            $username = trim($_POST["username"]);

        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {

            $password_err = "Please enter your password.";

        } else {

            $password = trim($_POST["password"]);

        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters

                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;


                // Attempt to execute the prepared statement

                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password

                    if (mysqli_stmt_num_rows($stmt) == 1) {

                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {

                                // Password is correct, so start a new session 
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: welcome. php");

                            } else {
                                // Display an error message if password is not valid
                                $password_err = "The password you entered was not valid.";

                            }

                        }
                    }

                } else {

                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";

                }

            } else {

                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement    
        mysqli_stmt_close($stmt);

    }

    // Close connection
    mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Login/title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style type="text/css">
            body {
                font: 14px sans-serif;
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
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="w3-container <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="w3-input" value="<?php echo $username; ?>">
                <span class="w3-red">
                    <?php echo $username_err; ?>
                </span>
            </div>

            <div class="w3-container <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="w3-input">
                <span class="w3-red">
                    <?php echo $password_err; ?>
                </span>
            </div>

            <div class="w3-container">
                <input type="submit" class="w3-btn w3-purple" value="Login">
            </div>

            <p>Don't have an account? < a href="register.php"> Sign up now</a>.</p>
        </form>

    </div>

</body>

</html>