<?php
// require '../../connect.php';
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
     ORDER BY sanpham.id_sanpham DESC 
     LIMIT $begin,5";
     $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
     <div class="card">
          <div class="card-header">
               <h2>Danh sách sản phẩm</h2>
          </div>
          <div class="card-body">
               <table class="table-dss">
                    <thead class="thead-dark">
                         <tr>
                              <th>STT</th>
                              <th>Tên sản phẩm</th>
                              <th>Mã sản phẩm</th>
                              <th>Giá</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                             $i = $begin + 1;
                             while($row = mysqli_fetch_array($query)){?>
                         <tr>
                              <th><?php echo $i++; ?></th>
                              <td><?php echo $row['tensp']; ?></td>
                              <td><?php echo $row['masp'] ?></td>
                              <td><img src="../images/product/<?php echo $row['hinhanh'] ?>" width="100px"></td>
                              <th> <a class="btn-s"
                                        href="sanpham/suasanpham.php?id=<?php echo $row['id_sanpham'] ?>">Sửa sản
                                        phẩm</a>
                              </th>
                              <th>
                                   <a class="btn-s"
                                        href="sanpham/suachitietsanpham.php?id=<?php echo $row['id_sanpham']; ?>">Sửa
                                        chi
                                        tiết</a>

                              </th>
                              <th>
                                   <a class="btn-s"
                                        href="sanpham/suathongsokythuat.php?id=<?php echo $row['id_sanpham'] ?>">Sửa
                                        thông số</a>

                              </th>
                         </tr>

                         <?php 
                             }
                         ?>
                    </tbody>
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
                    <li><a href="index.php?page=danhsachsua&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                         }
                         ?>

               </ul>
          </div>
     </div>
</div>