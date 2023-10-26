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
    </script>
    <script src="../scripts/toggle.js" defer></script>
    <link rel="stylesheet" href="../styling/signup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<nav>
    <ul>
      <li><a href="../../index.html">Home</a></li>
      <li><a href="#news">Upload</a></li>
      <li><a href="#contact">Contact</a></li>
      <li style="float:right">
        <img src="../images/pfp/default.png" alt="" id="dropdown-trigger">
        <div class="dropdown-content">
          <!-- Add your dropdown content here -->
          <a href="../pages/forms.php" class="active">Log In/Register</a>
        </div>
      </li>
      <li style="float:right"><a href="#contact"><span class="material-symbols-outlined">
        shopping_cart
        </span></a></li>
    </ul>
</nav>
    <div class="container">
    <form id="registerForm" method="post" action="forms.php">
        <input type="hidden" name="form_mode" value="register">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>

        <label for="email">E-mailaddress:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Register">
    </form>

    <form id="loginForm" method="post" action="forms.php">
        <input type="hidden" name="form_mode" value="login">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Login">
    </form>

    <button onclick="toggleForm()" id="button">go to login</button>

</div>
</body>
</html>