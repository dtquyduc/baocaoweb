<?php 
require '../../connect.php';
$id = $_GET['id'];
     $sql_up = "SELECT * FROM danhmuc where id_danhmuc = '$id'";
     $query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_array($query_up);
     if(isset($_POST['sbm'])){
       
          $tendm = $_POST['tendm'];
          $noibat = $_POST['noibat'];

          $sql_danhmuc = "UPDATE danhmuc SET tendm = '$tendm', noibat = '$noibat' WHERE id_danhmuc = '$id'";
          $query_danhmuc = mysqli_query($conn, $sql_danhmuc);

       header('location:../index.php?page=danhsachdanhmuc');

     }
?>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/main.css">

<div class="container-from">
     <h1>Sửa danh mục</h1>
     <form action="" method="post">

          <div class="form-group">
               <label for="tendm">Tên danh muc:</label>
               <input type="text" id="tendm" class="form-control" name="tendm" required
                    value="<?php echo $row_up['tendm'] ?>">
          </div>
          <div class="form-group">
               <label for="noibat">Nổi bật:</label>
               <input type="number" id="noibat" class="form-control" name="noibat" required
                    value="<?php echo $row_up['noibat'] ?>">
          </div>

          <button type="submit" name="sbm" class="btn-success">Sửa</button>
     </form>
</div>