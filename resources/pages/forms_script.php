<?php
session_start();
ini_set('session.gc_maxlifetime', 30 * 24 * 3600);
require 'config.php';

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
} else {
    $loggedInUsername = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formMode = $_POST['form_mode'];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($formMode === 'register') {
            // Registration form is submitted
            $email = $_POST["email"];

            // Check if the username or email already exists in the database
            $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $result = $conn->query($checkSql);

            if ($result->num_rows == 0) {
                // User doesn't exist, so proceed with the registration
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "Registration successful!";
                } else {
                    echo "Error during registration: " . $conn->error;
                }
            } else {
                echo "This username or email already exists.";
            }
        } elseif ($formMode === 'login') {
            // Login form is submitted
            // Implement login logic here
            // For example, you can check the username and password against the database
            $loginSql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $conn->query($loginSql);

            if ($result->num_rows > 0) {
                // Set the user as logged in
                $_SESSION['username'] = $username;
                $loggedInUsername = $username;
                echo "Login successful!";
            } else {
                echo "Error during login: Incorrect username or password.";
            }
        }
    }
}
?>