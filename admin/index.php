<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../connect.php';
if (!isset($_SESSION['username']) && $_SESSION['quyen'] == 1) {
    header("location:../index.php?url=login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang quản trị</title>
     <link rel="stylesheet" href="css/admin.css">
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/danhsachsanpham.css">
     <link rel="stylesheet" href="css/danhsachsua.css">
     <link rel="stylesheet" href="css/danhsachdanhmuc.css">
     <link rel="stylesheet" href="css/danhsachquatang.css">
     <link rel="stylesheet" href="css/danhsachdathang.css">
     <link rel="stylesheet" href="css/authenticator.css">
     <!-- Link icon -->
     <script src="https://kit.fontawesome.com/ec3dc95749.js" crossorigin="anonymous"></script>


</head>

<body>
     <div class="container">
          <header>
               <?php require 'sanpham/header.php' ?>
          </header>


          <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            require 'sanpham/' . $page . '.php';
        }
        else {
            require 'sanpham/danhsachsanpham.php';
        }
        ?>


     </div>
</body>

</html>