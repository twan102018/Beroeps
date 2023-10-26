<?php
include 'forms_script.php'
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
    <form action="process_form.php" method="post">
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
        <input type="text" name "description2" required><br>
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
