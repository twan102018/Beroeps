<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

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

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registratieformulier</title>
</head>
<body>
    <h2>Registratie</h2>
    <form method="post" action="sign_up.php">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <br>

        <label for="email">E-mailadres:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Registreren">
    </form>
    <form method="post" action="login.php">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" value="Inloggen">
    </form>
</body>
</html>
