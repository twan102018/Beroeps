<?php 
include 'resources/pages/shopping_cart.php';
include 'resources/pages/forms_script.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="resources/scripts/cart.js"defer></script>

</head>
<body>
  <nav>
    <ul>
      <li><a class="active" href="#Home">Home</a></li>
      <li><a href="resources/pages/upload.php">Upload</a></li>
      <li><a href="#news">Orders</a></li>
      <li><a href="resources/pages/contact.php">Contact</a></li>
      <li><a href="resources/pages/info.php">Info</a></li>
      <li style="float:right">
        <img src="resources/images/pfp/default.png" alt="" id="dropdown-trigger">
        <div class="dropdown-content">
    <?php if (!$loggedInUsername): ?>
        <a href="resources/pages/forms.php" class="active">Log In/Register</a>
    <?php endif; ?>
    <?php if ($loggedInUsername): ?>
        <a href="resources/pages/logout.php">
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
      <li style="float:right">
    <a href="#contact">
        <span class="material-symbols-outlined">shopping_cart</span>
    </a>
</li>
    </ul>
  </nav>
    <div class="banner">
        <img src="resources/images/banner/Banner.png" alt="">
    </div>
    <div class="wrapper">
        <?php include 'resources/pages/cards.php'; // cards display from database ?>
    </div>
</body>
</html>