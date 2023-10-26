<?php
// Include your database connection script
include 'config.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize form data
    $item_name = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $description2 = filter_input(INPUT_POST, 'description2', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

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

    // Get the PNG link from the form and sanitize it
    $png_link = filter_input(INPUT_POST, 'png_link', FILTER_SANITIZE_URL);

    // Check if the data is valid
    if ($item_name && $description && $description2 && $price !== false && $png_link) {
        // Prepare the SQL statement
        $sql = "INSERT INTO verzamelaar (item_name, beschrijving, beschrijving2, prijs, tags, png_link) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $connection->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the query
            $stmt->bind_param("sssiss", $item_name, $description, $description2, $price, $tags, $png_link);

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
    } else {
        // Handle invalid or missing data
        echo "Invalid or missing data in the form.";
    }
}
?>
