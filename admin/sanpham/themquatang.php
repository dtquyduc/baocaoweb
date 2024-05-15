<?php 
// require '../../connect.php';
     $sql = "SELECT * FROM quatang";
     $query = mysqli_query($conn, $sql);

     if(isset($_POST['sbm'])){
       
          $tenqt = $_POST['tenqt'];

          $sql_quatang = "INSERT INTO quatang(tenqt) VALUES ( '$tenqt')";
          $query_quatang = mysqli_query($conn, $sql_quatang);
          header('location:index.php?page=danhsachquatang');

     }
?>

<div class="container-from">
     <h1>Thêm quà tặng </h1>
     <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
               <label for="tenqt">Tên quà tặng:</label>
               <input type="text" id="tenqt" class="form-control" name="tenqt" required>
          </div>


          <button type="submit" name="sbm" class="btn-success">Thêm quà tặng </button>
     </form>
</div>