<?php
include 'forms_script.php'
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <nav>
        <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="#news">Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
      <li><a href="info.php">Info</a></li>

            <li style="float:right">
                <img src="../images/pfp/default.png" alt="" id="dropdown-trigger">
                <div class="dropdown-content">
    <?php if (!$loggedInUsername): ?>
        <a href="resources/pages/forms.php" class="active">Log In/Register</a>
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