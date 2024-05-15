<?php
require '../connect.php';
$id = $_GET['id'];
$sql_tskt = "DELETE FROM thongsokythuat WHERE id_sanpham = $id";
$sql_ctsp = "DELETE FROM chitietsanpham WHERE id_sanpham = $id";
$sql_ctdh = "DELETE FROM chitietdonhang WHERE id_sanpham = $id";
$sql_sp = "DELETE FROM sanpham WHERE id_sanpham = $id";

$query_tskt = mysqli_query($conn, $sql_tskt);
$query_ctsp = mysqli_query($conn, $sql_ctsp);
$query_ctdh = mysqli_query($conn, $sql_ctdh);
$query_sp = mysqli_query($conn, $sql_sp);
header("Location:index.php?page=danhsachsanpham");