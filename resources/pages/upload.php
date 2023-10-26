<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection script (establishes $conn)
include 'config.php';
include 'forms_script.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data without filtering
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $description2 = $_POST['description2'];
    $price = $_POST['price'];

    // Initialize tags as 0
    $tags = 0;

    // Check if Rare and Limited checkboxes are selected
    if (isset($_POST['tags'])) {
        if (in_array("Rare", $_POST['tags'])) {
            $tags += 1; // Rare selected, add 1
        }
        if (in_array("Limited", $_POST['tags'])) {
            $tags += 2; // Limited selected, add 2
        }
    }

    // Get the PNG link from the form without filtering
    $png_link = $_POST['png_link'];

    // Prepare the SQL statement
    $sql = "INSERT INTO verzamelaar (item_name, beschrijving, beschrijving2, prijs, tags, png_link) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement using the correct connection variable ($conn)
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the query
        $stmt->bind_param("sssdss", $item_name, $description, $description2, $price, $tags, $png_link);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo "Item uploaded successfully!";
        } else {
            // Handle any database insertion errors
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Handle database connection or query preparation errors
        echo "Error preparing the SQL statement.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Items</title>
    <link rel="stylesheet" href="../styling/upload.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <nav>
        <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="upload.php" class="active">Upload</a></li>
            <li><a href="#news">Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li style="float:right">
                <img src="../images/pfp/default.png" alt="" id="dropdown-trigger">
                <div class="dropdown-content">
                    <?php if (!$loggedInUsername): ?>
                        <a href="forms.php" class="active">Log In/Register</a>
                    <?php endif; ?>
                    <?php if ($loggedInUsername): ?>
                        <a href="logout.php">
                            <?php echo "Log Out"; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </li>
            <?php if ($loggedInUsername): ?>
                <li style="float:right"><a href="#">
                    <?php echo $loggedInUsername; ?>
                </a></li>
            <?php endif; ?>
            <li style="float:right"><a href="#contact"><span class="material-symbols-outlined">
                shopping_cart
            </span></a></li>
        </ul>
    </nav>
    <div class="container">
    <form action="upload.php" method="post">
        <label for="item_name">Item Name</label>
        <input type="text" name="item_name" required>
        <br>
        <div id="tags">
            <label for="tags">Tags:</label>
            <label for="rare">Rare💎</label>
            <input type="checkbox" name="tags[]" value="Rare">
            <label for="limited">Limited🕗</label>
            <input type="checkbox" name="tags[]" value="Limited">
        </div>
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" required><br>
        <label for="description2">Description 2</label>
        <input type="text" name="description2" required><br>
        <label for="price">Price</label>
        <input type="number" name="price" required>
        <br>
        <!-- Add a field for PNG link -->
        <label for="png_link">PNG Image Link:</label>
        <input type="text" name="png_link" required>
        <br>
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>
