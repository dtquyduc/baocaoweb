<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// session_start();
require "connect.php";
require "function.php";
?>
<!DOCTYPE html>
<html lang="en">  

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php
        if (isset($_GET['url'])) {
            echo $_GET['url'];
        } else {
            echo "home";
        }
        ?>
    </title>
    <!-- Link fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/product.css" />
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/authenticator.css">
    <!-- Link icon -->
    <script src="https://kit.fontawesome.com/ec3dc95749.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require "pages/header.php" ?>
    <main class="container">
        <?php
        if (isset($_GET['url'])) {
            $p = $_GET['url'];
            require "pages/" . $p . ".php";
        } elseif (isset($_GET['search'])) {
            require "pages/search.php";
        } else {
            require "pages/home.php";
        }
        ?>
    </main>
    <?php require "pages/footer.php" ?>
    <script src="./js/main.js"></script>
</body>

</html>
<?php
mysqli_close($conn);
?>
<?php
?>