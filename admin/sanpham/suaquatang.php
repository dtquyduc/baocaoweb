<?php 
require '../../connect.php';
$id = $_GET['id'];
     $sql_up = "SELECT * FROM quatang where id_quatang = '$id'";
     $query_up = mysqli_query($conn, $sql_up);
     $row_up = mysqli_fetch_array($query_up);

     if(isset($_POST['sbm'])){
       
          $tenqt = $_POST['tenqt'];

          $sql_quatang = "UPDATE quatang SET tenqt = '$tenqt' WHERE id_quatang = '$id'";
          $query_quatang = mysqli_query($conn, $sql_quatang);

          header('location:../index.php?page=danhsachquatang');
      
     }
?>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/main.css">

<div class="container-from">
     <h1>Sửa quà tặng </h1>
     <form action="" method="post">

          <div class="form-group">
               <label for="tenqt">Tên quà tặng:</label>
               <input type="text" id="tenqt" class="form-control" name="tenqt" required
                    value="<?php echo $row_up['tenqt'] ?>">
          </div>


          <button type="submit" name="sbm" class="btn-success">Sửa quà tặng</button>
     </form>
</div>