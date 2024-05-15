<?php
if (isset($_GET['trang'])) {
     $page = $_GET['trang'];
} else {
     $page = 1;
}
if($page == '' || $page == 1){
     $begin = 0;
}else{
     $begin = ($page * 5) - 5;
}
     $sql = "SELECT * FROM chitietdonhang, donhang, sanpham, quatang 
     WHERE sanpham.id_sanpham = chitietdonhang.id_sanpham 
     AND chitietdonhang.id_donhang = donhang.id_donhang 
     AND sanpham.id_quatang = quatang.id_quatang
     ORDER BY chitietdonhang.id_chitietdonhang desc 
     LIMIT $begin,5";
     $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
     <div class="card">
          <div class="card-header">
               <h2>Danh sách đặt hàng</h2>
          </div>
          <div class="card-body">
               <table class="table">
                    <tr>
                         <th>STT</th>
                         <th>Tên khách hàng</th>
                         <th>Số điện thoại</th>
                         <th>Địa chỉ</th>
                         <th>Ghi chú</th>
                         <th>Tên sản phẩm</th>
                         <th>Ảnh sản phẩm</th>
                         <th>Tên quà tặng</th>
                         <th>Giá sản phẩm</th>
                         <th>Số lượng</th>
                         <th>Tổng tiền</th>

                    </tr>
                    <?php
                             $i = $begin + 1;
                             while($row = mysqli_fetch_array($query)){?>
                    <tr>
                         <td><?php echo $i++; ?></td>
                         <td><?php echo $row['tenkhachhang']; ?></td>
                         <td><?php echo $row['sodienthoai']; ?></td>
                         <td><?php echo $row['diachi']; ?></td>
                         <td><?php echo $row['ghichu']; ?></td>
                         <td><?php echo $row['tensp']; ?></td>
                         <td><img src="../images/product/<?php echo $row['hinhanh'] ?>" width="100px"></td>
                         <td><?php echo $row['tenqt']; ?></td>
                         <td><?php echo number_format($row['gia'], 0, '.', '.')?>&#8363</td>
                         <td><?php echo $row['soluong']; ?></td>
                         <td style="font-weight: bold"><?php echo number_format($row['tongtien'], 0, '.', '.'); ?>&#8363
                         </td>


                    </tr>
                    <?php 
                             }
                         ?>
               </table>
          </div>
          <div class="phantrang">
               <?php
                  $sql_trang = "SELECT * FROM chitietsanpham, danhmuc,quatang,sanpham,thongsokythuat,chitietdonhang, donhang
                    WHERE donhang.id_donhang = chitietdonhang.id_donhang 
                       AND chitietdonhang.id_sanpham = sanpham.id_sanpham
                       AND sanpham.id_sanpham = thongsokythuat.id_sanpham 
                       AND sanpham.id_sanpham = chitietsanpham.id_sanpham 
                       AND sanpham.id_danhmuc = danhmuc.id_danhmuc 
                       AND sanpham.id_quatang = quatang.id_quatang ";

                    $query_trang = mysqli_query($conn, $sql_trang);
                    $row_count = mysqli_num_rows($query_trang);
                    $trang = ceil($row_count / 5);
                    ?>
               <ul>
                    <?php
                         for ($i = 1; $i <= $trang; $i++) {
                         ?>
                    <li><a href="index.php?page=danhsachdathang&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                         }
                         ?>

               </ul>
          </div>
     </div>
</div>