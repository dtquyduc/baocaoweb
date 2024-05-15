<?php
$id = $_GET['id'];
require '../../connect.php';
     $sql = "SELECT * FROM thongsokythuat, sanpham, chitietsanpham WHERE sanpham.id_sanpham = chitietsanpham.id_sanpham and sanpham.id_sanpham = thongsokythuat.id_sanpham and sanpham.id_sanpham = $id";
     $query = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/hienthongso.css">

<div class="container-fluid">
     <div class="card">
          <div class="card-header">
               <h2>Thông số kỹ thuật sản phẩm</h2>
               <a href="../index.php?page=danhsachsanpham">Trở về</a>

          </div>
          <div class="card-body">
               <?php

    while ($row = mysqli_fetch_array($query)) { ?>
               <table>
                    <tr>
                         <td>Mã sản phẩm</td>
                         <th><?php echo $row['masp'] ?></th>
                    <tr>
                         <td>Tên sản phẩm</td>
                         <td><?php echo $row['tensp'] ?></td>
                    <tr>
                         <td>CPU</td>
                         <td><?php echo $row['cpu'] ?></td>
                    </tr>
                    <tr>
                         <td>RAM</td>
                         <td><?php echo $row['ram'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Ổ cứng</td>
                         <td><?php echo $row['ocung'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Card đồ họa</td>
                         <td><?php echo $row['cardohoa'] ?></td>
                    </tr>
                    <tr>
                         <td>Màn hình</td>
                         <td><?php echo $row['manhinh'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Cổng giao tiếp</td>
                         <td>
                              <?php echo $row['conggiaotiep'] ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Audio</td>
                         <td><?php echo $row['audio'] ?></td>
                    </tr>
                    <tr>
                         <td>Bàn phím</td>
                         <td><?php echo $row['banphim'] ?></td>
                    </tr>
                    <tr>
                         <td>Chuẩn LAN</td>
                         <td><?php echo $row['lan'] ?></td>
                    </tr>
                    <tr>
                         <td>Chuẩn WIFI</td>
                         <td><?php echo $row['wifi'] ?></td>
                    </tr>
                    <tr>
                         <td>Bluetooth</td>
                         <td><?php echo $row['bluetooth'] ?></td>
                    </tr>
                    <tr>
                         <td>Webcam</td>
                         <td><?php echo $row['webcam'] ?></td>
                    </tr>
                    <tr>
                         <td>Hệ điều hành</td>
                         <td><?php echo $row['hedieuhanh'] ?></td>
                    </tr>
                    <tr>
                         <td>Pin</td>
                         <td><?php echo $row['pin'] ?></td>
                    </tr>
                    <tr>
                         <td>Trọng lượng</td>
                         <td><?php echo $row['trongluong'] ?></td>
                    </tr>
                    <tr>
                         <td>Màu sắc</td>
                         <td><?php echo $row['mausac'] ?></td>
                    </tr>
                    <tr>
                         <td>Kích thước</td>
                         <td><?php echo $row['kichthuoc'] ?></td>
                    </tr>
               </table>
               <?php
    }
    ?>
          </div>
     </div>

</div>