<?php
require 'config.php';

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
                echo "Registratie succesvol!";
            } else {
                echo "Fout bij de registratie: " . $conn->error;
            }
        } else {
            echo "Deze gebruikersnaam of e-mailadres bestaat al.";
        }
    } elseif ($formMode === 'login') {
        // Login form is submitted
        // Implement login logic here
        // For example, you can check the username and password against the database
        $loginSql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($loginSql);
        
        if ($result->num_rows > 0) {
            echo "Inloggen succesvol!";
        } else {
            echo "Fout bij inloggen: Gebruikersnaam of wachtwoord onjuist.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registratie- en Inlogformulier</title>
    <style>
        #registerForm {
            display: block;
        }

        #loginForm {
            display: none;
        }
    </style>
    <script>
        function toggleForm() {
            var registerForm = document.getElementById("registerForm");
            var loginForm = document.getElementById("loginForm");
            var button = document.getElementById("button");

            if (registerForm.style.display === "block") {
                registerForm.style.display = "none";
                loginForm.style.display = "block";
                button.innerHTML = "register";
            } else {
                registerForm.style.display = "block";
                loginForm.style.display = "none";
                button.innerHTML = "login";

            }
        }
    </script>
</head>
<body>
    <h2>Registratie en Inloggen</h2>

    <form id="registerForm" method="post" action="forms.php">
        <input type="hidden" name="form_mode" value="register">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <br>

        <label for="email">E-mailadres:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Register">
    </form>

    <form id="loginForm" method="post" action="forms.php">
        <input type="hidden" name="form_mode" value="login">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Login">
    </form>

    <button onclick="toggleForm()" id="button">login</button>
</body>
</html>
