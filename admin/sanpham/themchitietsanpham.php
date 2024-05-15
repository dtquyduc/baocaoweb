<?php 

     $sql = "SELECT * FROM chitietsanpham";
     $query = mysqli_query($conn, $sql);

     if(isset($_POST['sbm'])){
          $id_sanpham = $_POST['id_sanpham'];
          $thuonghieu = $_POST['thuonghieu'];        
          $masp = $_POST['masp'];
          $sql_chitietsanpham = "INSERT INTO chitietsanpham( id_sanpham, thuonghieu, masp) VALUES ( '$id_sanpham','$thuonghieu', '$masp')";
          $query_chitietsanpham = mysqli_query($conn, $sql_chitietsanpham);
          header('location:index.php?page=danhsachsanpham');

     }
?>

<div class="container-from">
     <h1>Thêm chi tiết sản phẩm </h1>
     <form action="" method="post">
          <div class="form-group">
               <label for="id_sanpham">Sản phẩm:</label>
               <select name="id_sanpham" id="id_sanpham" class="form-control">
                    <?php
                         $sql = "SELECT * FROM sanpham order by id_sanpham desc";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option value="<?php echo $row['id_sanpham'] ?>"><?php  echo $row['tensp'] ?></option>
                    <?php
                          }
                         ?>
               </select>
          </div>

          <div class="form-group">
               <label for="thuonghieu">Thương hiệu:</label>
               <input type="text" id="thuonghieu" class="form-control" name="thuonghieu" required>
          </div>

          <div class="form-group">
               <label for="masp">Mã sản phẩm:</label>
               <input type="text" id="masp" class="form-control" name="masp" required>
          </div>

          <button type="submit" name="sbm" class="btn-success">Thêm chi tiết sản phẩm</button>
     </form>
</div>