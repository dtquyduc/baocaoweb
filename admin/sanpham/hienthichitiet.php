<?php
     require '../../connect.php';
     $id = $_GET['id'];
     $sql = "SELECT * FROM chitietsanpham, sanpham WHERE sanpham.id_sanpham = chitietsanpham.id_sanpham and sanpham.id_sanpham = $id";
     $query = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/hienchitiet.css">


<div class="container-fluid">

     <div class="card">
          <div class="card-header">
               <h2>Chi tiết sản phẩm</h2>
               <a href="../index.php?page=danhsachsanpham">Trở về</a>
          </div>
          <div class="card-body">
               <?php
   
    while ($row = mysqli_fetch_array($query)) { ?>
               <table>
                    <tr>
                         <td>Tên sản phẩm</td>
                         <th><?php echo $row['tensp'] ?></th>
                    </tr>
                    <tr>
                         <td>Giá sản phẩm</td>
                         <th><?php echo number_format($row['gia'], 0, '.', '.') ?>&#8363</th>
                    <tr>
                         <td>Thương hiệu</td>
                         <th><?php echo $row['thuonghieu'] ?></th>
                    </tr>

                    <tr>
                         <td>Mã sản phẩm</td>
                         <th><?php echo $row['masp'] ?>
                         </th>
                    </tr>

               </table>
               <?php
    }
    ?>
          </div>
     </div>

</div>