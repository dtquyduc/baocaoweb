<?php
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    unset($_SESSION['cart']);
}
header("location:index.php?url=login");
