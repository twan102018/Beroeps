<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../styling/contact.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="#news">Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
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
<form method="post" action="https://formsubmit.co/088901@glr.nl">      
  <input name="name" type="text" class="feedback-input" placeholder="Name"/>   
  <input name="email" type="text" class="feedback-input" placeholder="Email" minlength="5" pattern="[^ @]*@[^ @]*" require/>
  <input name="subject" type="text" class="feedback-input" placeholder="Subject" require/>
  <input type="hidden" name="_next" value="https://hermionehp.nl">
  <textarea name="text" class="feedback-input" placeholder="Comment" require></textarea>
  <input type="submit" value="SUBMIT"/>
</form>
</div>
</body>
</html>