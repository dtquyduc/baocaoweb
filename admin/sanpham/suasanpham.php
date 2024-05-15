<?php 
require '../../connect.php';
     $id = $_GET['id'];
     $sql_up = "SELECT * FROM sanpham  WHERE id_sanpham = $id";

     $query_up = mysqli_query($conn, $sql_up);
     $row_up = mysqli_fetch_array($query_up);

     if(isset($_POST['sbm'])){
          $id_danhmuc = $_POST['id_danhmuc'];
          $id_quatang = $_POST['id_quatang'];
          $tensp = $_POST['tensp'];
          $gia = $_POST['gia'];
          if($_FILES['hinhanh']['name'] == ''){
               $hinhanh = $row_up['hinhanh'];
          }else{
          $hinhanh = $_FILES['hinhanh']['name'];
          $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
          move_uploaded_file($hinhanh_tmp, '../../images/product/'.$hinhanh);
          }

          $sql_sanpham = "UPDATE sanpham SET id_danhmuc = '$id_danhmuc', id_quatang = '$id_quatang', tensp = '$tensp', gia = '$gia', hinhanh = '$hinhanh' WHERE id_sanpham = $id";
          $query_sanpham = mysqli_query($conn, $sql_sanpham);

       header('location:../index.php?page=danhsachsua');
       
     }
?>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/main.css">
<div class="container-from">
     <h1>Sửa sản phẩm </h1>
     <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
               <label for="ten">Tên sản phẩm:</label>
               <input type="text" id="tensp" class="form-control" name="tensp" required
                    value="<?php echo $row_up['tensp'] ?>">
          </div>

          <div class="form-group">
               <label for="gia">Giá:</label>
               <input type="number" id="gia" class="form-control" name="gia" required
                    value="<?php echo $row_up['gia'] ?>">
          </div>

          <div class="form-group">
               <label for="hinhanh">Hình ảnh sản phẩm:</label>
               <input type="file" id="hinhanh" name="hinhanh">
               <img src="../../images/product/<?php echo $row_up['hinhanh'] ?>" alt="" width="100px" height="100px">
          </div>

          <div class="form-group">
               <label for="id_danhmuc">Thương hiệu</label>
               <select name="id_danhmuc" id="id_danhmuc" class="form-control" required
                    value="<?php echo $row_up['id_danhmuc'] ?>">
                    <?php
                         $sql = "SELECT * FROM danhmuc";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option value="<?php echo $row['id_danhmuc'] ?>"><?php  echo $row['tendm'] ?></option>
                    <?php
                          }
                         ?>
               </select>
          </div>

          <div class="form-group">
               <label for="id_quatang">Quà tặng</label>
               <select name="id_quatang" id="id_quatang" class="form-control" required
                    value="<?php echo $row_up['id_quatang'] ?>">
                    <?php
                         $sql = "SELECT * FROM quatang";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option value="<?php echo $row['id_quatang'] ?>"><?php  echo $row['tenqt'] ?></option>
                    <?php
                          }
                         ?>
               </select>
          </div>

          <button type="submit" name="sbm" class="btn-success">Sửa sản phẩm</button>
     </form>
</div>