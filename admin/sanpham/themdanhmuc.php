<?php 
// require '../../connect.php';
     $sql = "SELECT * FROM danhmuc";
     $query = mysqli_query($conn, $sql);

     if(isset($_POST['sbm'])){
       
          $tendm = $_POST['tendm'];
          $noibat = $_POST['noibat'];

          $sql_danhmuc = "INSERT INTO danhmuc(tendm, noibat) VALUES ( '$tendm', '$noibat')";
          $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
          header('location:index.php?page=danhsachdanhmuc');

     }
?>

<link rel="stylesheet" href="../css/admin.css">
<div class="container-from">
     <h1>Thêm danh mục </h1>
     <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
               <label for="tendm">Tên danh muc:</label>
               <input type="text" id="tendm" class="form-control" name="tendm" required>
          </div>
          <div class="form-group">
               <label for="noibat">Nổi bật:</label>
               <input type="text" id="noibat" class="form-control" name="noibat" pattern="[01]" value="0">
          </div>

          <button type="submit" name="sbm" class="btn-success">Thêm</button>
     </form>
</div>