<?php
function showAllTable($conn, $tableName)
{
    $sql = "SELECT * FROM  " . $tableName;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function showTableCondition($conn, $tableName, $col, $id)
{
    $sql = "SELECT * FROM $tableName WHERE $col = " . $id;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function showProductLimit($conn, $tableName, $lm_star, $lm_end)
{
    $sql = "SELECT * FROM $tableName  LIMIT $lm_star ,$lm_end";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function showNewProduct($conn, $quantity)
{
    $sql = "SELECT * FROM `sanpham` ORDER BY `id_sanpham` DESC LIMIT " . $quantity;
    $result = mysqli_query($conn, $sql);
    return $result;
}
function showProductFeatured($conn, $featured, $quantity)
{
    $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc AND danhmuc.noibat = $featured LIMIT $quantity";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function update_cart($add = false)
{
    foreach ($_POST['soluong'] as $id => $soluong) {
        if ($add) {
            $_SESSION['cart'][$id] += $soluong;
        } else {
            $_SESSION['cart'][$id] = $soluong;
        }
    }
}
