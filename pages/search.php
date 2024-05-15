<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
$searchKey = "%{$search}%";
// $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%'";
// $result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM sanpham WHERE tensp LIKE ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $searchKey);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
    echo '<div class="product-search">';
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="product-item">
                    <div class="image">
                    <a href="index.php?url=detail&id=' . $row['id_sanpham'] . '">
                    <img src="./images/product/' . $row['hinhanh'] . '" alt="" />
                    </a>
                    </div>
                    <div class="content">
                    <div class="name">
                    <h3>' . $row['tensp'] . '
                    </h3>
                    </div>
                    <div class="price">
                    <span>' . number_format($row['gia'], 0, ',', '.') . '&#8363;</span>
                    </div>
                    </div>
                    <div class="btn">
                    <a href="index.php?url=detail&id=' . $row['id_sanpham'] . '">
                    <button type="submit">Xem</button>
                    </a>
                    </div>
                    </div>';
    }
    echo '</div>';
} else if (mysqli_num_rows($result) == 0) {
    echo 'Không tìm thấy sản phẩm với từ khóa: ' . $search;
}
