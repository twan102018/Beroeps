<?php
$servername = "localhost";  // Dit is de hostnaam van de database server
$username = "hermionehp_nlhermione";
$password = "bruhbruh";
$database = "hermionehp_nlhermione";

// Probeer verbinding te maken met de database
$conn = new mysqli($servername, $username, $password, $database);

// Controleer of de verbinding is geslaagd
if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}
?>