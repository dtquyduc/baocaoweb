<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['quyen'] == 1) {
        header("location:admin/index.php");
    }
    if ($_SESSION['quyen'] == 0) {
        header('location:index.php?');
    }
}
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `taikhoan` WHERE `tentaikhoan`= '$username' AND `matkhau` = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['tentaikhoan'];
        $_SESSION['quyen'] = $row['quyen'];
        if ($_SESSION['quyen'] == 0) {
            header("location:index.php?url=home");
        } else {
            header("location:admin/index.php");
        }
    } else {
        echo '<script language="javascript">alert("Tài khoản không tồn tại!"); window.location="index.php?url=login";</script>';
    }
}
?>
<div class="container">
    <div class="wrap">
        <div class="heading">
            <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
            <span class="headed">Bạn chưa có tài khoản ? <a href="index.php?url=register">Đăng ký tại đây</a></span>
        </div>
        <form class="user" action="" method="post">
            <div class="auth_form">
                <div class="form">
                    <div class="outside">Tên đăng nhập <span class="star">*</span></div>
                    <input type="text" placeholder="Tên đăng nhập" name="username" required>
                    <div class="outside">Mật khẩu <span class="star">*</span></div>
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                    <button type="submit" name="dangnhap">Đăng nhập </button>
                </div>
            </div>
        </form>
    </div>
</div>