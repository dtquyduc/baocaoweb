<?php 

     $sql = "SELECT * FROM sanpham, danhmuc, quatang WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc and sanpham.id_quatang = quatang.id_quatang";
     $query = mysqli_query($conn, $sql);

     if(isset($_POST['sbm'])){
          $id_danhmuc = $_POST['id_danhmuc'];
          $tensp = $_POST['tensp'];
          $gia = $_POST['gia'];
          $id_quatang = $_POST['id_quatang'];

          $hinhanh = $_FILES['hinhanh']['name'];
          $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
     move_uploaded_file($hinhanh_tmp, '../images/product/'.$hinhanh);
          $sql_sanpham = "INSERT INTO sanpham(tensp, gia, hinhanh, id_danhmuc, id_quatang) 
          VALUES ( '$tensp', '$gia', '$hinhanh', '$id_danhmuc', '$id_quatang')";
          $query_sanpham = mysqli_query($conn, $sql_sanpham);
        

          header('location:index.php?page=danhsachsanpham');

       
     }
?>

<div class="container-from">
     <h1>Thêm sản phẩm </h1>
     <form action="" method="post" enctype="multipart/form-data">
          <!-- Sản phẩm -->
          <div class="form-group">
               <label for="tensp">Tên sản phẩm:</label>
               <input type="text" id="tensp" class="form-control" name="tensp" required>
          </div>

          <div class="form-group">
               <label for="gia">Giá:</label>
               <input type="number" id="gia" class="form-control" min="0" name="gia" required>
          </div>

          <div class="form-group">
               <label for="hinhanh">Hình ảnh sản phẩm:</label>
               <input type="file" id="hinhanh" name="hinhanh" required>
          </div>

          <div class="form-group">
               <label for="id_danhmuc">Danh mục:</label>
               <select name="id_danhmuc" id="id_danhmuc" class="form-control">

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
               <label for="id_quatang">Quà tặng:</label>
               <select name="id_quatang" id="id_quatang" class="form-control">

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

          <button type="submit" name="sbm" class="btn-success">Thêm sản phẩm</button>
     </form>
</div>