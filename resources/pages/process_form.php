<?php
include 'config.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
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

    // Handle file upload (you should add more error handling here)
   // ...

   if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    // Check the file type
    $file_type = $_FILES["file"]["type"];

    if ($file_type === "image/png") {
        $file_name = $_FILES["file"]["name"];
        $file_tmp_name = $_FILES["file"]["tmp_name"];

        // Generate a unique filename by adding a timestamp
        $timestamp = time();
        $file_name = $timestamp . '_' . $file_name;

        // Move the uploaded file to your desired directory
        $upload_directory = "../images/items/"; // Change this to your actual directory
        $destination = $upload_directory . $file_name;

        if (move_uploaded_file($file_tmp_name, $destination)) {
            // Now, insert the data into your database
            $sql = "INSERT INTO verzamelaar (item_name, beschrijving, beschrijving2, prijs, tags, file_name) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the SQL statement
            $stmt = $connection->prepare($sql);

            // Bind parameters and execute the query
            $stmt->bind_param("sssiss", $item_name, $description, $description2, $price, $tags, $file_name);

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
            // Handle file upload errors
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Only PNG files are allowed for upload.";
    }
} else {
    // Handle file upload errors
    echo "Error uploading file.";
}
}
?>