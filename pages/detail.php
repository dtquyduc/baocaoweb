<?php
$id = $_GET['id'];
$sql = "SELECT * FROM sanpham,chitietsanpham WHERE sanpham.id_sanpham = chitietsanpham.id_sanpham AND sanpham.id_sanpham = $id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) { ?>
    <div class="wrap-top row">
        <div class="left">
            <div class="image-big">
                <img src="./images/product/<?php echo $row['hinhanh'] ?>" alt="">
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h3><?php echo $row['tensp'] ?></h3>
            </div>
            <div class="desc">
                <span>Thương hiệu: <a href=""> <?php echo $row['thuonghieu'] ?></a></span>
                <span>Mã sản phẩm: <a href="#"><?php echo $row['masp'] ?></a></span>
            </div>
            <div class="price-detail">
                <span><?php echo number_format($row['gia'], 0, ',', '.') ?>&#8363;</span>
            </div>
            <div class="gift">
                <span>
                    <i class="fa-solid fa-gift"></i>
                    quà tặng
                </span>
                <ul>
                    <?php
                    $sql = "SELECT * FROM sanpham,quatang WHERE sanpham.id_quatang = quatang.id_quatang AND sanpham.id_sanpham = $id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result))
                        echo '
                <li>
                    <i class="fa-regular fa-square-check"></i><span>' . $row['tenqt'] . '</span>
                </li>';
                    ?>
                </ul>
            </div>
            <div class="btn-detail">
                <form action="index.php?url=cart&action=add" method="post">
                    <div class="quantity">
                        <span>Số lượng:</span>
                        <input required type="number" name="soluong[<?php echo $_GET['id'] ?>]" value="1" min="1" id="">
                    </div>
                    <?php
                    $sql_pro = "SELECT * FROM sanpham,chitietsanpham WHERE sanpham.id_sanpham = chitietsanpham.id_sanpham AND sanpham.id_sanpham = $id";
                    $result_pro = mysqli_query($conn, $sql_pro);
                    $row_pro = mysqli_fetch_array($result_pro);
                    ?>
                    <button type="submit" name="btn_addCart">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<div class="wrap-detail">
    <h2>Đặc điểm nổi bật</h2>
    <?php
    $result = showTableCondition($conn, 'thongsokythuat', 'id_sanpham', $id);
    while ($row = mysqli_fetch_array($result)) { ?>
        <table>
            <tr>
                <td>Thành phần</td>
                <td><?php echo $row['thanhphan'] ?></td>
            </tr>
            <tr>
                <td>Chất liệu</td>
                <td><?php echo $row['chatlieu'] ?>
                </td>
            </tr>
            <tr>
                <td>Chất lượng</td>
                <td><?php echo $row['chatluong'] ?>
                </td>
            </tr>
            <tr>
                <td>Độ co giãn</td>
                <td><?php echo $row['docogian'] ?></td>
            </tr>
            <tr>
                <td>Kiểu dáng</td>
                <td><?php echo $row['kieudang'] ?>
                </td>
            </tr>
            <tr>
                <td>Sản xuất</td>
                <td>
                    <?php echo $row['sanxuat'] ?>
                </td>
            </tr>
            <tr>
                <td>QTH Shop</td>
                <td><?php echo $row['qthshop'] ?></td>
            </tr>          
        </table>
    <?php
    }
    ?>
</div>