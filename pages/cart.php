<?php
if (!isset($_SESSION['username'])) {
    header("location:index.php?url=login");
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
// var_dump($_SESSION['cart']);
// var_dump($_POST['soluong']);
// exit;
$error = false;
$noti = false;
if (isset($_GET['action'])) {
    // print_r($_POST);
    // exit;
    switch ($_GET['action']) {
        case "add":
            update_cart(true);
            // var_dump($_POST);
            // exit;
            header("location:index.php?url=cart");
            break;
        case "delete":
            // var_dump($_SESSION['cart']);
            // exit;
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            header("location:index.php?url=cart");
            break;
        case "submit":
            if (isset($_POST['capnhat'])) { //cap nhat so luong san pham
                update_cart();
                // header("location:index.php?url=cart");
            } else if (isset($_POST['dathang'])) { //dat hang
                if (empty($_POST['nguoinhan'])) {
                    $error = "Bạn chưa nhập tên của người nhận";
                } elseif (empty($_POST['sdt'])) {
                    $error = "Bạn chưa nhập số điện thoại người nhận";
                } elseif (empty($_POST['diachi'])) {
                    $error = "Bạn chưa nhập địa chỉ người nhận";
                }
                if ($error == false && !empty($_POST['soluong'])) {
                    // var_dump(implode(',', array_keys($_POST['soluong'])));
                    // var_dump(array_keys($_POST['soluong']));
                    // exit;
                    $product_sql = "SELECT * FROM `sanpham` WHERE `id_sanpham` IN (" . implode(',', array_keys($_POST['soluong'])) . ")";
                    $products = mysqli_query($conn, $product_sql);
                    //tinh tong gia tien don hang
                    $total = 0;
                    while ($row = mysqli_fetch_array($products)) {
                        $orderProducts[] = $row;
                        $total +=   $row['gia'] * $_POST['soluong'][$row['id_sanpham']];
                    }
                    $sql_taikhoan = "SELECT * FROM `taikhoan` WHERE `tentaikhoan`='" . $_SESSION['username'] . "'";
                    $select_taikhoan = mysqli_query($conn, $sql_taikhoan);
                    $result_taikhoan = mysqli_fetch_array($select_taikhoan);
                    $insert_donhang = "INSERT INTO `donhang` (`id_donhang`, `tenkhachhang`, `sodienthoai`, `diachi`, `ghichu`, `tongtien`,`id_taikhoan`) VALUES (NULL, '" . $_POST['nguoinhan'] . "', '" . $_POST['sdt'] . "', '" . $_POST['diachi'] . "', '" . $_POST['ghichu'] . "', '" . $total . "','" . $result_taikhoan['id_taikhoan'] . "')";
                    $insertOrder = mysqli_query($conn, $insert_donhang);
                    $orderID = $conn->insert_id; // Lấy id từ table vừa thêm vào
                    // var_dump($orderID);
                    // exit;
                    $insertString = "";
                    // var_dump($orderProducts);
                    // echo count($orderProducts);
                    // exit;
                    foreach ($orderProducts as $key => $product) {
                        $insertString .= "(NULL, '" . $orderID . "', '" . $product['id_sanpham'] . "', '" . $_POST['soluong'][$product['id_sanpham']] . "', '" . $product['gia'] . "')";
                        if ($key != count($orderProducts) - 1) {
                            $insertString .= ",";
                        }
                    }
                    // var_dump($insertString);
                    // exit;
                    $insert_chitietdonhang = "INSERT INTO `chitietdonhang` (`id_chitietdonhang`, `id_donhang`, `id_sanpham`, `soluong`, `gia`) VALUES " . $insertString . ";";
                    $insertOrder = mysqli_query($conn, $insert_chitietdonhang);
                    $noti = "Đặt hàng thành công";
                    unset($_SESSION['cart']);
                }
            }
            break;
    }
}
// var_dump($_SESSION['cart']);
// var_dump($_SESSION['cart'][18]);
// exit;
if (!empty($_SESSION['cart'])) {
    $sql = "SELECT * FROM `sanpham` WHERE id_sanpham IN(" . implode(',', array_keys($_SESSION['cart'])) . ")";
    // var_dump(implode(',', array_keys($_SESSION['cart'])));
    // var_dump(array_keys($_SESSION['cart']));
    // exit;
    $product = mysqli_query($conn, $sql);
    // var_dump($product);
    // exit;
?>
    <form action="index.php?url=cart&action=submit" method="post">
        <table class="cart">
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Số tiền</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <?php
                $total = 0;
                while ($row = mysqli_fetch_array($product)) {
                ?>
                    <td class="cart-product">
                        <div class="cart-left">
                            <div class="cart-image">
                                <img src="images/product/<?php echo $row['hinhanh'] ?>" width="160px" height="160px" alt="">
                            </div>
                            <div class="cart-content">
                                <b><?php echo $row['tensp'] ?></b>
                            </div>
                        </div>
                    </td>
                    <td><?php echo number_format($row['gia'], 0, ',', '.') . 'vnđ' ?></td>
                    <td>
                        <input min="1" class="input-card" type="number" name="soluong[<?php echo $row['id_sanpham'] ?>]" id="" value="<?php echo $_SESSION["cart"][$row['id_sanpham']] ?>">
                    </td>
                    <td><?php echo number_format($row['gia'] * $_SESSION["cart"][$row['id_sanpham']], 0, ',', '.') . 'vnđ' ?></td>
                    <td>
                        <a href="index.php?url=cart&action=delete&id=<?php echo $row['id_sanpham'] ?>">
                            <button type="button" class="cart-delete">Xóa</button>
                        </a>
                    </td>
            </tr>
        <?php
                    $total += $row['gia'] * $_SESSION["cart"][$row['id_sanpham']];
                }
        ?>
        <tr>
            <td></td>
            <td colspan="2"><span>Tổng thanh toán:</span></td>
            <td><span><?php echo number_format($total, 0, ',', '.') . 'vnđ' ?></span></td>
        </tr>
        </table>
        <div class="btn-update">
            <button type="submit" name="capnhat">Cập nhật</button>
        </div>
        <div class="form-order">
            <div class="form-order_wrap">
                <div class="group-client">
                    <label for="nguoinhan">Người nhận:</label>
                    <input type="text" name="nguoinhan" id="nguoinhan" value="<?php echo isset($_POST['nguoinhan']) ? $_POST['nguoinhan'] : "" ?>">
                </div>
                <div class="group-phone">
                    <label for="sdt">Số điện thoại:</label>
                    <input type="number" name="sdt" id="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : "" ?>">
                </div>
                <div class="group-address">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" name="diachi" id="diachi" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : "" ?>">
                </div>
                <div class="group-note">
                    <label for="ghichu">Ghi chú</label>
                    <textarea name="ghichu" id="ghichu" cols="60" rows="10"></textarea>
                </div>
                <div class="btn-order">
                    <button name="dathang" type="submit">Đặt hàng</button>

                </div>
            </div>
    </form>
    </div>
<?php  } else if (empty($_POST['soluong'])) {
    $noti = 'Vỏ hàng rỗng';
} ?>
<div class="noti">
    <?php echo $error ?>
    <?php echo $noti ?>
</div>
<div class="back">
    <a href="index.php?url=product">
        <button type="button">
            Tiếp tục mua hàng
        </button>
    </a>
</div>