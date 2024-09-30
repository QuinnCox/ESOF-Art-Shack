<?php
// Start the session
session_start();
require "db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define hardcoded username and password
    $username = "admin";
    $password = "password123";

    // Get input values from the form
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Check if the username and password match
    if ($inputUsername == $username && $inputPassword == $password) {
        // Set a session variable
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect to a welcome page
        header("Location: welcome.php");
        exit();
    } else {
        // Show an error message
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="art_shack_stylesheet.css">
    <title>Login Page</title>

</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
