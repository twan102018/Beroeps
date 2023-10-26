<?php
include 'forms_script.php'
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../styling/contact.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <nav>
        <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="#news">Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
      <li><a href="info.php" class="active">Info</a></li>

            <li style="float:right">
                <img src="../images/pfp/default.png" alt="" id="dropdown-trigger">
                <div class="dropdown-content">
    <?php if (!$loggedInUsername): ?>
        <a href="resources/pages/forms.php">Log In/Register</a>
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
    <h2>What's this website about</h2>
    <div class="container2">
<p>This website was created with the purpose of offering a dedicated platform for members of a collectors' organization to showcase their cherished collectibles. Our primary goal is to create a vibrant online community where enthusiasts can come together to share, discuss, and celebrate their passion for surrounding the collections of games. this website is the perfect place to connect with fellow collectors and display your treasures to a like-minded audience.</p>
<p>Our mission is to foster a sense of belonging among collectors and provide a user-friendly space where they can exhibit their collections, exchange stories, and learn from one another's expertise. We encourage collectors of all types to join our growing community, whether you're a seasoned veteran or just starting your collecting journey. Together, we can enrich the world of collecting and bring these remarkable items to a wider audience.</p>
<p>So, whether you're looking to showcase your latest finds, seek advice on preservation and restoration, or simply share your enthusiasm for the world of collecting, this website is here to support your interests and connect you with fellow collectors who share your passion.</p>
</div>
</body>
</html>