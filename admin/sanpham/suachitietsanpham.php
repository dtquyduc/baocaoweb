<?php 
require '../../connect.php';
$id = $_GET['id'];
     $sql_up = "SELECT * FROM chitietsanpham WHERE id_sanpham = '$id'";
     $query_up = mysqli_query($conn, $sql_up);
     $row_up = mysqli_fetch_array($query_up);

     if(isset($_POST['sbm'])){
          $id_sanpham = $_POST['id_sanpham'];
          $thuonghieu = $_POST['thuonghieu'];        
          $masp = $_POST['masp'];
          
          $sql_chitietsanpham = "UPDATE chitietsanpham SET id_sanpham = '$id_sanpham', thuonghieu = '$thuonghieu', masp = '$masp' WHERE id_sanpham = '$id'";

          $query_chitietsanpham = mysqli_query($conn, $sql_chitietsanpham);


          header('location:../index.php?page=danhsachsua');

        

     }
?>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/main.css">

<div class="container-from">
     <h1>Sửa chi tiết sản phẩm </h1>
     <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
               <label for="id_sanpham">Sản phẩm:</label>
               <select name="id_sanpham" id="id_sanpham" class="form-control">

                    <?php
                         $sql = "SELECT * FROM sanpham where id_sanpham = '$id'";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option required value="<?php echo $row_up['id_sanpham'] ?>">
                         <?php  echo $row['tensp'] ?>
                    </option>
                    <?php
                          }
                         ?>
               </select>
          </div>

          <div class="form-group">
               <label for="thuonghieu">Thương hiệu:</label>
               <input type="text" id="thuonghieu" class="form-control" name="thuonghieu" required
                    value="<?php echo $row_up['thuonghieu'] ?>">
          </div>

          <div class="form-group">
               <label for="masp">Mã sản phẩm:</label>
               <input type="text" id="masp" class="form-control" name="masp" required
                    value="<?php echo $row_up['masp'] ?>">
          </div>

          <button type="submit" name="sbm" class="btn-success">Sửa chi tiết sản phẩm</button>
     </form>

</div>