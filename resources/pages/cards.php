<?php 
include 'config.php';

$sql = "SELECT * FROM verzamelaar";
$result = $conn->query($sql);

// Check if there is data to display
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Extract data for each card
        $item_name = $row['item_name'];
        $description = $row['beschrijving'];
        $description2 = $row['beschrijving2'];
        $tags = $row['tags'];
        $price = $row['prijs'];
        $png_link = $row['png_link'];

        // Create a card for each item
        echo '<div class="card card1">';
        echo '<div class="poster">';
        echo '<img src="' . $png_link . '" alt="poster">';
        echo '</div>';
        echo '<div class="details">';
        echo '<h3>' . $item_name . '</h3>';
        echo '<div class="tags">';
        
        // Check for tags and add appropriate CSS classes
        if ($tags & 1) {
            echo '<span class="bg-info">Rare💎</span>';
        }
        if ($tags & 2) {
            echo '<span class="bg-danger">Limited🕗</span>';
        }
        
        echo '<span class="bg-price">$' . $price . '</span>';
        echo '<br><br>';
        echo '<button class="add_shopping"><span class="material-symbols-outlined add_remove">add_shopping_cart</span></button>';
        echo '<button class="remove_shopping"><span class="material-symbols-outlined add_remove">remove_shopping_cart</span></button>';
        echo '</div>';
        echo '<div class="info">';
        echo '<p>' . $description . '</p>';
        echo '<p>' . $description2 . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No items to display.";
}
?>