<?php
if (isset($_POST['dangky'])) {
    $tentaikhoan = trim($_POST['tentaikhoan']);
    $matkhau = md5(trim($_POST['matkhau']));
    $xacnhanmatkhau = md5(trim($_POST['xacnhanmatkhau']));
    $sdt = trim($_POST['sdt']);
    $sql = "SELECT * FROM taikhoan WHERE tentaikhoan = '$tentaikhoan'";
    $result = mysqli_query($conn, $sql);
    if ($matkhau !== $xacnhanmatkhau)
    {
        echo '<script language="javascript">alert("Mật khẩu và xác nhận mật khẩu không khớp!"); window.location="index.php?url=register";</script>';
        exit();
    }
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Tài khoản đã tồn tại!"); window.location="index.php?url=register";</script>';
    } else {
        $sql = "INSERT INTO taikhoan (tentaikhoan,matkhau,sdt) VALUES ('$tentaikhoan','$matkhau','$sdt')";
        $result = mysqli_query($conn, $sql);
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="index.php?url=login";</script>';

    }
    
    // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau không
    if ($matkhau !== $xacnhanmatkhau) {
        echo '<script language="javascript">alert("Mật khẩu và xác nhận mật khẩu không khớp!"); window.location="index.php?url=register";</script>';
        exit();
    }

    // Kiểm tra xem tài khoản có tồn tại không
    $sql = "SELECT * FROM taikhoan WHERE tentaikhoan = '$tentaikhoan'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Tài khoản đã tồn tại!"); window.location="index.php?url=register";</script>';
    } else {
        // Mã hóa mật khẩu bằng MD5
        $matkhau_mahoa = md5($matkhau);

        // Thực hiện truy vấn chèn dữ liệu
        $sql = "INSERT INTO taikhoan (tentaikhoan, matkhau, sdt) VALUES ('$tentaikhoan', '$matkhau_mahoa', '$sdt')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="index.php?url=login";</script>';
        } else {
            echo '<script language="javascript">alert("Đăng ký không thành công. Vui lòng thử lại!"); window.location="index.php?url=register";</script>';
        }
    }
}
?>

<div class="container">
    <div class="wrap">
        <div class="heading">
            <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
            <span class="headed">Bạn đã có tài khoản ? <a href="index.php?url=login">Đăng nhập tại đây</a></span>
            <div class="sub_heading">THÔNG TIN CÁ NHÂN</div>
        </div>
        <form class="user" action="" method="post">
            <div class="auth_form">
                <div class="form">
                    <div class="outside">Tên người dùng<span class="star">*</span></div>
                    <input required type="text" placeholder="Tên người dùng" name="tentaikhoan">
                    <div class="outside">Mật khẩu <span class="star">*</span></div>
                    <input required type="password" placeholder="Mật khẩu" name="matkhau">
                    <div class="outside">Xác nhận mật khẩu <span class="star">*</span></div>
                    <input required type="password" placeholder="Xác nhận mật khẩu" name="xacnhanmatkhau">
                    <div class="outside">Số điện thoại<span class="star">*</span></div>
                    <input required type="phonenumber" placeholder="Số điện thoại" name="sdt">
                    <button type="submit" name="dangky">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>
</div>