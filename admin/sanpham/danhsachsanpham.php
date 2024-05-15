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
     $sql = "SELECT * FROM chitietsanpham, danhmuc,quatang,sanpham,thongsokythuat 
     WHERE sanpham.id_sanpham = thongsokythuat.id_sanpham AND sanpham.id_sanpham = chitietsanpham.id_sanpham 
          AND sanpham.id_danhmuc = danhmuc.id_danhmuc AND sanpham.id_quatang = quatang.id_quatang
     ORDER BY sanpham.id_sanpham desc 
     LIMIT $begin,5";
     $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
     <div class="card">
          <div class="card-header">
               <h2>Danh sách sản phẩm</h2>
          </div>
          <div class="card-body">
               <table class="table">
                    <tr>
                         <th>STT</th>
                         <th>Tên sản phẩm</th>
                         <th>Giá sản phẩm</th>
                         <th>Ảnh sản phẩm</th>
                         <th>Tên danh muc</th>
                         <th>Nổi bật</th>
                         <th>Tên quà tặng</th>
                         <th>Chi tiết sản phẩm</th>
                         <th>Thông số kỹ thuật</th>
                         <th>Xóa</th>
                    </tr>
                    <?php
                             $i = $begin + 1;
                             while($row = mysqli_fetch_array($query)){?>
                    <tr>
                         <th><?php echo $i++; ?></th>
                         <td><?php echo $row['tensp']; ?></td>
                         <td><?php echo number_format($row['gia'], 0, '.', '.')?>&#8363</td>
                         <td><img src="../images/product/<?php echo $row['hinhanh'] ?>" width="100px"></td>
                         </th>
                         <td><?php echo $row['tendm']; ?></td>
                         <td><?php echo $row['noibat']; ?></td>
                         <td><?php echo $row['tenqt']; ?></td>
                         <th>
                              <a class="btn-show"
                                   href="sanpham/hienthichitiet.php?id=<?php echo $row['id_sanpham']; ?>">Chi
                                   tiết</a>
                         </th>
                         <th>
                              <a class="btn-show"
                                   href="sanpham/hienthithongso.php?id=<?php echo $row['id_sanpham']; ?>">Thông số</a>
                         </th>
                         <th>
                              <a class="btn-delete" onclick="return xoa('<?php echo $row['tensp']; ?>')"
                                   href="xoa.php?id=<?php echo $row['id_sanpham'] ?>">Xóa</a>
                         </th>

                    </tr>
                    <?php 
                             }
                         ?>
               </table>
          </div>
          <div class="phantrang">
               <?php
                  $sql_trang = "SELECT * FROM chitietsanpham, danhmuc,quatang,sanpham,thongsokythuat 
                    WHERE sanpham.id_sanpham = thongsokythuat.id_sanpham AND sanpham.id_sanpham = chitietsanpham.id_sanpham 
                       AND sanpham.id_danhmuc = danhmuc.id_danhmuc AND sanpham.id_quatang = quatang.id_quatang ";

                    $query_trang = mysqli_query($conn, $sql_trang);
                    $row_count = mysqli_num_rows($query_trang);
                    $trang = ceil($row_count / 5);
                    ?>
               <ul>
                    <?php
                         for ($i = 1; $i <= $trang; $i++) {
                         ?>
                    <li><a href="index.php?page=danhsachsanpham&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                         }
                         ?>

               </ul>
          </div>
     </div>
</div>

<script>
function xoa(name) {
     return conf = confirm("Bạn có chắc chắn muốn xóa " + name + " không ?");
}
</script>